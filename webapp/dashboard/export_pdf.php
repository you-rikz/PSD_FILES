<?php
require_once 'vendor/autoload.php';
require '../connection.php';

$exam_id = $_POST['exam_id'];

$query = "SELECT question_no, COUNT(*) 
		  FROM exam_results 
		  WHERE result='0' AND exam_id='$exam_id'
		  GROUP BY question_no
		  ORDER BY question_no ASC
		 ";
$result = mysqli_query($conn, $query);
if((mysqli_num_rows($result) > 0)){
	while($row = mysqli_fetch_array($result)){
		$questions[] = $row['question_no'];
		$values[] = $row['COUNT(*)'];
	}
	$counts = $values;
	$maxMistakes = max($counts);
	$mostMistakes = [];
	$n = 0;
	foreach ($counts as $numMistakes) {
		if ($numMistakes == $maxMistakes) {
		$mostMistakes[] = $questions[$n];
		}
		$n++;
	}
}

$query = "SELECT *, COUNT(*) 
		  FROM exam_results 
		  WHERE result='0' AND exam_id='$exam_id'
		  GROUP BY question_no
		  ORDER BY question_no ASC
		 ";
$result = mysqli_query($conn, $query);
$table = '';
$x = 1;
while($row = mysqli_fetch_array($result)){
	foreach($mostMistakes as $mistakes){
		if($row['question_no'] == $mistakes){
			$table .= '<tr>';
			$table .= '<td class="tableitem">'.$row['question_no'].'. '.$row['selected_question'].'</td>';
			$table .= '<td class="tableitem">'.$row['selected_option'].'</td>';
			$table .= '<td class="tableitem">'.$x.'</td>';
			$table .= '</tr>';
		}                             
	}
	$x++;
}

$html .='<body>';
$html .='
		<link href="http://fonts.googleapis.com/css?family=Poppins:400,700" rel="stylesheet" type="text/css">
		<style>
		body{
		    font-family: "Poppins", sans-serif;
		    font-size: 10vw;
		    font-weight: 400;
		}

		.tableitems, .tableheader, .tableitem {
		  border: 1px solid black;
		  border-collapse: collapse;
		}

		.tableitems{
		  width: 100%; 
		  border-collapse: collapse;		
		}
		</style>
		';

$html .='<br><br><h1 style="text-align:center;">Item Analysis Report</h1>';
$html .='<img src="images/'.$exam_id.'.png"/><br><br>';
$html .='
		<table class="tableitems">
		  <tr>
		    <th class="tableheader">Item</th>
		    <th class="tableheader">Option</th>
		    <th class="tableheader">Frequency</th>
		  </tr>
		  '.$table.'
		</table>
		';
$html .='</body>';

$mpdf = new \Mpdf\Mpdf();

$mpdf->SetHeader('| <img src="images/header.png" height="50px" /> |');
$mpdf->WriteHTML($html);

$mpdf->Output();

?>
