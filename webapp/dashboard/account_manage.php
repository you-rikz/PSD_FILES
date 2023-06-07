<?php 
require '../connection.php';

if(isset($_GET['add'])){
  $email = $_POST['email'];
  $username= $_POST['username'];
  $password= $_POST['password'];
  

  $sql = "INSERT INTO accounts (email, username, password, acc_type)
          VALUES ('$email', '$username', '$password', '0')";

  if ($conn->query($sql) === TRUE) { 
  ?>
  <div class="alert alert-success alert-dismissible alert-alt fade show">
    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close">
      <span><i class="mdi mdi-close"></i></span>
    </button>
    <strong>Success!</strong> A record has been added.
  </div>
  <?php
  }
}

if(isset($_GET['update'])){
  $id = $_POST['id'];
  $email = $_POST['email'];
  $username= $_POST['username'];
  $password= $_POST['password'];

  $sql = "UPDATE accounts
          SET 
            email='$email',
            username='$username',
            password='$password'
          WHERE ID='$id'
        ";  
  if ($conn->query($sql) === TRUE) { 
  ?>
  <div class="alert alert-success alert-dismissible alert-alt fade show">
    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close">
      <span><i class="mdi mdi-close"></i></span>
    </button>
    <strong>Success!</strong> A record has been updated.
  </div>
  <?php
  }
}