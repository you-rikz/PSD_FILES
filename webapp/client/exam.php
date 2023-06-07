<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>OMES » Online Mock Examination System</title>
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
<?php
   require '../connection.php';
   require '../functions.php';
   session_start();

   if(!(isset($_SESSION['token_id']))){
      header("Location: ../omes/");
      die();
   }
   
   $user_id =  $_SESSION['token_id'];
   
      //CHECK if there is an exam currently on-going
      $query = "SELECT * FROM exam_session WHERE user_id='$user_id'AND status=1 LIMIT 1 ";
      $result = mysqli_query($conn, $query);

      if(!(mysqli_num_rows($result) > 0)){
         $exam_id  = $_POST['exam_id'];
         $session_id = session_exists($conn, random_strings(10)); //FOR ACTION LOG
         
         $status = TRUE;

         $today_date = date_create();
         date_timezone_set($today_date,timezone_open("+08:00"));
         $date_started = date_format($today_date,"Y-m-d H:i:s");

         $query = "SELECT * FROM exams WHERE exam_id='$exam_id' LIMIT 1 ";
         $result = mysqli_query($conn, $query);
         while($row = mysqli_fetch_array($result)) {
            $description = $row['description'];
            $seconds = date("s", strtotime($row['time_limit']));
            $minutes = date("i", strtotime($row['time_limit']));
            $hours = date("H", strtotime($row['time_limit']));
            $time = "+ ".$hours." hours"." + ".$minutes." minutes"." + ".$seconds." seconds";
            $time_limit = date('Y-m-d H:i:s', strtotime($time, strtotime($date_started)));

            $seconds = date("s", strtotime($row['time_limitdisplay']));
            $minutes = date("i", strtotime($row['time_limitdisplay']));
            $hours = date("H", strtotime($row['time_limitdisplay']));
            $time = "- ".$hours." hours"." - ".$minutes." minutes"." - ".$seconds." seconds";
            $time_limitdisplay = date('Y-m-d H:i:s', strtotime($time, strtotime($time_limit)));
         }

         $sql = "INSERT INTO exam_session (session_id, user_id, exam_id, status, datetime_started, datetime_expected) 
                  VALUES ('$session_id' , '$user_id', '$exam_id', '$status', '$date_started', '$time_limit')";

         if ($conn->query($sql) === TRUE) {
            
         }else {
            echo "Error: " . $sql . "<br>" . $conn->error;
         }   
      }else{
         // GET session id and description
         while($row = mysqli_fetch_array($result)) {
            $exam_id  = $row['exam_id'];
            $session_id = $row['session_id'];
         }
         
         $query = "SELECT * FROM exams WHERE exam_id='$exam_id'";
         $result = mysqli_query($conn, $query);
         while($row = mysqli_fetch_array($result)) {
            $description = $row['description'];
         }
      }
      $_SESSION['active'] = true;
      //GET the time limit and preview the countdown
      $result = mysqli_query($conn, "SELECT * FROM exam_session WHERE session_id='$session_id'");
         while($row = mysqli_fetch_array($result)) {
            $time_limit = date("M d, Y  H:i:s", strtotime($row['datetime_expected']));
         }
      
      ?>

