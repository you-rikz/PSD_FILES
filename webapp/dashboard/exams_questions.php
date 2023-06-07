<?php 
$current_page = "Exam Questions"; 
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
									 
									        $.post("exams_manage.php?question=1", formValues, function(data){
															$("#message_exams").html(data);
								        			$("#example5").load(window.location.href + " #example5" );
									        });
								    });

								    $("#delete_multiple").on("submit", function(event){
									        event.preventDefault();
									 
									        var formValues= $(this).serialize();
									 
									        $.post("exams_manage.php?question=1", formValues, function(data){
									        	$('input:checked').not('.all').parents("tr").remove();
									            $("#result").html(data);
									        });
								    });

				            $("#edit_exams").on("submit", function(event){
				                event.preventDefault();
				                 
				                var formValues= $(this).serialize();
				                 
				                $.post("exams_manage.php?question=1", formValues, function(data){
				                  $("#exams_edit_message").html(data);
				                  $("#example5").load(window.location.href + " #example5" );
				                });
				            }); 



								});

							function send_file_submit(files) {
									// Create a new XMLHttpRequest object
									var xhttp = new XMLHttpRequest();
									// Set the callback function to handle the response
								xhttp.onreadystatechange = function() {
									document.getElementById("message_exams").innerHTML = this.responseText;
									$("#example5").load(window.location.href + " #example5" );
								};

								// Open the connection and send the request
								xhttp.open("POST", "import_csv.php", true);
								xhttp.setRequestHeader("Cache-Control", "no-cache");
								xhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
								xhttp.setRequestHeader("X-File-Name", files.name);
								xhttp.send(files);
								document.getElementById("message_exams").innerHTML = '<div class="alert alert-info solid alert-right-icon alert-dismissible fade show"><span><i class="fa fa-cog fa-spin"></i></span><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button> Updating rows</div>';
							}

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
								xhttp.open("POST", "exams_manage.php?question=1", true);
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

											EDITcreateSelection(document.getElementById("answerhidden").value);
										}
									};

								// Open the connection and send the request
								xhttp.open("POST", "exams_manage.php?question=1", true);
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
								xhttp.open("POST", "exams_manage.php?question=1", true);
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
					
					<div class="col-xl-12 col-xxl-12 col-sm-12">
						<div class="row">

							<div class="col-xl-12 col-xxl-12 col-sm-12">
							<div id="message_exams">
							</div>
							<div class="card">
                <div class="card-header">
									<h3>Add Questions</h3>

									<form method="POST" name="upload" enctype="multipart/form-data" id="file_submit">

									<div class="btn-group" role="group">
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="btn-icon-left text-success">
													<i class="fa fa-upload color-success"></i>
		                    </span>
		                    CSV to Rows</button>
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 36px, 0px);">
                        	<?php
														 $query = "SELECT * FROM course";
														 $result = mysqli_query($conn,$query);
											       while($row = mysqli_fetch_array($result)){
											      ?>
											      <button type="button" onclick="importData('<?php echo $row['course_id']; ?>')" class="dropdown-item"><?php echo $row['course_id']; ?></button>
												  <?php 
														} 
												  ?>
                          
                        </div>
                   </div>
	                </form>
								</div>
							<div class="card-body">
                <form id="add_exams">
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
												    <option value="<?php echo $row['course_id']; ?>"><?php echo $row['course_id']; ?></option>
												  <?php 
														} 
												  ?>
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Question</label>
												<input name="question" type="text" class="form-control" required>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Option 1</label>
												<input onkeyup="removeselection()" id="option_1"  name="option_1" type="text" class="form-control" required>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Option 2</label>
												<input onkeyup="removeselection()" id="option_2"  name="option_2" type="text" class="form-control" required>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Option 3</label>
												<input onkeyup="removeselection()" id="option_3" name="option_3" type="text" class="form-control" required>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Option 4</label>
												<input onkeyup="removeselection()" id="option_4"  name="option_4" type="text" class="form-control" required>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Option 5</label>
												<input onkeyup="removeselection()" id="option_5" name="option_5" type="text" class="form-control" required>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12"></div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Answer</label>
												<div id="answer_div">
												</div>

												<br>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Status</label>
												<select name="status" class="form-control" required>
													<option value="1">Active</option>
													<option value="0">Inactive</option>
												</select>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<input name="form_exams" value="true" type="hidden" class="form-control">
											<input type="submit" id="questionform_submit" name="send_exams_form" value="Submit" class="btn btn-primary">
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
								<h3 class="card-title">Question List</h3>
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
                                                <th>Course</th>
                                                <th>Question</th>
                                                <th>Option 1</th>
                                                <th>Option 2</th>
                                                <th>Option 3</th>
                                                <th>Option 4</th>
                                                <th>Option 5</th>
                                                <th>Answer</th>
                                                <th>Status</th>
                                                <th>Date Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php 
								                $query = "SELECT * FROM exam_questions";
								                $result = mysqli_query($conn,$query);
								                $count = 1;
								                while($row = mysqli_fetch_array($result) ){
								                    $id = $row['ID'];
								                    $course_id = $row['course_id'];
								                    $question= $row['question'];
								                    $option_1= $row['option_1'];
								                    $option_2= $row['option_2'];
								                    $option_3= $row['option_3'];
								                    $option_4= $row['option_4'];
								                    $option_5= $row['option_5'];
								                    $answer= $row['answer'];
								                    $status= $row['status'];
								                    $date_created= $row['date_created'];

								                ?>
								                    <tr id="<?= $id; ?>">
								                    	<td><input type="checkbox" value="<?= $id; ?>" name="ids[]"></td>
								                        <td><?= $course_id; ?></td>
								                        <td><?= $question; ?></td>
								                        <td><?= $option_1; ?></td>
								                        <td><?= $option_2; ?></td>
								                        <td><?= $option_3; ?></td>
								                        <td><?= $option_4; ?></td>
								                        <td><?= $option_5; ?></td>
								                        <td><?= $answer; ?></td>
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

			<style>
				#edit_form_hide{
				  display: none;
				}
			</style>

				<!-- EDIT FORM-->
			<div id="edit_form_hide">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div id="exams_edit_message"></div>
              <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                  <div id="exams_edit_message"></div>
                    <div class="card">
                      <div class="card-header">
                        <h3>Edit Question</h3>
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