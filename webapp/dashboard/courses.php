<?php 
$current_page = "Courses"; 
include 'header.php';

if($_SESSION['admin'] == 0){
	die();
}


 require '../connection.php';

  $today_date = date_create();
  date_timezone_set($today_date,timezone_open("+08:00"));
  $date_created = date_format($today_date,"Y-m-d H:i");
  $date_expired = date('Y-m-d H:i', strtotime("+30 days", strtotime($date_created))); // CHANGE if needed

?>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
						<script>
								$(document).ready(function(){
								    $("#add_course").on("submit", function(event){
									        event.preventDefault();
									 
									        var formValues= $(this).serialize();
									 
									        $.post("courses_manage.php", formValues, function(data){
															$("#message_course").html(data);
								        			$("#example5").load(window.location.href + " #example5" );
									        });
								    });

								    $("#delete_multiple").on("submit", function(event){
									        event.preventDefault();
									 
									        var formValues= $(this).serialize();
									 
									        $.post("courses_manage.php", formValues, function(data){
									        	$('input:checked').not('.all').parents("tr").remove();
									            $("#result").html(data);
									        });
								    });

				            $("#edit_course").on("submit", function(event){
				                event.preventDefault();
				                 
				                var formValues= $(this).serialize();
				                 
				                $.post("courses_manage.php", formValues, function(data){
				                  $("#course_edit_message").html(data);
				                  $("#example5").load(window.location.href + " #example5" );
				                });
				            }); 
								});
							function sendAjaxRequest_Enable(id, btn) {
								if (confirm("Caution: Exam Questions and Exams Setup are going to be deactivated.") == true) {
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
									xhttp.open("POST", "courses_manage.php", true);
									 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
									xhttp.send("id=" + id + "&function=status" + "&status=" + status);
								}
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
								xhttp.open("POST", "courses_manage.php", true);
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
								xhttp.open("POST", "courses_manage.php", true);
								 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								xhttp.send("id=" + id + "&function=delete");
								}
							}
						</script>


				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
						<div class="row">
							<div class="col-xl-12 col-xxl-12 col-sm-12">
							<div id="message_course"></div>
							<div class="card">
                            <div class="card-header">
								<h3>Add a Course</h3>
							</div>
							<div class="card-body">
                <form id="add_course">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Course ID</label>
												<input name="course_id" type="text" class="form-control" required>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Course Name</label>
												<input name="course_name" type="text" class="form-control" required>
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
										<div class="col-lg-12 col-md-12 col-sm-12">
											<input name="form_course" value="true" type="hidden" class="form-control">
											<input type="submit" name="send_course_form" value="Submit" class="btn btn-primary">
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
								<h3 class="card-title">Course List</h3>
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
                                                <th>Course ID</th>
                                                <th>Course Name</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Tokens</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php 
								                $query = "SELECT * FROM course";
								                $result = mysqli_query($conn,$query);
								                $count = 1;
								                while($row = mysqli_fetch_array($result) ){
								                    $id = $row['ID'];
								                    $course_id = $row['course_id'];
																		$course_name = $row['course_name'];
																		$status = $row['status'];
								                    $date_created = $row['date_created'];
								                ?>
								                    <tr id="<?= $id; ?>">
								                    	<td><input type="checkbox" value="<?= $id; ?>" name="ids[]"></td>
								                        <td><?= $course_id; ?></td>
								                        <td><?= $course_name; ?></td>
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
								                        <?php 
																		    //ACTIVE SESSIONS
																		    $tokens_query = "SELECT * FROM tokens WHERE course_id='$course_id'";
																		    $result_tokens = mysqli_query($conn, $tokens_query);
																		    $active_course_tokens = mysqli_num_rows($result_tokens);
								                        ?>
								                        <td><?= $active_course_tokens; ?></td>
								                        <td>
                                              <button href="javascript:void(0);" class="btn btn-sm btn-primary" onclick=" sendAjaxRequest_Edit('<?= $id; ?>', this)" >
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
            <div id="course_edit_message"></div>
              <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                  <div id="course_edit_message"></div>
                    <div class="card">
                      <div class="card-header">
                        <h3>Edit Course</h3>
                         <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close" onclick="jQuery('#edit_form_hide').toggle('show');"><span><i class="mdi mdi-close"></i></span>
                                        </button>
                      </div>
                      <div class="card-body">
                          <form id="edit_course">
															<div id="edit_form"></div>
															<input type="submit" name="_course_form" value="Update" class="btn btn-primary">
                        </form>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            </div>

<?php include 'footer.php';?>