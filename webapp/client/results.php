<?php
require '../connection.php';
require '../functions.php';

session_start();
unset($_SESSION['active']);
if(!(isset($_SESSION['token_id']))){
   header("Location: ../omes/");
   die();
}

if(isset($_POST["exam_process"])){
    $session_id = $_POST["session_id"];
    $user_id = $_POST["user_id"];
    $exam_id = $_POST["exam_id"];

    $answered = array(array());
    $questions = $_POST["total_questions"];

    $today_date = date_create();
    date_timezone_set($today_date,timezone_open("+08:00"));
    $date_created = date_format($today_date,"Y-m-d H:i:s");

    //ALL answered questions 
    for ($x = $questions; $x >= 1; $x--) {
        if(isset($_POST['question_'.$x])){
            $answered[$x-1][0] = $_POST['question_'.$x];
        }else{ $answered[$x-1][0] = ""; }

        if(isset($_POST['option_'.$x])){
            $answered[$x-1][1] = $_POST['option_'.$x];
        }else{ $answered[$x-1][1] = ""; }

        $answered[$x-1][2] = $x;
    }

    //ALL questions presented 
    $all_questions = array(array());
    $query = "SELECT * FROM exam_qselected WHERE exam_id='$exam_id'";
    $result = mysqli_query($conn, $query);
    $r = 0;
    if((mysqli_num_rows($result) > 0)){
        while($row = mysqli_fetch_array($result)){
            $all_questions[$r][0] = $row['question'];
            $all_questions[$r][1] = $row['answer'];
            $r++;
        }
    }else{
        $all_questions[0][0] = "";
        $all_questions[0][1] = "";
    }


    $kept_score = 0;
    //ADD each number to the results
    foreach ($answered as $value) {
        $result = check_answers($value[0], $value[1], $all_questions);
        $kept_score = $kept_score + $result;
        $sql = "INSERT INTO exam_results (session_id, user_id, exam_id, question_no, selected_question, selected_option, result, datetime_created) 
                  VALUES ('$session_id' , '$user_id', '$exam_id', '$value[2]','$value[0]', '$value[1]', '$result', '$date_created')";

        $conn->query($sql);
    }

    //UPDATE the session
    $sql = "UPDATE exam_session 
            SET status='0', kept_score='$kept_score', total_score='$questions', datetime_finished='$date_created'
            WHERE session_id='$session_id'";

    if ($conn->query($sql) === TRUE) {
        echo "";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }  

}


?>


<?php
    $query = "SELECT * FROM exam_session WHERE session_id='$session_id' AND user_id='$user_id'";
    $result = mysqli_query($conn, $query); 
    while($row = mysqli_fetch_array($result)){
        $kept_score = $row['kept_score'];
        $total_score = $row['total_score'];
    }

    $result_score = $kept_score." out of ".$total_score."<br>";

    //GET results
    $graded = array(array());
    $query = "SELECT * FROM exam_results WHERE session_id='$session_id' AND user_id='$user_id'";
    $result = mysqli_query($conn, $query);
    $r = 0;
    if((mysqli_num_rows($result) > 0)){
        while($row = mysqli_fetch_array($result)){
            $graded[$r][0] = $row['selected_question'];
            $graded[$r][1] = $row['selected_option'];
            $graded[$r][2] = $row['result'];
            $r++;
        }

    }else{
        $graded[0][0] = "";
        $graded[0][1] = "";
        $graded[0][2] = "";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Exam Results » Online Mock Examination System</title>
<!-- FontAwesome-cdn include -->
<link rel="stylesheet" href="./assets/css/all.min.css">
<!-- Google fonts include -->
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700;800&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
<!-- Bootstrap-css include -->
<link rel="stylesheet" href="./assets/css/bootstrap.min.css">

<link rel="stylesheet" href="sweetalert/dist/sweetalert2.min.css">

<!-- Animate-css include -->
<link rel="stylesheet" href="./assets/css/animate.min.css">
<!-- Main-StyleSheet include -->
<link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
<div class="wrapper">
<!-- Top content -->
<div class="container">
<div class="row">
   <div class="col-md-6">
      <div class="logo_area ps-5 pt-5">
         <a href="results.php">
            <img src="./assets/images/logo.png" alt="image-not-found">
         </a>
      </div>
   </div>
   <div class="col-6 d-none d-md-block pt-5">
      <div class="count_box pe-3 me-5 rounded-pill d-flex align-items-center justify-content-center float-end">
         <div class="count_clock ps-2">
            
         </div>
         <div class="count_title">
            <style>
               #restart{
                  padding:1.2vw;
                  color:white;
                  text-decoration: none;
                  font-size: 1.5vw;
               }
               #restart:hover{
                  padding:1.2vw;
                  color:gray;
                  text-decoration: none;
                  font-size: 1.5vw;
               }
            </style>
             <a id="restart" class="retake-auto">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                </svg>
                     Re-take
             </a>
             <a id="restart" class="logout-auto">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-door-closed" viewBox="0 0 16 16">
                  <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
                  <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
                </svg>
                Log Out
             </a>
         </div>
      </div>
   </div>

</div>
</div>
<div class="container">
<form class="multisteps_form overflow-hidden position-relative" id="wizard" method="POST">
    <div style="position: absolute;margin-left: auto; margin-right: auto; left: 0; right: 0;text-align: center;">
        <h1 class="text-center py-5 animate__animated animate__fadeInRight animate_25ms" style="color:white;"><strong> Exam Results</strong><br><small><?= $result_score ?> </small>
       </h1>
    </div>
   <!------------------------- Questions ----------------------------->

