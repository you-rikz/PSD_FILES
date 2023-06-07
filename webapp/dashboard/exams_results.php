<?php 
$current_page = "Exams Results"; 
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
								    $("#delete_multiple").on("submit", function(event){
									        event.preventDefault();
									 
									        var formValues= $(this).serialize();
									 
									        $.post("exams_manage.php?result=1", formValues, function(data){
									        	$('input:checked').not('.all').parents("tr").remove();
									            $("#result").html(data);
									        });
								    });
								});

							function sendAjaxRequest_Enable(id, btn) {
									if(btn.textContent == 'On-going'){
										var status = 0;
									}else{
										var status = 1;
									}
									// Create a new XMLHttpRequest object
									var xhttp = new XMLHttpRequest();

									// Set the callback function to handle the response
									xhttp.onreadystatechange = function() {
										if (this.readyState == 4 && this.status == 200) {
												if(btn.textContent == 'Finished'){
													btn.className = "btn btn btn-sm btn-danger";
													btn.textContent = 'On-going';
												}else{
													btn.className = "btn btn btn-sm btn-success";
													btn.textContent = 'Finished';
												}

										}
									};

								// Open the connection and send the request
								xhttp.open("POST", "exams_manage.php?result=1", true);
								 xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								xhttp.send("id=" + id + "&function=status" + "&status=" + status);
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
								xhttp.open("POST", "exams_manage.php?result=1", true);
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
					<div class="col-lg-12">
						<div id="result"></div>
						<form id="delete_multiple">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Exam Results</h3>
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
                                                <th>User Id</th>
                                                <th>Exam Id</th>
                                                <th>Kept Score</th>
                                                <th>Total Score</th>
                                                <th>Status</th>
                                                <th>Date Started</th>
                                                <th>Date Ended</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php 
								                $query = "SELECT * FROM exam_session";
								                $result = mysqli_query($conn,$query);
								                $count = 1;
								                while($row = mysqli_fetch_array($result) ){
								                    $id = $row['ID'];
								                    $user_id = $row['user_id'];
								                    $exam_id= $row['exam_id'];
								                    $kept_score= $row['kept_score'];
								                    $total_score= $row['total_score'];
								                    $status= $row['status'];
								                    $date_started= $row['datetime_started'];
								                    $date_finished= $row['datetime_finished'];
								                ?>
								                    <tr id="<?= $id; ?>">
								                    	<td><input type="checkbox" value="<?= $id; ?>" name="ids[]"></td>
								                        <td><?= $user_id; ?></td>
								                        <td><?= $exam_id; ?></td>
								                        <td><?= $kept_score; ?></td>
								                        <td><?= $total_score; ?></td>
								                        <td>
								                        	<?php 
								                        	if($status == 1){
								                        		?>
								                        			<button class="btn btn btn-sm btn-danger" onclick="sendAjaxRequest_Enable('<?= $id; ?>', this)">On-going</button>
								                        		<?php
								                        	}else{
								                        		?>
								                        		<button class="btn btn btn-sm btn-success" onclick="sendAjaxRequest_Enable('<?= $id; ?>', this)">Finished</button>
								                        		<?php
								                        	} 
								                        	?>
								                        </td>
																				<td><?= $date_started; ?></td>
								                        <td><?= $date_finished; ?></td>
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