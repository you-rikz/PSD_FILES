<?php
      require '../connection.php';
      require '../functions.php';
      $exam_id = 'LET'.random_strings(6);
      $course_id = 'LET';
      $exam_title = 'title';
      $total_questions = 10;
      $description = 'description';

      $time_limit = date('H:i:s', strtotime("01:00:00"));

      $time_limitdisplay = date('H:i:s', strtotime("01:00:00"));

      $status = 1;

      $today_date = date_create();
      date_timezone_set($today_date,timezone_open("+08:00"));
      $date_created = date_format($today_date,"Y-m-d H:i:s"); 

$sql = "INSERT INTO exams (
                            exam_id, 
                            course_id, 
                            title,
                            time_limit,
                            time_limitdisplay,
                            total_questions,
                            description, 
                            status, 
                            date_created
                            )
                VALUES ( 
                            '$exam_id', 
                            '$course_id',
                            '$exam_title',
                            '$time_limit',
                            '$time_limitdisplay',
                            '$total_questions',
                            '$description',
                            '$status', 
                            '$date_created'
                        )
                ";
mysqli_query($conn, $sql);