<?php

$query = "SELECT * FROM exam_qselected WHERE exam_id='$exam_id'";
$result = mysqli_query($conn, $query);
$x = 1;
while($row = mysqli_fetch_array($result)){
    if($x == 1){
      ?>
   <div>
      <div class="question_title">
         <h1 class="text-center py-5 animate__animated animate__fadeInRight animate_25ms">
             <?= $row['question']; ?>
         </h1>
         </div>
         <div class="row pt-3">
            <ul class="text-center">
               <li class="position-relative d-inline-block animate__animated animate__fadeInRight animate_50ms
               <?php echo results_checked_color($row['question'], $row['option_1'], $graded, $all_questions);?>
               ">
                  <label ><?= $row['option_1']; ?></label>
                  <span class="position-absolute">A</span>
               </li>
               <li class="position-relative d-inline-block animate__animated animate__fadeInRight animate_100ms
               <?php echo results_checked_color($row['question'], $row['option_2'], $graded, $all_questions);?>
               " >
                  <label><?= $row['option_2']; ?></label>
                  <span class="position-absolute">B</span>
               </li>
            </ul>
         </div>
         <div class="row pt-3">
            <ul class="text-center">
               <li class="position-relative d-inline-block animate__animated animate__fadeInRight animate_150ms
                <?php echo results_checked_color($row['question'], $row['option_3'], $graded, $all_questions);?>
               ">
                  <label><?= $row['option_3']; ?></label>
                  <span class="position-absolute">C</span>
               </li>
               <li class="position-relative d-inline-block animate__animated animate__fadeInRight animate_200ms
                <?php echo results_checked_color($row['question'], $row['option_4'], $graded, $all_questions);?>
               ">
                  <label><?= $row['option_4']; ?></label>
                  <span class="position-absolute">D</span>
               </li>
            </ul>
         </div>
          <div class="row pt-3">
                <ul class="text-center">
                   <li class="position-relative d-inline-block animate__animated animate__fadeInRight animate_150ms
                   <?php echo results_checked_color($row['question'], $row['option_5'], $graded, $all_questions);?>
                   ">
                      <label><?= $row['option_5']; ?></label>
                      <span class="position-absolute">E</span>
                   </li>
                </ul>
          </div>
    </div>
    <?php
    }else{
    ?>
   <div style="margin-top:-9%;">
      <div class="question_title">
         <h1 class="text-center py-5 animate__animated animate__fadeInRight animate_25ms">
             <?= $row['question']; ?>
         </h1>
         </div>
         <div class="row pt-3">
            <ul class="text-center">
               <li class="position-relative d-inline-block animate__animated animate__fadeInRight animate_50ms
               <?php echo results_checked_color($row['question'], $row['option_1'], $graded, $all_questions);?>
               "
               >
                  <label><?= $row['option_1']; ?></label>
                  <span class="position-absolute">A</span>
               </li>
               <li class="position-relative d-inline-block animate__animated animate__fadeInRight animate_100ms
               <?php echo results_checked_color($row['question'], $row['option_2'], $graded, $all_questions);?>
               " >
                  <label><?= $row['option_2']; ?></label>
                  <span class="position-absolute">B</span>
               </li>
            </ul>
         </div>
         <div class="row pt-3">
            <ul class="text-center">
               <li class="position-relative d-inline-block animate__animated animate__fadeInRight animate_150ms
                <?php echo results_checked_color($row['question'], $row['option_3'], $graded, $all_questions);?>
               ">
                  <label><?= $row['option_3']; ?></label>
                  <span class="position-absolute">C</span>
               </li>
               <li class="position-relative d-inline-block animate__animated animate__fadeInRight animate_200ms
                <?php echo results_checked_color($row['question'], $row['option_4'], $graded, $all_questions);?>
               ">
                  <label><?= $row['option_4']; ?></label>
                  <span class="position-absolute">D</span>
               </li>
            </ul>
         </div>
          <div class="row pt-3">
                <ul class="text-center">
                   <li class="position-relative d-inline-block animate__animated animate__fadeInRight animate_150ms
                   <?php echo results_checked_color($row['question'], $row['option_5'], $graded, $all_questions);?>
                   ">
                      <label><?= $row['option_5']; ?></label>
                      <span class="position-absolute">E</span>
                   </li>
                </ul>
          </div>
    </div>

<?php
    }
    $x++;
}

?>

</form>
   </div>
</div>
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
<!-- <script type="text/javascript">
   $('#getting-started').countdown('2020/07/25', function(event) {
      $(this).html(event.strftime('%w weeks %d days %H:%M:%S'));
   });
</script> -->

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
      confirmButtonText: 'Yes!'
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

document.querySelector(".retake-auto").onclick = function() {
    Swal.fire({
      title: 'Retake Exam',
      text: "Are you sure you want to retake another exam?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes!'
    }).then((result) => {

      if (result.isConfirmed) {
            let timerInterval
            Swal.fire({
              title: 'Closing!',
              html: 'You will be redirected in <b></b> milliseconds.',
              timer: 2000,
              timerProgressBar: true,
              didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                  b.textContent = Swal.getTimerLeft()
                }, 100)
              },
              willClose: () => {
                clearInterval(timerInterval)
              }
            }).then((result) => {
              if (result.dismiss === Swal.DismissReason.timer) {
                 window.location.href = "index.php";
              }
            })
      }
    })
}
</script>






</body>
</html>