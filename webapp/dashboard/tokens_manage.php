<?php 
require '../connection.php';


if(isset($_POST['function'])){

  if($_POST['function'] == "edit"){
    $id = $_POST['id'];

    $query = "SELECT * FROM tokens WHERE ID='$id'";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result)){
      $email = $row['email'];
      $username = $row['username'];
      $token = $row['token'];
      $course_id = $row['course_id'];
      $status = $row['status'];

      $date_created = date('Y-m-d H:i', strtotime($row['date_created']));
      $date_expired = date('Y-m-d H:i', strtotime($row['date_expired']));
    }
?>

                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <div class="form-group">
                                <label class="form-label">Email</label>
                                <input name="email" value="<?= $email; ?>" type="text" class="form-control" required>
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <div class="form-group">
                                <label class="form-label">Username</label>
                                <input name="username" value="<?= $username; ?>" type="text" class="form-control" required>
                              </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                              <div class="form-group">
                                <label class="form-label">Course</label>
                                <select name="course_id" class="form-control" required>
                                  <?php
                                   $query = "SELECT * FROM course";
                                     $result = mysqli_query($conn, $query);
                                     $x = 1;
                                     while($row = mysqli_fetch_array($result)){
                                    ?>
                                    <option 
                                      value="<?php echo $row['course_id']; ?>"
                                      <?php 
                                        if($row['course_id'] == $course_id){
                                          echo "selected";  
                                        }
                                      ?>
                                    >
                                      <?php echo $row['course_id']; ?>
                                    </option>
                                  <?php } ?>
                                </select>
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
                            <div class="col-lg-6 col-md-6 col-sm-12">
                              <div class="form-group">
                                <label class="form-label">Date of Expiration</label>
                                <input name="date_expired" value="<?= $date_expired; ?>" min="<?php echo $date_created; ?>" type="datetime-local" class="datepicker-default form-control" id="datepicker1">
                              </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12 col-sm-12">
                              <input name="form_edit_token" value="<?= $id; ?>" type="hidden" class="form-control">
                             
                            </div>
                          </div>

<?php
    
  }

  if($_POST['function'] == "delete"){
    $id = $_POST['id'];
    if($id > 0){
    // Check record exists
    $checkRecord = mysqli_query($conn,"SELECT * FROM tokens WHERE ID=".$id);
    $totalrows = mysqli_num_rows($checkRecord);

    if($totalrows > 0){
      // Delete record
      $query = "DELETE FROM tokens WHERE ID=".$id;
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
      if($id > 0){
      // Check record exists
      $checkRecord = mysqli_query($conn,"SELECT * FROM tokens WHERE ID=".$id);
      $totalrows = mysqli_num_rows($checkRecord);

      if($totalrows > 0){
        // Delete record
        $query = "UPDATE tokens SET status='$status' WHERE ID=".$id;
        mysqli_query($conn,$query);
            echo "<script>
                      Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'The question has been updated.',
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
      $query = "DELETE FROM tokens WHERE ID=".$id;
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

if(isset($_POST['form_edit_token'])){
    $id = $_POST['form_edit_token'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $course_id = $_POST['course_id'];
    $status = $_POST['status'];
    $date_expired = date('Y-m-d H:i:s', strtotime($_POST['date_expired']));

    $query = "SELECT * FROM tokens WHERE email='$email' OR username='$username' ";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 1){
          echo "<script>
                Swal.fire({
                  icon: 'warning',
                  title: 'Warning!',
                  text: 'Email or Username was already taken. Please try again.',
                })
            </script>";
      die();
    }

    $sql = "UPDATE tokens 
            SET email='$email', 
                username='$username', 
                course_id='$course_id', 
                status='$status', 
                date_expired='$date_expired'
            WHERE ID=".$id;

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