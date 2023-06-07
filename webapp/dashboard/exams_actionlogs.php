<?php 
$current_page = "Exam Action Logs"; 
include 'header.php';
 
 require '../connection.php';

  $today_date = date_create();
  date_timezone_set($today_date,timezone_open("+08:00"));
  $date_created = date_format($today_date,"Y-m-d H:i");
  $date_expired = date('Y-m-d H:i', strtotime("+30 days", strtotime($date_created))); // CHANGE if needed
 
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
						<script>
								$(document).ready(function(){
								    $("#delete_multiple").on("submit", function(event){
									        event.preventDefault();
									 
									        var formValues= $(this).serialize();
									 
									        $.post("exams_manage.php?actionlogs=1", formValues, function(data){
									        	$('input:checked').not('.all').parents("tr").remove();
									            $("#result").html(data);
									        });
								    });
								});

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
								xhttp.open("POST", "exams_manage.php?actionlogs=1", true);
								 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								xhttp.send("id=" + id + "&function=delete");
								}
							}
						</script>

<style type="text/css">
		fieldset {
			border-radius: 5px;
			width: max-content;
			display: inline-block;
		}
		
		.in_put{
			background-color: white;
			display: inline-flex;
			border: 1px solid #ccc;
			color: #555;
			width :90px;												 
		}										 
</style>

					<div class="col-lg-12">
						<div id="result"></div>
						<form id="delete_multiple">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Action Logs</h3>
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
                                                <th>Session ID</th>
                                                <th>User ID</th>
                                                <th>Current Question</th>
                                                <th>Selected Option</th>
                                                <th>Date Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php 
								                $query = "SELECT * FROM exam_actionlog";
								                $result = mysqli_query($conn,$query);
								                $count = 1;
								                while($row = mysqli_fetch_array($result) ){
								                    $id = $row['ID'];
								                    $session_id= $row['session_id'];
								                    $user_id = $row['user_id'];
								                    $current_question = $row['current_question'];
								                    $selected_option = $row['selected_option'];
								                    $date_created = $row['date_created'];

								                ?>
								                    <tr id="<?= $id; ?>">
								                    	<td><input type="checkbox" value="<?= $id; ?>" name="ids[]"></td>
								                        <td><?= $session_id; ?></td>
								                        <td><?= $user_id; ?></td>
								                        <td><?= $current_question; ?></td>
								                        <td><?= $selected_option; ?></td>
														<td><?= $date_created; ?></td>
								                        <td>
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


			<style>
				#edit_form_hide{
				  display: none;
				}
			</style>

<?php include 'footer.php';?>