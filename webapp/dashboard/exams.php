<?php 
	$current_page = "Exams"; 
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
								    $("#add_exams").on("submit", function(event){
									        event.preventDefault();
									 
									        var formValues= $(this).serialize();
									 
									        $.post("exams_manage.php", formValues, function(data){
															$("#message_exams").html(data);
								        			$("#example5").load(window.location.href + " #example5" );
									        });
								    });

								    $("#delete_multiple").on("submit", function(event){
									        event.preventDefault();
									 
									        var formValues= $(this).serialize();
									 
									        $.post("exams_manage.php", formValues, function(data){
									        	$('input:checked').not('.all').parents("tr").remove();
									            $("#result").html(data);
									        });
								    });

				            $("#edit_exams").on("submit", function(event){
				                event.preventDefault();
				                 
				                var formValues= $(this).serialize();
				                 
				                $.post("exams_manage.php", formValues, function(data){
				                  $("#exams_edit_message").html(data);
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
								xhttp.open("POST", "exams_manage.php", true);
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
								xhttp.open("POST", "exams_manage.php", true);
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
								xhttp.open("POST", "exams_manage.php", true);
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

<script>
function Checkmaxval(course){
	var maximum = course.options[course.selectedIndex].getAttribute('data-typenumber');
	document.getElementById("totalq").max = maximum;
}

function CheckmaxvalEDIT(course){
	var maximum = course.options[course.selectedIndex].getAttribute('data-typenumber');
	document.getElementById("totalqEDIT").max = maximum;
}

</script>


				<div class="row">

					<div class="col-xl-12 col-xxl-12 col-sm-12">
						<div class="row">

							<div class="col-xl-12 col-xxl-12 col-sm-12">
							<div id="message_exams"></div>
							<div class="card">
                            <div class="card-header">
								<h3>Add Exams</h3>
							</div>
							<div class="card-body">
                <form id="add_exams">
									<div class="row">
										
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="form-group">
												<label class="form-label">Course</label>
												<select name="course_id" class="form-control" onChange="Checkmaxval(this);" required>
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
											       	if($x == 0){
											       		$maximum = $row['COUNT(*)'];
											       	}
											      ?>
												    <option data-typenumber="<?php echo $row['COUNT(*)']; ?>" value="<?php echo $row['course_id'];?>" > <?php echo $row['course_id']; ?></option>
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
												<input name="title" type="text" class="form-control" required>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Time Limit</label>
												<br>
									      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									      <fieldset>
									            <div>
									              <small>HH </small><input name="hr_time_limit" class="in_put" id="hh_1" type="number" min="0" max="23" placeholder="00" value=0 > :
									              <small>MM </small><input name="min_time_limit" class="in_put" id="mm_1" type="number" min="0" max="59" placeholder="00" value=0 > :
									              <small>SS </small><input name="sec_time_limit" class="in_put" id="ss_1"type="number" min="0" max="59" placeholder="00"  value=0 >
									            </div> 
									      </fieldset>
									      <br><br> 
												<label class="form-label">Display Time</label>
									      <br>
									      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									      <fieldset>
									            <div>
									              <small>HH </small><input name="hr_time_limitdisplay" class="in_put" id="hh_1" type="number" min="0" max="23" placeholder="00" value=0 > :
									              <small>MM </small><input name="min_time_limitdisplay" class="in_put" id="mm_1" type="number" min="0" max="59" placeholder="00" value=0 > :
									              <small>SS </small><input name="sec_time_limitdisplay" class="in_put" id="ss_1"type="number" min="0" max="59" placeholder="00"  value=0 >
									            </div> 
									      </fieldset> 
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12">
											<div class="form-group">
												<label class="form-label">Total Questions</label>
												<br>

												<input name="total_questions" id="totalq" type="number" min="0" max="<?php if(isset($maximum)){ echo $maximum; } ?>" required>
											</div>
											<div class="form-group">
												<label class="form-label">Status</label>
												<select name="status" class="form-control" required>
													<option value="1">Active</option>
													<option value="0">Inactive</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<label class="form-label">Descriptions</label>
												<textarea name="description" class="form-control" required></textarea>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<input name="form_exams" value="true" type="hidden" class="form-control">
											<input type="submit" name="send_exams_form" value="Submit" class="btn btn-primary">
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
								<h3 class="card-title">Exams List</h3>
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
                                                <th>Exam ID</th>
                                                <th>Course ID</th>
                                                <th>Title</th>
                                                <th>TIme Limit</th>
                                                <th>Time Limit Display</th>
                                                <th>Total Questions</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Date Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php 
								                $query = "SELECT * FROM exams";
								                $result = mysqli_query($conn,$query);
								                $count = 1;
								                while($row = mysqli_fetch_array($result) ){
								                    $id = $row['ID'];
								                    $exam_id = $row['exam_id'];
								                    $course_id = $row['course_id'];
																		$title = $row['title'];
																		$time_limit = $row['time_limit'];
																		$time_limitdisplay = $row['time_limitdisplay'];
																		$description = $row['description'];
																		$total_questions = $row['total_questions'];
																		$status = $row['status'];
								                    $date_created = $row['date_created'];
								                ?>
								                    <tr id="<?= $id; ?>">
								                    	<td><input type="checkbox" value="<?= $id; ?>" name="ids[]"></td>
								                        <td><?= $exam_id; ?></td>
								                        <td><?= $course_id; ?></td>
								                        <td><?= $title; ?></td>
								                        <td><?= $time_limit; ?></td>
								                        <td><?= $time_limitdisplay; ?></td>
								                        <td><?= $total_questions; ?></td>
								                        <td><?= $description; ?></td>
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
			
			<div class="col-xl-12 col-xxl-12 col-sm-12">
				<div id="exams_edit_message"></div>
			</div>
			
			<!-- EDIT FORM-->
			<div id="edit_form_hide">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
              <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                  <div id="exams_edit_message"></div>
                    <div class="card">
                      <div class="card-header">
                        <h3>Edit Exams</h3>
                         <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close" onclick="jQuery('#edit_form_hide').toggle('show');"><span><i class="mdi mdi-close"></i></span>
                                        </button>
                      </div>
                      <div class="card-body">
                          <form id="edit_exams">
															<div id="edit_form"></div>
															<input type="submit" name="_exams_form" value="Update" class="btn btn-primary">
                        </form>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            </div>

<?php include 'footer.php';?>