<?php 
$current_page = "Tokens"; 
include 'header.php';

if($_SESSION['admin'] == 0){
	die();
}
 

require '../connection.php';


if(isset($_POST['send_token'])){
	require '../email/vendor/autoload.php'; 
	require '../functions.php';
	include '../email/email_token.php';
}

  $today_date = date_create();
  date_timezone_set($today_date,timezone_open("+08:00"));
  $date_created = date_format($today_date,"Y-m-d H:i");
  $date_expired = date('Y-m-d H:i', strtotime("+30 days", strtotime($date_created))); // CHANGE if needed

?>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
						<script>
								$(document).ready(function(){
									$("#add_token").on("submit", function(event){
								        event.preventDefault();
								        var formValues= $(this).serialize();
								        $.post("../email/email_token.php", formValues, function(data){
								        	$("#message_token").html(data);
								        	$("#example5").load(window.location.href + " #example5" );
								        });
								    });

								    $("#delete_multiple").on("submit", function(event){
									        event.preventDefault();
									 
									        var formValues= $(this).serialize();
									 
									        $.post("tokens_manage.php", formValues, function(data){
									        	$('input:checked').not('.all').parents("tr").remove();
									            $("#result").html(data);
									        });
								    });
				            $("#edit_token").on("submit", function(event){
				                event.preventDefault();
				                 
				                var formValues= $(this).serialize();
				                 
				                $.post("tokens_manage.php", formValues, function(data){
				                  $("#token_edit_message").html(data);
				                  $("#example5").load(window.location.href + " #example5" );
				                });
				            }); 
								});
							function sendAjaxRequest_Enable(id, btn) {
									if(btn.textContent == 'Inactive'){
										var status = 1;
									}else{
										var status = 0;
									}
									// Create a new XMLHttpRequest object
									var xhttp = new XMLHttpRequest();

									// Set the callback function to handle the response
									xhttp.onreadystatechange = function() {
										if (this.readyState == 4 && this.status == 200) {
												if(btn.textContent == 'Inactive'){
													btn.className = "btn btn btn-sm btn-success";
													btn.textContent = 'Active';
												}else{
													btn.className = "btn btn btn-sm btn-danger";
													btn.textContent = 'Inactive';
												}

										}
									};

								// Open the connection and send the request
								xhttp.open("POST", "tokens_manage.php", true);
								 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								xhttp.send("id=" + id + "&function=status" + "&status=" + status);
							}

							function sendAjaxRequest_Edit(id, btn) {
									// Create a new XMLHttpRequest object
									var xhttp = new XMLHttpRequest();

									// Set the callback function to handle the response
									xhttp.onreadystatechange = function() {
										if (this.readyState == 4 && this.status == 200) {
											jQuery('#edit_form_hide').toggle('show');
											document.getElementById("edit_form").innerHTML = this.responseText;
										}
									};

								// Open the connection and send the request
								xhttp.open("POST", "tokens_manage.php", true);
								 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								xhttp.send("id=" + id + "&function=edit");
							}

							function sendAjaxRequest(id, btn) {
								if (confirm("Are you sure you want to delete this item?") == true) {
									// Create a new XMLHttpRequest object
									var xhttp = new XMLHttpRequest();

									// Set the callback function to handle the response
									xhttp.onreadystatechange = function() {
										if (this.readyState == 4 && this.status == 200) {
										    var row = btn.parentNode.parentNode;
	  										row.parentNode.removeChild(row);
										}
									};

								// Open the connection and send the request
								xhttp.open("POST", "tokens_manage.php", true);
								 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								xhttp.send("id=" + id + "&function=delete");
								}
							}
						</script>


				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
						<div class="row">
							<div class="col-xl-12 col-xxl-12 col-sm-12">
							<div id="message_token"></div>
							<div class="card">
                            <div class="card-header">
								<h3>Generate A Token</h3>
							</div>
							<div class="card-body">
                                <form id="add_token">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Email</label>
												<input name="email" type="text" class="form-control" required>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Username</label>
												<input name="username" type="text" class="form-control" required>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="form-group">
												<label class="form-label">Course</label>
												<select name="course" class="form-control" required>
												  <?php
												   $query = "SELECT * FROM course";
											       $result = mysqli_query($conn, $query);
											       $x = 1;
											       while($row = mysqli_fetch_array($result)){
											      ?>
												    <option value="<?php echo $row['course_id']; ?>"><?php echo $row['course_id']; ?></option>
												  <?php } ?>
												</select>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="form-group">
												<label class="form-label">Status</label>
												<select name="status" class="form-control" required>
													<option value="1">Active</option>
													<option value="0">Inactive</option>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Date of Expiration</label>
												<input name="date_expired" value="<?php echo $date_expired; ?>" min="<?php echo $date_created; ?>" type="datetime-local" class="datepicker-default form-control" id="datepicker1">
											</div>
										</div>
										
										<div class="col-lg-12 col-md-12 col-sm-12">
											<input name="form_token" value="true" type="hidden" class="form-control">
											<input type="submit" name="send_token_form" value="Generate" class="btn btn-primary">
										</div>
									</div>
								</form>
                            </div>
                        </div>
							</div>
						</div>
                    </div>
					<div class="col-lg-12">
						<div id="result"></div>
						<form id="delete_multiple">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Token List</h3>
								<span>
								<button type="submit" name="bulkdel" class="btn btn-danger">— Bulk Delete</button>
								</span>
							</div>
							<div class="card-body">
								<div class="table-responsive">
                                   
                                    <table id="example5" class="display">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" onclick="selectscheckbox()"></th>
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th>Token</th>
                                                <th>Course ID</th>
                                                <th>Status</th>
                                                <th>Date Created</th>
                                                <th>Date Expired</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php 
								                $query = "SELECT * FROM tokens";
								                $result = mysqli_query($conn,$query);
								                $count = 1;
								                while($row = mysqli_fetch_array($result) ){
								                    $id = $row['ID'];
								                    $email = $row['email'];
								                    $username = $row['username'];
								                    $token = $row['token'];
								                    $course_id = $row['course_id'];
								                    $status = $row['status'];
								                    $date_created = $row['date_created'];
								                    $date_expired= $row['date_expired'];
								                ?>
								                    <tr id="<?= $id; ?>">
								                    	<td><input type="checkbox" value="<?= $id; ?>" name="ids[]"></td>
								                        <td><?= $email; ?></td>
								                        <td><?= $username; ?></td>
								                        <td><?= $token; ?></td>
								                        <td><?= $course_id; ?></td>
								                        <td>
								                        	<?php 
								                        	if($status == 1){
								                        		?>
								                        		<button class="btn btn btn-sm btn-success" onclick="sendAjaxRequest_Enable('<?= $id; ?>', this)">Active</button>
								                        		<?php
								                        	}else{
								                        		?>
								                        		<button class="btn btn btn-sm btn-danger" onclick="sendAjaxRequest_Enable('<?= $id; ?>', this)">Inactive</button>
								                        		<?php
								                        	} 
								                        	?>
								                        	</td>
								                        <td><?= $date_created; ?></td>
								                        <td><?= $date_expired ?></td>
								                        <td>
                                                            <button href="javascript:void(0);" class="btn btn-sm btn-primary"
                                                            onclick=" sendAjaxRequest_Edit('<?= $id; ?>', this)" >
                                                                <i class="la la-pencil"></i>
                                                            </button>
                                                            <button class="btn btn btn-sm btn-danger" onclick="sendAjaxRequest('<?= $id; ?>', this)">
                                                               <i class="la la-trash-o"></i></span>
                                                            </button>
                                                    	</td>
								                    </tr>
								                <?php
								                    $count++;
								                }
							                ?> 
                                        </tbody>
                                    </table>


                                </div>
							</div>

						</div>
					</form>
					</div>

				</div>

			<style>
				#edit_form_hide{
				  display: none;
				}
			</style>
				<!-- EDIT FORM-->
			<div id="edit_form_hide">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div id="token_edit_message"></div>
              <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                  <div id="message_token"></div>
                    <div class="card">
                      <div class="card-header">
                        <h3>Edit Token</h3>
                         <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close" onclick="jQuery('#edit_form_hide').toggle('show');"><span><i class="mdi mdi-close"></i></span>
                                        </button>
                      </div>
                      <div class="card-body">
                          <form id="edit_token">
							<div id="edit_form"></div>
							<input type="submit" name="send_token_form" value="Update" class="btn btn-primary">
                        </form>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            </div>

<?php include 'footer.php';?>