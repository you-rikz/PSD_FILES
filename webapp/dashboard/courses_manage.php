<?php 
require '../connection.php';


if(isset($_POST['function'])){

  if($_POST['function'] == "edit"){
    $id = $_POST['id'];

    $query = "SELECT * FROM course WHERE ID='$id'";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result)){
      $course_name = $row['course_name'];
      $course_id = $row['course_id'];
      $status = $row['status'];
    }
?>

                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <div class="form-group">
                                <label class="form-label">Course Name</label>
                                <input name="course_name" value="<?= $course_name; ?>" type="text" class="form-control" required>
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <div class="form-group">
                                <label class="form-label">Course Id</label>
                                <input name="course_id" value="<?= $course_id; ?>" type="text" class="form-control" required>
                              </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
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
                            </div>>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                              <input name="form_edit_course" value="<?= $id; ?>" type="hidden" class="form-control">
                             
                            </div>
                          </div>

<?php
    
  }

  if($_POST['function'] == "delete"){
    $id = $_POST['id'];
    if($id > 0){
    // Check record exists
    $checkRecord = mysqli_query($conn,"SELECT * FROM course WHERE ID=".$id);
    $totalrows = mysqli_num_rows($checkRecord);

    if($totalrows > 0){
      // Delete record
      $query = "DELETE FROM course WHERE ID=".$id;
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
      $checkRecord = mysqli_query($conn,"SELECT * FROM course WHERE ID=".$id);
      $totalrows = mysqli_num_rows($checkRecord);
      while($row = mysqli_fetch_array($checkRecord)){
        $course_id = $row['course_id'];
      }
      if($totalrows > 0){

        // Update Record in Course
        $query = "UPDATE course SET status='$status' WHERE id=".$id;
        mysqli_query($conn,$query);

        // Update Record in Course
        $query = "UPDATE exams SET status='$status' WHERE course_id='$course_id'";
        mysqli_query($conn,$query);

        $query = "UPDATE exam_questions SET status='$status' WHERE course_id='$course_id'";
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
      $query = "DELETE FROM course WHERE ID=".$id;
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


if(isset($_POST['form_course'])){
  $course_name = $_POST['course_name'];
  $course_id = $_POST['course_id'];
  $status = $_POST['status'];
  $today_date = date_create();
  date_timezone_set($today_date,timezone_open("+08:00"));
  $date_created = date_format($today_date,"Y-m-d H:i:s");  

  $query = "SELECT * FROM course WHERE course_id='$course_id' OR course_name='$course_name' ";
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result) > 0){
          echo "<script>
                Swal.fire({
                  icon: 'warning',
                  title: 'Warning!',
                  text: 'Course Id/Name already exists. Please try again.',
                })
            </script>";
      die();
  }

    $sql = "INSERT INTO course (course_id, course_name, status, date_created)
            VALUES ('$course_id' , '$course_name', '$status', '$date_created')";

    if ($conn->query($sql) === TRUE) { 
            echo "<script>
                      Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'A course has been added.',
                      })
                  </script>";
        }
}



if(isset($_POST['form_edit_course'])){
    $id = $_POST['form_edit_course'];
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];
    $status = $_POST['status'];

    $query = "SELECT * FROM course WHERE course_id='$course_id' OR course_name='$course_name' ";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 1){
          echo "<script>
                Swal.fire({
                  icon: 'warning',
                  title: 'Warning!',
                  text: 'Course Id/Name already exists. Please try again.',
                })
            </script>";
      die();
    }

    $sql = "UPDATE course
            SET course_id='$course_id',
                course_name='$course_name', 
                status='$status'
            WHERE ID='$id'";

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