<body>
<div class="wrapper">
<!-- Top content -->
<div class="container">
<div class="row">
   <div class="col-md-6">
      <div class="logo_area ps-5 pt-5">
         <a href="index.html">
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
            <a  id="restart" class="logout-auto">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                </svg>
                     Restart
             </a>
         </div>
         <div class="count_number rounded-pill px-3 d-flex justify-content-around align-items-center position-relative overflow-hidden">
            <div class="count_hours">
               <h3 id="hr_text">00</h3><span class="text-uppercase">hrs</span>
            </div>
            <div class="count_min">
               <h3 id="min_text">00</h3><span class="text-uppercase">min</span>
            </div>
            <div class="count_sec">
               <h3 id="sec_text">00</h3><span class="text-uppercase">sec</span>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
      <script>
           function sendAjaxRequest(option, question, q_no) {
           // Get the value of the selected radio button
           var session_id = "<?php echo $session_id; ?>";
           var user_id = "<?php echo $user_id; ?>";
           
           // Create a new XMLHttpRequest object
           var xhttp = new XMLHttpRequest();

           // Set the callback function to handle the response
           xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
               // Update the page with the result of the query
               document.getElementById("result").innerHTML = this.responseText;
             }
           };

           // Open the connection and send the request
           xhttp.open("POST", "script.php", true);
           xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
           xhttp.send("option=" + option + "&question=" + question + "&session_id=" + session_id+ "&user_id=" + user_id + "&q_no=" + q_no);
         }

      // Set the date we're counting down to
      var countDownDate = new Date("<?php echo $time_limit; ?>").getTime();

      // Update the count down every 1 second
      var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();
          
        // Find the distance between now and the count down date
        var distance = countDownDate - now;
          
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
          
        // Output the result in an element with id="demo"
        document.getElementById("hr_text").innerHTML = pad(hours, 2);
        document.getElementById("min_text").innerHTML = pad(minutes, 2);
        document.getElementById("sec_text").innerHTML = pad(seconds, 2);
          
        // If the count down is over, write some text 
        if (distance < 0) {
          clearInterval(x);
          swal({
              title: "Time's Up!!",
              text: "The results will be shown in 2 seconds.",
              timer: 2e3,
              showConfirmButton: !1
          })
         .then((result) => {
              document.getElementById('exam_results').submit();
          })
        }
      }, 1000);

      function pad(num, size) {
          num = num.toString();
          while (num.length < size) num = "0" + num;
          return num;
      }


      // Set the date we're counting down to
      var countDownDate2 = new Date("<?php echo $time_limitdisplay; ?>").getTime();

      // Update the count down every 1 second
      var x2 = setInterval(function() {

        // Get today's date and time
        var now2 = new Date().getTime();
          
        // Find the distance between now and the count down date
        var distance2 = countDownDate2 - now2;
          
        // Time calculations for days, hours, minutes and seconds
        var days2 = Math.floor(distance2 / (1000 * 60 * 60 * 24));
        var hours2 = Math.floor((distance2 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes2 = Math.floor((distance2 % (1000 * 60 * 60)) / (1000 * 60));
        var seconds2 = Math.floor((distance2 % (1000 * 60)) / 1000);

        // If the count down is over, write some text 
        if (distance2 < 0) {
          clearInterval(x2);
               Swal.fire({
                 title: '<strong>Notification</strong>',
                 icon: 'info',
                 text: 'The exam is about to end.',
                 showCloseButton: true,
                 focusConfirm: false,
                 confirmButtonText: 'Okay!'
               })
        }
      }, 1000);
      </script>

<div class="container">

<form class="multisteps_form overflow-hidden position-relative" action="results.php" id="exam_results" method="POST" enctype="multipart/form-data">
    <div style="position: absolute;margin-left: auto; margin-right: auto; left: 0; right: 0;text-align: center;">
        <h3 class="text-center py-5 animate__animated animate__fadeInRight animate_25ms" style="color:white;"><?= $description ?>
       </h3>
    </div>
      <?php

       //QUERY last log actions TO array
       $last_saved = array(array());
       $query = "
         SELECT t.q_no, t.current_question, t.selected_option, t.date_created, t.session_id
         from exam_actionlog t
         inner join (
             select session_id, current_question, max(date_created) as MaxDate
             from exam_actionlog
             group by current_question
         ) tm on t.current_question = tm.current_question and t.date_created = tm.MaxDate
         where t.session_id = '$session_id'
         order by t.q_no
         ";
       $result = mysqli_query($conn, $query);
       $r = 0;
       if((mysqli_num_rows($result) > 0)){
          while($row = mysqli_fetch_array($result)){
             $last_saved[$r][0] = $row['current_question'];
             $last_saved[$r][1] = $row['selected_option'];
             $r++;
          }
       }else{
         $last_saved[0][0] = "";
         $last_saved[0][1] = "";
       }

       $query = "SELECT * FROM exam_qselected WHERE exam_id='$exam_id'";
       $result = mysqli_query($conn, $query);

       $qtotal_query = "SELECT * FROM exams WHERE exam_id='$exam_id'";
       $qtotal_result = mysqli_query($conn, $qtotal_query);
       while($row = mysqli_fetch_array($qtotal_result)){
         $lim = $row['total_questions'];
       }
      ?>
      <?php
       $x = 1;
       while($row = mysqli_fetch_array($result)){
      ?>
      <input type="hidden" name="question_<?php echo $x; ?>" value="<?php echo $row['question']; ?>">
      <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">
       <div class="multisteps_form_panel">
         <div class="question_title">
            <h1 class="text-center py-5 animate__animated animate__fadeInRight animate_25ms"><?php echo $row['question']; ?></h1>
            </div>
            <div class="row pt-3">
               <ul class="text-center">
                  <li class="position-relative step_<?php echo $x;?> d-inline-block animate__animated animate__fadeInRight animate_50ms

                  <?php if(isset($last_saved[$x-1][0])){if($last_saved[$x-1][1] == $row['option_1']) {echo 'active';}}
                  ?>
                     " onclick="
                     document.getElementById('opt_1[<?php echo $x;?>]').checked =true;
                     sendAjaxRequest('<?php echo $row['option_1']; ?>', '<?php echo $row['question']; ?>', '<?php echo $x; ?>');
                  ">
                   <input id="opt_1[<?php echo $x;?>]" type="radio" name="option_<?php echo $x; ?>" value="<?php echo $row['option_1']; ?>" <?php echo checked_reload($row['question'], $row['option_1'], $last_saved)?>
                   >
                     <label for="opt_1[<?php echo $x;?>]"><?php echo $row['option_1']; ?>
                     <span class="position-absolute">A</span>
                     </label>
                  </li>
                  <li class="position-relative step_<?php echo $x;?> d-inline-block animate__animated animate__fadeInRight animate_100ms
                  <?php if(isset($last_saved[$x-1][0])){if($last_saved[$x-1][1] == $row['option_2']){echo 'active';}}
                  ?>
                  "
                     onclick="
                     document.getElementById('opt_2[<?php echo $x;?>]').checked =true;
                     sendAjaxRequest('<?php echo $row['option_2']; ?>', '<?php echo $row['question']; ?>', '<?php echo $x; ?>')
                  "
                     >
                     <input id="opt_2[<?php echo $x;?>]" type="radio" name="option_<?php echo $x; ?>" value="<?php echo $row['option_2']; ?>" <?php echo checked_reload($row['question'], $row['option_2'], $last_saved)?> 
                     >
                     <label for="opt_2[<?php echo $x;?>]"><?php echo $row['option_2']; ?>
                     <span class="position-absolute">B</span>
                     </label>
                  </li>
               </ul>
            </div>
            <div class="row pt-3">
               <ul class="text-center">
                  <li class="position-relative step_<?php echo $x;?> d-inline-block animate__animated animate__fadeInRight animate_150ms
                  <?php if(isset($last_saved[$x-1][0])){if($last_saved[$x-1][1] == $row['option_3']) {echo 'active';}}
                  ?>
                  "
                     onclick="
                     document.getElementById('opt_3[<?php echo $x;?>]').checked =true;
                     sendAjaxRequest('<?php echo $row['option_3']; ?>', '<?php echo $row['question']; ?>', '<?php echo $x; ?>')
                     "
                     >
                     <input id="opt_3[<?php echo $x;?>]" type="radio" name="option_<?php echo $x; ?>" value="<?php echo $row['option_3']; ?>"  <?php echo checked_reload($row['question'], $row['option_3'], $last_saved)?> >
                     <label for="opt_3[<?php echo $x;?>]"><?php echo $row['option_3']; ?>
                     <span class="position-absolute">C</span>
                     </label>
                  </li>
                  <li class="position-relative step_<?php echo $x;?> d-inline-block animate__animated animate__fadeInRight animate_200ms
                  <?php if(isset($last_saved[$x-1][0])){if($last_saved[$x-1][1] == $row['option_4']) {echo 'active';}}
                  ?>
                  "
                     onclick="
                     document.getElementById('opt_4[<?php echo $x;?>]').checked =true;
                     sendAjaxRequest('<?php echo $row['option_4']; ?>', '<?php echo $row['question']; ?>', '<?php echo $x; ?>')
                  "
                     >
                     <input id="opt_4[<?php echo $x;?>]" type="radio" name="option_<?php echo $x; ?>" value="<?php echo $row['option_4']; ?>"  <?php echo checked_reload($row['question'], $row['option_4'], $last_saved)?> >
                     <label for="opt_4[<?php echo $x;?>]"><?php echo $row['option_4']; ?>
                     <span class="position-absolute">D</span>
                     </label>
                  </li>
               </ul>
            </div>
            <div class="row">
               <ul class="text-center">
                  <li class="position-relative step_<?php echo $x;?> d-inline-block animate__animated animate__fadeInRight animate_150ms
                  <?php if(isset($last_saved[$x-1][0])){if($last_saved[$x-1][1] == $row['option_5']) {echo 'active';}}
                  ?>
                  "
                  onclick="
                     document.getElementById('opt_5[<?php echo $x;?>]').checked =true;
                     sendAjaxRequest('<?php echo $row['option_5']; ?>', '<?php echo $row['question']; ?>', '<?php echo $x; ?>')
                  "
                     >
                     <input id="opt_5[<?php echo $x;?>]" type="radio" name="option_<?php echo $x; ?>" value="<?php echo $row['option_5']; ?>"  <?php echo checked_reload($row['question'], $row['option_5'], $last_saved)?> >
                     <label for="opt_5[<?php echo $x;?>]"><?php echo $row['option_5']; ?>
                     <span class="position-absolute">E</span>
                     </label>
                  </li>
               </ul>
               <br><br><br>
               <!-- Progress bar -->
               <div class="step_progress position-absolute text-center step">
                  <span class="text-capitalize">question <?php echo $x; ?> / <?php echo $lim; ?></span>
                  <div class="progress rounded-pill">
                     <div class="progress-bar rounded-pill" role="progressbar" style="width: <?php echo ($x/$lim)*100; ?>%" aria-valuenow="<?php echo ($x/$lim)*100; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
               </div>
            </div>
         </div>
         <?php
         $x++;
      }
      ?>
   <br>
   <input type="hidden" name="session_id" value="<?php echo $session_id; ?>">
   <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
   <input type="hidden" name="total_questions" value="<?php echo $lim; ?>">
   <input type="hidden" name="exam_process" value="1">

       <!---------- Form Button ---------->
         <br><br><br>
         <button type="button" class="f_btn prev_btn text-uppercase position-absolute" id="prevBtn" onclick="nextPrev(-1)"><span><i class="fas fa-arrow-left"></i></span> Last Question</button>
         <button type="button" class="f_btn next_btn text-uppercase position-absolute" id="nextBtn" onclick="submitanswers(this);nextPrev(1);">Next Question</button>

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

</body>
</html>

<script src="sweetalert/dist/sweetalert2.min.js"></script>
<script>
   $(function(){
     <?php 
     for ($x = 1; $x <= $lim; $x++) {
        echo '
           $(".step_'.$x.'").on("click", function(){
             $(".step_'.$x.'").removeClass("active");
             $(this).addClass("active");
           });
        '; 
      }
     ?>
   });

   function submitanswers(btn){
      if(btn.textContent == "Submit"){
         let timerInterval
         Swal.fire({
           title: 'Exam Submitted!',
           html: 'The results will be shown in <b></b> milliseconds.',
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
           /* Read more about handling dismissals below */
           if (result.dismiss === Swal.DismissReason.timer) {
             document.getElementById('exam_results').submit();
           }
         })
      }
   }

   document.querySelector(".logout-auto").onclick = function() {
    Swal.fire({
      title: 'Restart?',
      text: "Are you sure you want to restart?",
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
                 window.location.href = "index.php?deactivate=<?php echo $session_id;?>";
              }
            })
      }
    })
}
</script>