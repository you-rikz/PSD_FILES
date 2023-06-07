<?php
  require '../connection.php';

  // Get the data 
  $option = $_POST['option'];
  $question = $_POST['question'];
  $session_id = $_POST['session_id'];
  $user_id = $_POST['user_id'];
  $q_no = $_POST['q_no'];

  $today_date = date_create();
  date_timezone_set($today_date,timezone_open("+08:00"));
  $datetime = date_format($today_date,"Y-m-d H:i:s");

  // Insert into the database
  $sql = "INSERT INTO exam_actionlog (session_id, user_id, q_no, current_question, selected_option, date_created)
          VALUES ('$session_id' , '$user_id', '$q_no','$question', '$option', '$datetime')";
  
  if ($conn->query($sql) === TRUE) {
    echo "<i>The record has been created</i>";
  }else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
