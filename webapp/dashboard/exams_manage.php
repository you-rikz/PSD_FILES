<?php 
require '../connection.php';
 
if(isset($_GET['question'])){

    if(isset($_POST['function'])){

      if($_POST['function'] == "edit"){
        $id = $_POST['id'];

        $query = "SELECT * FROM exam_questions WHERE ID='$id'";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)){
          $course_id = $row['course_id'];
          $question= $row['question'];
          $option_1= $row['option_1'];
          $option_2= $row['option_2'];
          $option_3= $row['option_3'];
          $option_4= $row['option_4'];
          $option_5= $row['option_5'];
          $answer= $row['answer'];
          $status= $row['status'];
        }
    ?>
                              <div class="row">
                                
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                  <div class="form-group">
                                    <label class="form-label">Course</label>
                                    <select name="course_id" class="form-control" onChange="Checkmaxval(this);" required>
                                      <?php
                                         $query = "SELECT * FROM course";
                                         $result = mysqli_query($conn,$query);
                                         while($row = mysqli_fetch_array($result)){
                                        ?>
                                        <option value="<?php echo $row['course_id']; ?>"
                                          <?php
                                          if ($course_id == $row['course_id']){
                                            echo "selected";
                                          }
                                          ?>
                                          ><?php echo $row['course_id']; ?></option>
                                      <?php 
                                        } 
                                      ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                  <div class="form-group">
                                    <label class="form-label">Question</label>
                                    <input name="question" value="<?= $question; ?>" type="text" class="form-control" required>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                  <div class="form-group">
                                    <label class="form-label">Option 1</label>
                                    <input onkeyup="EDITremoveselection()" value="<?= $option_1; ?>" id="EDIToption_1"  name="option_1" type="text" class="form-control" required>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                  <div class="form-group">
                                    <label class="form-label">Option 2</label>
                                    <input onkeyup="EDITremoveselection()"  value="<?= $option_2; ?>" id="EDIToption_2"  name="option_2" type="text" class="form-control" required>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                  <div class="form-group">
                                    <label class="form-label">Option 3</label>
                                    <input onkeyup="EDITremoveselection()" id="EDIToption_3"  value="<?= $option_3; ?>" name="option_3" type="text" class="form-control" required>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                  <div class="form-group">
                                    <label class="form-label">Option 4</label>
                                    <input onkeyup="EDITremoveselection()"  value="<?= $option_4; ?>" id="EDIToption_4"  name="option_4" type="text" class="form-control" required>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                  <div class="form-group">
                                    <label class="form-label">Option 5</label>
                                    <input onkeyup="EDITremoveselection()"  value="<?= $option_5; ?>" id="EDIToption_5" name="option_5" type="text" class="form-control" required>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12"></div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                  <div class="form-group">
                                    <label class="form-label">Answer</label>
                                    <input type="hidden" id="answerhidden" value="<?= $answer; ?>">
                                    <div id="EDITanswer_div"></div>
                                    <br>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                  <div class="form-group">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control" required>
                                              <?php 
                                                    if($status == 1){
                                                      echo '<option value="1" selected>Active</option>';
                                                      echo '<option value="0">Inactive</option>'; 
                                                    }else{
                                                      echo '<option value="0" selected>Inactive</option>';
                                                      echo '<option value="1">Active</option>';
                                                    }
                                              ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                  <input name="id" value="<?= $id; ?>" type="hidden" class="form-control">
                                  <input name="form_edit_exams" value="true" type="hidden" class="form-control">
                                </div>
                              </div>

    <?php
        
      }

      if($_POST['function'] == "delete"){
        $id = $_POST['id'];
        if($id > 0){
        // Check record exists
        $checkRecord = mysqli_query($conn,"SELECT * FROM exam_questions WHERE ID=".$id);
        $totalrows = mysqli_num_rows($checkRecord);
          if($totalrows > 0){
            // Delete record
            $query = "DELETE FROM exam_questions WHERE ID=".$id;
            mysqli_query($conn,$query);
            echo "<script>
                      Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'The item has been deleted.',
                      })
                  </script>";
            exit;
          }else{
            echo "<script>
                      Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                      })
                  </script>";
            exit;
          }
        }
      }


      if($_POST['function'] == "status"){
          $id = $_POST['id'];
          $status = $_POST['status'];
          $checkRecord = mysqli_query($conn,"SELECT * FROM exam_questions WHERE ID=".$id);
          $totalrows = mysqli_num_rows($checkRecord);
          if($totalrows > 0){
            $query = "UPDATE exam_questions SET status='$status' WHERE ID='$id'";
            mysqli_query($conn,$query);
            exit;
          }else{
              exit;
          }
      }

    }


    if(isset($_POST['ids'])){
      $deleted_items = 0;
      foreach ($_POST['ids'] as $id) {
          $query = "DELETE FROM exam_questions WHERE ID=".$id;
          mysqli_query($conn,$query);
          $deleted_items++;
      }

      echo "<script>
                Swal.fire({
                  icon: 'success',
                  title: 'Deleted!',
                  text: 'The ".$deleted_items." items has been deleted.',
                })
            </script>";
    }


    if(isset($_POST['form_exams'])){
      $course_id = $_POST['course_id'];
      $question= $_POST['question'];
      $option_1= $_POST['option_1'];
      $option_2= $_POST['option_2'];
      $option_3= $_POST['option_3'];
      $option_4= $_POST['option_4'];
      $option_5= $_POST['option_5'];
      $answer= $_POST['answer'];
      $status= $_POST['status'];

      $today_date = date_create();
      date_timezone_set($today_date,timezone_open("+08:00"));
      $date_created = date_format($today_date,"Y-m-d H:i:s");  

      $query = "SELECT * FROM exam_questions WHERE course_id='$course_id' AND question='$question'";
      $result = mysqli_query($conn, $query);
      if( mysqli_num_rows($result) > 0){
          echo "<script>
                Swal.fire({
                  icon: 'warning',
                  title: 'Warning!',
                  text: 'The question already exists in the course.',
                })
            </script>";
          die();
      }

        $sql = "INSERT INTO exam_questions (
                            course_id, 
                            question,
                            option_1,
                            option_2,
                            option_3,
                            option_4,
                            option_5,
                            answer,
                            status, 
                            date_created
                            )
                VALUES ( 
                            '$course_id', 
                            '$question',
                            '$option_1',
                            '$option_2',
                            '$option_3',
                            '$option_4',
                            '$option_5',
                            '$answer',
                            '$status', 
                            '$date_created'
                        )
                ";

        if ($conn->query($sql) === TRUE) { 
            echo "<script>
                      Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'The question has been added.',
                      })
                  </script>";
        }
    }

    if(isset($_POST['form_edit_exams'])){
      $id = $_POST['id'];
      $course_id = $_POST['course_id'];
      $question= $_POST['question'];
      $option_1= $_POST['option_1'];
      $option_2= $_POST['option_2'];
      $option_3= $_POST['option_3'];
      $option_4= $_POST['option_4'];
      $option_5= $_POST['option_5'];
      $answer= $_POST['answer'];
      $status= $_POST['status'];

      $query = "SELECT * FROM exam_questions WHERE question='$question' AND course_id='$course_id'";
      $result = mysqli_query($conn, $query);
      if(mysqli_num_rows($result) > 1){
          echo "<script>
                Swal.fire({
                  icon: 'warning',
                  title: 'Warning!',
                  text: 'The question already exists in the course.',
                })
            </script>";
          die();
      }

        $sql = "UPDATE exam_questions
                SET 
                  course_id='$course_id',
                  question='$question',
                  option_1='$option_1',
                  option_2='$option_2',
                  option_3='$option_3',
                  option_4='$option_4',
                  option_5='$option_5',
                  answer='$answer',
                  status='$status'
                WHERE ID='$id'
                ";

        if ($conn->query($sql) === TRUE) { 
            echo "<script>
                      Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'The question has been updated.',
                      })
                  </script>";
        }

    }
}else if(isset($_GET['result'])){
  if(isset($_POST['function'])){

      if($_POST['function'] == "delete"){
        $id = $_POST['id'];
        if($id > 0){
        // Check record exists
        $checkRecord = mysqli_query($conn,"SELECT * FROM exam_session WHERE ID=".$id);
        $totalrows = mysqli_num_rows($checkRecord);
        while($row = mysqli_fetch_array($checkRecord)){
              $exam_id = $row['exam_id'];
              $session_id = $row['session_id'];
              $user_id = $row['user_id'];
          }

        if($totalrows > 0){
          // Delete record
          $query = "DELETE FROM exam_session WHERE ID=".$id;
          mysqli_query($conn,$query);

          $query = "DELETE FROM exam_actionlog WHERE session_id='$session_id'";
          mysqli_query($conn,$query);

          $query = "DELETE FROM exam_results WHERE user_id='$user_id' AND session_id='$session_id' AND exam_id='$exam_id'";
          mysqli_query($conn,$query);
            echo "<script>
                      Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'The item has been deleted.',
                      })
                  </script>";
          exit;
        }else{
            echo "<script>
                      Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                      })
                  </script>";
          exit;
        }
        }
      }

      if($_POST['function'] == "status"){
          $id = $_POST['id'];
          $status = $_POST['status'];
          $checkRecord = mysqli_query($conn,"SELECT * FROM exam_session WHERE ID=".$id);
          $totalrows = mysqli_num_rows($checkRecord);
          if($totalrows > 0){
            $query = "UPDATE exam_session SET status='$status' WHERE ID='$id'";
            mysqli_query($conn,$query);
            exit;
          }else{
              exit;
          }
      }

  }


    if(isset($_POST['ids'])){
      $deleted_items = 0;
      foreach ($_POST['ids'] as $id) {
          $checkRecord = mysqli_query($conn,"SELECT * FROM exam_session WHERE ID=".$id);
          while($row = mysqli_fetch_array($checkRecord)){
              $exam_id = $row['exam_id'];
              $session_id = $row['session_id'];
              $user_id = $row['user_id'];
          }

          $query = "DELETE FROM exam_session WHERE ID=".$id;
          mysqli_query($conn,$query);

          $query = "DELETE FROM exam_actionlog WHERE session_id='$session_id'";
          mysqli_query($conn,$query);

          $query = "DELETE FROM exam_results WHERE user_id='$user_id' AND session_id='$session_id' AND exam_id='$exam_id'";
          mysqli_query($conn,$query);
          $deleted_items++;
      }
      echo "<script>
                Swal.fire({
                  icon: 'success',
                  title: 'Deleted!',
                  text: 'The ".$deleted_items." items has been deleted.',
                })
            </script>";
    }

}else if(isset($_GET['actionlogs'])){
  if(isset($_POST['function'])){

      if($_POST['function'] == "delete"){
        $id = $_POST['id'];
        if($id > 0){
        // Check record exists
        $checkRecord = mysqli_query($conn,"SELECT * FROM exam_actionlog WHERE ID=".$id);
        $totalrows = mysqli_num_rows($checkRecord);

        if($totalrows > 0){
          // Delete record
          $query = "DELETE FROM exam_actionlog WHERE ID=".$id;
          mysqli_query($conn,$query);
            echo "<script>
                      Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'The item has been deleted.',
                      })
                  </script>";
          exit;
        }else{
            echo "<script>
                      Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                      })
                  </script>";
          exit;
        }
        }
      }
  }

    if(isset($_POST['ids'])){
      $deleted_items = 0;
      foreach ($_POST['ids'] as $id) {
          $query = "DELETE FROM exam_actionlog WHERE ID='$id'";
          mysqli_query($conn,$query);
          $deleted_items++;
      }
      echo "<script>
                Swal.fire({
                  icon: 'success',
                  title: 'Deleted!',
                  text: 'The ".$deleted_items." items has been deleted.',
                })
            </script>";
    }
  
}else{


    if(isset($_POST['function'])){

      if($_POST['function'] == "edit"){
        $id = $_POST['id'];

        $query = "SELECT * FROM exams WHERE ID='$id'";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)){
          $course_id = $row['course_id'];
          $title= $row['title'];
          
          $time_limit= $row['time_limit'];
          $time_limithr = date('H', strtotime($time_limit));
          $time_limitmin = date('i', strtotime($time_limit));
          $time_limitsec = date('s', strtotime($time_limit));
          
          $time_limitdisplay= $row['time_limitdisplay'];
          $time_limitdisplayhr = date('H', strtotime($time_limitdisplay));
          $time_limitdisplaymin = date('i', strtotime($time_limitdisplay));
          $time_limitdisplaysec = date('s', strtotime($time_limitdisplay));

          $total_questions= $row['total_questions'];
          $description= $row['description'];
          $status= $row['status'];
        }
    ?>
                      
                      <div class="row">
                        
                        <div class="col-lg-4 col-md-4 col-sm-12">
                          <div class="form-group">
                            <label class="form-label">Course</label>
                            <select name="course" class="form-control" onChange="CheckmaxvalEDIT(this);" required>
                              <?php
                                  $query = "SELECT course_id, COUNT(*) 
                                      FROM exam_questions
                                      WHERE status=1
                                      GROUP BY course_id
                                      ";
                                  $result = mysqli_query($conn, $query);
                                  $course_rows = mysqli_num_rows($result);
                                  $x = 0;

                                 while($row = mysqli_fetch_array($result)){
                                  if($course_id == $row['course_id']){
                                      $maximum = $row['COUNT(*)'];
                                    }
                                ?>
                                <option data-typenumber="<?php echo $row['COUNT(*)']; ?>" 
                                        value="<?php echo $row['course_id']; ?>"
                                        <?php 
                                          if ($course_id == $row['course_id']){
                                            echo "selected";
                                          }
                                        ?>
                                  ><?php echo $row['course_id']; ?></option>
                              <?php 
                                  $x++;
                                } 
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="form-label">Exam Title</label>
                            <input name="exam_title" value="<?= $title; ?>" type="text" class="form-control" required>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="form-group">
                            <label class="form-label">Time Limit</label>
                            <br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <fieldset>
                                  <div>
                                    <small>HH </small><input name="hr_time_limit" class="in_put" id="hh_1" type="number" min="0" max="23" placeholder="00" value="<?= $time_limithr; ?>" > :
                                    <small>MM </small><input name="min_time_limit" class="in_put" id="mm_1" type="number" min="0" max="59" placeholder="00" value="<?= $time_limitmin; ?>" > :
                                    <small>SS </small><input name="sec_time_limit" class="in_put" id="ss_1"type="number" min="0" max="59" placeholder="00"  value="<?= $time_limitsec; ?>" >
                                  </div> 
                            </fieldset>
                            <br><br> 
                            <label class="form-label">Display Time</label>
                            <br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <fieldset>
                                  <div>
                                    <small>HH </small><input name="hr_time_limitdisplay" class="in_put" id="hh_1" type="number" min="0" max="23" placeholder="00" value="<?= $time_limitdisplayhr; ?>" > :
                                    <small>MM </small><input name="min_time_limitdisplay" class="in_put" id="mm_1" type="number" min="0" max="59" placeholder="00" value="<?= $time_limitdisplaymin; ?>" > :
                                    <small>SS </small><input name="sec_time_limitdisplay" class="in_put" id="ss_1"type="number" min="0" max="59" placeholder="00"  value="<?= $time_limitdisplaysec; ?>" >
                                  </div> 
                            </fieldset> 
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                          <div class="form-group">
                            <label class="form-label">Total Questions</label>
                            <br>
                            <input name="total_questions" id="totalqEDIT" type="number" min="0" max="<?php echo $maximum;  ?>" value="<?php echo $total_questions;  ?>" disabled>
                          </div>
                          <div class="form-group">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control" required>
                                      <?php 
                                            if($status == 1){
                                              echo '<option value="1" selected>Active</option>';
                                              echo '<option value="0">Inactive</option>'; 
                                            }else{
                                              echo '<option value="0" selected>Inactive</option>';
                                              echo '<option value="1">Active</option>';
                                            }
                                      ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                            <label class="form-label">Descriptions</label>
                            <textarea name="description" class="form-control" rows="5" required><?php echo $description;  ?></textarea>
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <input name="id" value="<?= $id; ?>" type="hidden" class="form-control">
                          <input name="form_edit_exams" value="true" type="hidden" class="form-control">
                        </div>
                      </div>

    <?php
        
      }

      if($_POST['function'] == "delete"){
        $id = $_POST['id'];
        if($id > 0){
        // Check record exists
        $checkRecord = mysqli_query($conn,"SELECT * FROM exams WHERE ID=".$id);
        $totalrows = mysqli_num_rows($checkRecord);
        while($row = mysqli_fetch_array($checkRecord)){
            $exam_id = $row['exam_id'];
        }
        if($totalrows > 0){
          // Delete record
          $query = "DELETE FROM exams WHERE ID=".$id;
          mysqli_query($conn,$query);

          $query = "DELETE FROM exam_qselected WHERE exam_id='$exam_id'";
          mysqli_query($conn,$query);
            echo "<script>
                      Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'The item has been deleted.',
                      })
                  </script>";
          exit;
        }else{
            echo "<script>
                      Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                      })
                  </script>";
          exit;
        }
        }
      }


      if($_POST['function'] == "status"){
          $id = $_POST['id'];
          $status = $_POST['status'];
          // Check record exists
          $checkRecord = mysqli_query($conn,"SELECT * FROM exams WHERE ID=".$id);
          $totalrows = mysqli_num_rows($checkRecord);
          while($row = mysqli_fetch_array($checkRecord)){
            $course_id = $row['course_id'];
          }
          if($totalrows > 0){

            // Update Record in Course
            $query = "UPDATE exams SET status='$status' WHERE course_id='$course_id'";
            mysqli_query($conn,$query);

            exit;
          }else{
              exit;
          }
      }



    }


    if(isset($_POST['ids'])){
      $deleted_items = 0;
      foreach ($_POST['ids'] as $id) {
          $checkRecord = mysqli_query($conn,"SELECT * FROM exams WHERE ID=".$id);
          $totalrows = mysqli_num_rows($checkRecord);
          while($row = mysqli_fetch_array($checkRecord)){
              $exam_id = $row['exam_id'];
          }

          $query = "DELETE FROM exams WHERE ID=".$id;
          mysqli_query($conn,$query);

          $query = "DELETE FROM exam_qselected WHERE exam_id='$exam_id'";
          mysqli_query($conn,$query);
          $deleted_items++;
      }
      echo "<script>
                Swal.fire({
                  icon: 'success',
                  title: 'Deleted!',
                  text: 'The ".$deleted_items." items has been deleted.',
                })
            </script>";
    }


    if(isset($_POST['form_exams'])){
      require '../functions.php';
      $exam_id = $_POST['course_id'].random_strings(6);
      $course_id = $_POST['course_id'];
      $title = $_POST['title'];
      $total_questions = $_POST['total_questions'];
      $description = $_POST['description'];

      $time_limit = date('H:i:s', 
                      strtotime(
                        $_POST['hr_time_limit'].":".
                        $_POST['min_time_limit'].":".
                        $_POST['sec_time_limit']
                      ));

      $time_limitdisplay = date('H:i:s', 
                      strtotime(
                        $_POST['hr_time_limitdisplay'].":".
                        $_POST['min_time_limitdisplay'].":".
                        $_POST['sec_time_limitdisplay']
                      ));

      $status = $_POST['status'];

      $today_date = date_create();
      date_timezone_set($today_date,timezone_open("+08:00"));
      $date_created = date_format($today_date,"Y-m-d H:i:s");  

      $query = "SELECT * FROM exam_questions WHERE course_id='$course_id'";
      $result = mysqli_query($conn, $query);
      if($total_questions > mysqli_num_rows($result)){
          echo "<script>
                Swal.fire({
                  icon: 'warning',
                  title: 'Warning!',
                  text: 'There aren't enough exam Questions from ".$course_id.". Please try again.',
                })
            </script>";
          die();
      }

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
                            '$title',
                            '$time_limit',
                            '$time_limitdisplay',
                            '$total_questions',
                            '$description',
                            '$status', 
                            '$date_created'
                        )
                ";
        if ($conn->query($sql) === TRUE) { 
            echo "<script>
                      Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'A set of questions has been added.',
                      })
                  </script>";
        }

        $query = "SELECT * FROM exam_questions WHERE status=1 AND course_id='$course_id' ORDER BY RAND()";
        $result = mysqli_query($conn, $query);
        
        $x = 0;
        while($row = mysqli_fetch_array($result)){
            $question = $row['question'];
            $option_1 = $row['option_1'];
            $option_2 = $row['option_2'];
            $option_3 = $row['option_3'];
            $option_4 = $row['option_4'];
            $option_5 = $row['option_5'];
            $answer = $row['answer'];
            $sql = "INSERT INTO exam_qselected (
                            exam_id, 
                            course_id, 
                            question,
                            option_1,
                            option_2,
                            option_3,
                            option_4,
                            option_5,
                            answer
                            )
                VALUES ( 
                            '$exam_id', 
                            '$course_id',
                            '$question',
                            '$option_1',
                            '$option_2',
                            '$option_3',
                            '$option_4',
                            '$option_5',
                            '$answer'
                        )
            ";
           mysqli_query($conn, $sql);
           if($x == $total_questions-1){
              die();
           }
           $x++;
        }
    }



    if(isset($_POST['form_edit_exams'])){
      $id = $_POST['id'];
      $course_id = $_POST['course'];
      $exam_title = $_POST['exam_title'];
      $description = $_POST['description'];

      $time_limit = date('H:i:s', 
                      strtotime(
                        $_POST['hr_time_limit'].":".
                        $_POST['min_time_limit'].":".
                        $_POST['sec_time_limit']
                      ));

      $time_limitdisplay = date('H:i:s', 
                      strtotime(
                        $_POST['hr_time_limitdisplay'].":".
                        $_POST['min_time_limitdisplay'].":".
                        $_POST['sec_time_limitdisplay']
                      ));

      $status = $_POST['status'];

      $query = "SELECT * FROM exams WHERE title='$exam_title'";
      $result = mysqli_query($conn, $query);
      if(mysqli_num_rows($result) > 1){
          echo "<script>
                Swal.fire({
                  icon: 'warning',
                  title: 'Warning!',
                  text: 'Exam title already exists. Please try again.',
                })
            </script>";
          die();
      }

        $sql = "UPDATE exams
                SET 
                  course_id='$course_id',
                  title='$exam_title',
                  time_limit='$time_limit',
                  time_limitdisplay='$time_limitdisplay',
                  status='$status',
                  description='$description'
                WHERE ID='$id'
                ";

        if ($conn->query($sql) === TRUE) { 
            echo "<script>
                      Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'The exam has been updated.',
                      })
                  </script>";
        }
    }
}

