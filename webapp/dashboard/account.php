<?php 
$current_page = "Account Settings"; 
include 'header.php';
require '../connection.php';
   $username =  $_SESSION['username'];
	$query = "SELECT * FROM accounts WHERE username='$username'";
	$result = mysqli_query($conn,$query);
	$count = 1;
	while($row = mysqli_fetch_array($result) ){
	    $id = $row['ID'];
	    $email= $row['email'];
	    $username = $row['username'];
	    $password = $row['password'];
	 	$acc_type = $row['acc_type'];   
	}

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
	    $("#update_account").on("submit", function(event){
		        event.preventDefault();
		        var formValues= $(this).serialize();		 
		        $.post("account_manage.php?update=1", formValues, function(data){
					$("#message_account").html(data);
	        		location.reload();
		        });
	    });
	    $("#add_account").on("submit", function(event){
		        event.preventDefault();
		        var formValues= $(this).serialize();		 
		        $.post("account_manage.php?add=1", formValues, function(data){
					$("#message_account").html(data);
		        });
	    });


	});

	function showPassword() {
	  var x = document.getElementById("update_password");
	  if (x.type === "password") {
	    x.type = "text";
	  } else {
	    x.type = "password";
	  }
	}
</script>

<div class="row">
   <div class="col-xl-12 col-xxl-12 col-sm-12">
   	  <div id="message_account"></div>
      <div class="widget-stat card">
         <div class="card-body">
            <div id="profile-settings" class="tab-pane fade active show">
               <div class="pt-3">
                  <div id="settings-form" class="settings-form">
                     <h3 class="text-primary">Account Setting<br><br></h3>
                     <form id="update_account">
                     	<input type="hidden" name="id" value="<?= $id; ?>">
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label>Email</label>
                              <input type="email" name="email" placeholder="Email" class="form-control" value="<?= $email; ?>" required>
                           </div>
                           <div class="form-group col-md-6">
                              <label>Username</label>
                              <input type="text" name="username" placeholder="Username" class="form-control" value="<?= $username; ?>" required>
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Password</label>
                           <input type="password" id="update_password" name="password" placeholder="Password" class="form-control" value="<?= $password; ?>" required>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" onclick="showPassword();" class="custom-control-input" id="gridCheck">
                              <label class="custom-control-label" for="gridCheck"> Show Password</label>
                           </div>
                        </div>
                        <button style="margin-top: 15px;" class="btn btn-primary" type="submit">Update
                        </button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php 
   if($_SESSION['admin'] == 1){
   ?>
   <div class="col-xl-12 col-xxl-12 col-sm-12">
   	  <div id="message_account"></div>
      <div class="widget-stat card">
         <div class="card-body">
            <div id="profile-settings" class="tab-pane fade active show">
               <div class="pt-3">
                  <div id="settings-form" class="settings-form">
                     <h3 class="text-primary">Add Account<br><br></h3>
                     <form id="add_account">
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label>Email</label>
                              <input type="email" name="email" placeholder="Email" class="form-control" required>
                           </div>
                           <div class="form-group col-md-6">
                              <label>Username</label>
                              <input type="text" name="username" placeholder="Username" class="form-control" required>
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Password</label>
                           <input type="password" id="add_password" name="password" placeholder="Password" class="form-control" value="" required>
                        </div>
                        <button style="margin-top: 15px;" class="btn btn-primary" type="submit">Add Account
                        </button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php
   }
   ?>

   
</div>

<?php include 'footer.php';?>