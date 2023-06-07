<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>

<?php 
$current_page = "Dashboard"; 
include 'header.php';

    require '../connection.php';

    //ACTIVE TOKENS
    $query = "SELECT * FROM tokens WHERE status=1";
    $result = mysqli_query($conn, $query);
    $active_tokens = mysqli_num_rows($result);

    //UNACTIVE TOKENS
    $query = "SELECT * FROM tokens WHERE status=0";
    $result = mysqli_query($conn, $query);
    $unactive_tokens = mysqli_num_rows($result);


    //ACTIVE SESSIONS
    $query = "SELECT * FROM exam_session WHERE status=1";
    $result = mysqli_query($conn, $query);
    $active_sessions = mysqli_num_rows($result);

    //UNACTIVE SESSIONS
    $query = "SELECT * FROM exam_session WHERE status=0";
    $result = mysqli_query($conn, $query);
    $unactive_sessions = mysqli_num_rows($result);

    //TOKENS
    $query = "SELECT * FROM tokens";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0){
        $num_tokens = mysqli_num_rows($result);
    }else{
        $no_rows = "There are no tokens at this moment.";
        $num_tokens = 1;
        $active_tokens = 1;
    }

    //TOKENS
    $query = "SELECT * FROM exam_session";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0){
        $num_sessions = mysqli_num_rows($result);
    }else{
        $no_rows_sessions = "There are no exams at this moment.";
        $num_sessions = 1;
        $active_sessions = 1;
    }

    $total_tokens =  ($active_tokens / $num_tokens) * 100;
    $total_sessions =  ($active_sessions / $num_sessions) * 100;
    

    if(isset($_GET['exam'])){
        $exam_id = $_GET['exam'];
    }else{
        $query = "SELECT * FROM exams LIMIT 1";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)){
            $exam_id = $row['exam_id'];
        }
    }
?>
                <div class="row">
					<div class="col-xl-6 col-xxl-6 col-sm-12">
						<div class="row">
							<div class="col-xl-12 col-xxl-12 col-sm-12">
								<div class="widget-stat card">
									<div class="card-body">
										<h4 class="card-title">Total Active Tokens</h4>
                                        <?php 
                                        if(isset($no_rows)){ 
                                            echo "<small>".$no_rows."</small>";
                                        }else{ 
                                            echo "<h3>".$active_tokens." out of ".$num_tokens." </h3>";
                                        } ?>                            
										<div class="progress mb-1">
											<div class="progress-bar progress-animated bg-primary" style="width: <?php echo $total_tokens; ?>%"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>	
                    <div class="col-xl-6 col-xxl-6 col-sm-12">
                        <div class="row">
                            <div class="col-xl-12 col-xxl-12 col-sm-12">
                                <div class="widget-stat card">
                                    <div class="card-body">
                                        <h4 class="card-title">Total Current Sessions</h4>
                                        <?php
                                        if(isset($no_rows_sessions)){ 
                                            echo "<small>".$no_rows_sessions."</small>";
                                        }else{  
                                            echo "<h3>".$active_sessions." out of ".$num_sessions."</h3>"; 
                                        }?>                            
                                        <div class="progress mb-1">
                                            <div class="progress-bar progress-animated bg-success" style="width: <?php echo $total_sessions; ?>%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>	

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"> </script>
                    <div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">
                        <form action="export_pdf.php" target="_blank" method="POST" name="upload" enctype="multipart/form-data" id="file_submit">

                            <div class="btn-group" role="group" style="margin:20px;float: right;">
                                <button type="submit" name="exam_id" class="btn btn-danger" value="<?php echo $exam_id; ?>" onclick="saveBarimg('<?php echo $exam_id; ?>');">Export to PDF<span class="btn-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
  <path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z"/>
  <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z"/>
</svg></span>
                                </button>
                            </div>
                        </form>
                        <center>
                            <br>
                                <div class="dropdown custom-dropdown">
                                            <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="dropdown" aria-expanded="false">Select Exams
                                                <i class="fa fa-angle-down ml-3"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-30px, 31px, 0px);">
                                                   <?php
                                                   require '../connection.php';
                                                   $query = "SELECT * FROM exams";
                                                   $result = mysqli_query($conn, $query);
                                                   $x = 1;
                                                   while($row = mysqli_fetch_array($result)){
                                                  ?>
                                                    <a class="dropdown-item" href="index.php?exam=<?php echo $row['exam_id']; ?>"><?php echo $row['exam_id']; ?> - <?php echo $row['course_id']; ?></a>
                                                  <?php 
                                                        if($x == 1){
                                                            $exam_id = $row['exam_id'];
                                                        }
                                                        $x++;
                                                    } 
                                                  ?>
                                            </div>
                                </div>
                             <br>


                        </center>
                            <div id="table_result">
                                <?php include 'chart.php';?>
                            </div>
                            <script>
                            function saveBarimg(exam_id) {
                                html2canvas($("#table_result"), {
                                    onrendered: function(canvas) {
                                        var dataURL = canvas.toDataURL();
                                        $.ajax({
                                            type: "POST",
                                            url: "save-chart.php?exam_id="+ exam_id,
                                            data: {
                                                imgBase64: dataURL
                                            }
                                        }).done(function(o) {
                                            console.log('saved');
                                        });
                                    }
                                });
                            }
                            </script>
						</div>
					</div>
                            <?php
                            if(!(isset($no_results))){
                                $query = "SELECT *, COUNT(*) 
                                          FROM exam_results 
                                          WHERE result='0' AND exam_id='$exam_id'
                                          GROUP BY question_no
                                          ORDER BY question_no ASC
                                          ";
                                $result = mysqli_query($conn, $query);
                                $x = 1;
                                while($row = mysqli_fetch_array($result)){
                                    foreach($mostMistakes as $mistakes){
                                        if($row['question_no'] == $mistakes){
                                        ?>
                                            <div class="col-xl-6 col-xxl-6 col-sm-12">
                                                <div class="row">
                                                    <div class="col-xl-12 col-xxl-12 col-sm-12">
                                                        <div class="card-body">
                                                            <h3>Question <?= $row['question_no'] ?></h3>
                                                            <hr style="border-top: 8px solid <?= $barColors[$x-1] ?>;border-radius: 5px;">
                                                            <h4><?= $row['selected_question'] ?></h4>
                                                            <strong>Answer: </strong><?= $row['selected_option'] ?>
                                                            <br><br>
                                                            
                                                            <small>Frequency:<?= $values[$x-1] ?></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                            break;     
                                        }                             
                                    }
                                    $x++;
                                }
                            }
                            ?>
                </div>

<?php include 'footer.php';?>

