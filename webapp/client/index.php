<?php
require '../connection.php';
session_start();

if(!(isset($_SESSION['token_id']))){
   header("Location: ../omes/");
   die();
}

if(isset($_GET['deactivate'])){
   $session_id = $_GET['deactivate'];
   unset($_SESSION['active']);

   //Delete Action Logs
   $query = "DELETE FROM exam_actionlog WHERE session_id='$session_id'";
   mysqli_query($conn,$query);
   
   //Delete Session
   $query = "DELETE FROM exam_session WHERE session_id='$session_id'";
   mysqli_query($conn,$query);
}

if(isset($_SESSION['active'])){
   header("Location: exam.php");
   die();
}

$user_id = $_SESSION['token_id'];
$exam_type = $_SESSION['course_id'];


$query = "SELECT * FROM tokens WHERE token='$user_id'";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result)){
   $id = $row['ID'];
   $username = $row['username'];
   $date_expired = $row['date_expired'];
}

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>OMES » Online Mock Examination System</title>
      <!-- FontAwesome-cdn include -->
      <link rel="stylesheet" href="./assets/css/all.min.css" />
      <!-- Google fonts include -->
      <link
         href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700;800&family=Sen:wght@400;700;800&display=swap"
         rel="stylesheet"
         />
      <!-- Bootstrap-css include -->
      <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
      <!-- Animate-css include -->
      <link rel="stylesheet" href="./assets/css/animate.min.css" />

      <link rel="stylesheet" href="sweetalert/dist/sweetalert2.min.css">

      <!-- Main-StyleSheet include -->
      <link rel="stylesheet" href="./assets/css/style.css" />
      <link
         href="template/vendor/datatables/css/jquery.dataTables.min.css"
         rel="stylesheet"
         />
      <style>
         .animate-top{animation:animatetop 0.8s}@keyframes animatetop{from{top:-300px;opacity:0} to{top:0;opacity:1}}
      </style>

   </head>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   <script>
      $(document).ready(function () {
          $("#start_exam").on("submit", function (event) {
              event.preventDefault();
              var formValues = $(this).serialize();
              $.post("exam.php", formValues, function (data) {
                  $("#body_modal").removeAttr("style");
                  $("#body_modal").removeAttr("class");
                  $("#content-exam").empty();
                  $("#content-exam").html(data);
              });
          });
      
      });

      function update_username(id, btn) {
              var username = document.getElementById("username").value;
              // Create a new XMLHttpRequest object
              var xhttp = new XMLHttpRequest();

              // Set the callback function to handle the response
              xhttp.onreadystatechange = function () {
                  if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("username").value = this.responseText;
                  }
              };

              // Open the connection and send the request
              xhttp.open("POST", "update_username.php", true);
              xhttp.setRequestHeader(
                  "Content-type",
                  "application/x-www-form-urlencoded"
              );
              xhttp.send("id=" + id  + "&username=" + username);
      }

   </script>
   <body
      id="body_modal"
      class="modal-open"
      style="overflow: hidden; padding-right: 0px"
      >
      <div id="content-exam">

         <div
            class="modal fade show animate-top"
            id="examModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-modal="true"
            role="dialog"
            style="display: block"
            >
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <form id="start_exam">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                           Online Mock Examination System
                        </h5>
                        <label class="col-form-label"
                           ><small>
                        Date Expiration:
                        <?= $date_expired; ?></small
                           ></label
                           >
                     </div>
                     <div class="modal-body">
                        <div class="mb-3">
                           <label for="recipient-name" class="col-form-label" >Username:</label>
                           <input type="text" id="username" name="username" class="form-control" value="<?= $username; ?>" onChange="update_username('<?= $id; ?>', this);" />
                        </div>
                        <div class="mb-3">
                           <label
                              for="test-type"
                              class="col-form-label"
                              >Test Type:</label
                              >
                           <select
                              name="exam_id"
                              class="form-control"
                              onChange="Checkmaxval(this);"
                              required
                              >
                              <?php
                                 $query = "SELECT * FROM exams WHERE course_id='$exam_type'";
                                 $result = mysqli_query($conn,$query);
                                 while($row = mysqli_fetch_array($result)){
                                 ?>
                              <option
                                 value="<?php echo $row['exam_id']; ?>"
                                 >
                                 <?php echo $row['title']; ?>
                              </option>
                              <?php 
                                 } 
                                 ?>
                           </select>
                        </div>
                        <div class="mb-3">
                           <label for="recipient-name" class="col-form-label" ><strong>Exams Taken</strong></label><br>
                           <div class="table-responsive">
                              <table id="example5" class="display">
                                 <thead>
                                    <tr>
                                       <th>Exam</th>
                                       <th>Kept Score</th>
                                       <th>Total Items</th>
                                       <th>Date Finished</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                       $query = "SELECT * FROM exam_session WHERE user_id='$user_id'";
                                       $result = mysqli_query($conn,$query);
                                       $count = 1;
                                       while($row = mysqli_fetch_array($result) ){
                                           $exam_id = $row['exam_id'];
                                           $kept_score = $row['kept_score'];
                                           $total_score = $row['total_score'];
                                           $date_finished = $row['datetime_finished'];
                                       ?>
                                    <tr>
                                       <td><?= $exam_id; ?></td>
                                       <td><?= $kept_score; ?></td>
                                       <td><?= $total_score; ?></td>
                                       <td><?= $date_finished; ?></td>
                                    </tr>
                                    <?php
                                       $count++;
                                       }
                                       ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <a  class="btn btn-secondary logout-auto">
                           <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" style="stroke-dasharray: 29, 49; stroke-dashoffset: 0;"></path><path d="M16,17L21,12L16,7" style="stroke-dasharray: 15, 35; stroke-dashoffset: 0;"></path><path d="M21,12L9,12" style="stroke-dasharray: 12, 32; stroke-dashoffset: 0;"></path></svg>
                           Log Out
                        </a>
                        <button type="submit" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-lightning-charge" viewBox="0 0 16 16">
                          <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09zM4.157 8.5H7a.5.5 0 0 1 .478.647L6.11 13.59l5.732-6.09H9a.5.5 0 0 1-.478-.647L9.89 2.41 4.157 8.5z"/>
                        </svg>
                        Take Exam
                        </button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="modal-backdrop fade show"></div>
         <div class="wrapper">
            <!-- Top content -->
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <div class="logo_area ps-5 pt-5">
                        <a href="index.php">
                        <img src="./assets/images/logo.png" alt="image-not-found" />
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>


<!-- jQuery-js include -->
<script src="./assets/js/jquery-3.6.0.min.js"></script>
<!-- jquery-count-down include -->
<script src="./assets/js/countdown.js"></script>
<!-- Bootstrap-js include -->
<script src="./assets/js/bootstrap.min.js"></script>
<!-- jQuery-validate-js include -->
<script src="./assets/js/jquery.validate.min.js"></script>
<!-- Custom-js include -->
<script src="./assets/js/script.js"></script>

<!-- Datatable -->
<script src="template/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="template/js/plugins-init/datatables.init.js"></script>

<script src="template/vendor/sweetalert2/dist/sweetalert2.min.js"></script>

<script src="sweetalert/dist/sweetalert2.min.js"></script>
<script>
document.querySelector(".logout-auto").onclick = function() {
    Swal.fire({
      title: 'Logout',
      text: "Are you sure you want to logout?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Logout',
          'You have been successfully logged out.',
          'success'
        ).then((result) => {
           window.location.href = "logout.php";
         })
      }
    })
}
</script>