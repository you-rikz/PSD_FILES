<?php
	require '../connection.php';
	$course_id = $_POST['course'];
	$date_created = date('Y-m-d H:i:s');

   if(isset($_FILES['file']['name'])){
      $filename = explode(".", $_FILES['file']['name']);
      if(end($filename) == "csv"){
         $handle = fopen($_FILES['file']['tmp_name'], "r");
         $success = 0;
         $errors = 0;
         $x = 0;
         while($data = fgetcsv($handle)){
            if($x != 0){
               $question = mysqli_real_escape_string($conn, $data[0]);
               $option_1 = mysqli_real_escape_string($conn, $data[1]);
               $option_2 = mysqli_real_escape_string($conn, $data[2]);
               $option_3 = mysqli_real_escape_string($conn, $data[3]);
               $option_4 = mysqli_real_escape_string($conn, $data[4]);
               $option_5 = mysqli_real_escape_string($conn, $data[5]);
               $answer = mysqli_real_escape_string($conn, $data[6]);
               
               if($answer != $option_1 OR $answer != $option_2 OR $answer != $option_3 OR $answer != $option_4 OR $answer != $option_5){
                  $status = 1;
               }else{
                  $status = 0;
               }

               $sql = "INSERT INTO exam_questions (course_id, question, option_1, option_2, option_3, option_4, option_5, answer, status, date_created)
                           VALUES ('$course_id' , '$question','$option_1', '$option_2', '$option_3', '$option_4', '$option_5', '$answer', '$status', '$date_created')";

               if ($conn->query($sql) === TRUE) {
                  $success++;
               } else {
                  $errors++;
               }
            }
?><?php
            $x++;
         }
?>
			<div class="alert alert-success solid alert-right-icon alert-dismissible fade show">
            	<span><i class="mdi mdi-check"></i></span>
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button> <?= $success; ?> out of <?= $success-$errors; ?> questions for <?= $course_id; ?> has been created.
            </div>
<?php
         
         fclose($handle);
      }else{
         echo '<label>Please Select CSV File only</label>';
      }
   }else{
         echo '<label>Please Select File</label>';
   }