<?php
require '../connection.php';
if(isset($_POST['id'])){
  $id = $_POST['id'];
  $username= $_POST['username'];
  
  $sql = "UPDATE tokens
          SET 
            username='$username'
          WHERE ID='$id'
        ";  
  mysqli_query($conn, $sql);

  $sql = "SELECT * FROM tokens WHERE ID='$id'"; 
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)) {
    $new_user = $row['username'];
  }

  echo $new_user;
}