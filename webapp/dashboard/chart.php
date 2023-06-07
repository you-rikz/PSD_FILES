<?php
require "../connection.php";

function js_str($s)
{
    return '"' . addcslashes($s, "\0..\37\"\\") . '"';
}

function js_array($array)
{
    $temp = array_map("js_str", $array);
    return "[" . implode(",", $temp) . "]";
}

function random_color_part()
{
    return str_pad(dechex(mt_rand(0, 255)), 2, "0", STR_PAD_LEFT);
}

function random_color()
{
    return random_color_part() . random_color_part() . random_color_part();
}

$questions_text = [];
$questions = [];
$values = [];
$barColors = [];


if (isset($_GET["exam"])) {
    $exam_id = $_GET["exam"];
    $query = "SELECT * FROM exams WHERE exam_id='$exam_id' LIMIT 1";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        $chart_title = $row["title"];
        $exam_id = $row["exam_id"];
        $course_id = $row["course_id"];
    }
} else {
    $query = "SELECT * FROM exams LIMIT 1";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        $chart_title = $row["title"];
        $exam_id = $row["exam_id"];
        $course_id = $row["course_id"];
    }
}

$query = "SELECT question_no, COUNT(*) 
          FROM exam_results 
          WHERE result='0' AND exam_id='$exam_id'
          GROUP BY question_no
          ORDER BY question_no ASC
         ";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $questions_text[] = "Question No." . $row["question_no"];
        $questions[] = $row["question_no"];
        $values[] = $row["COUNT(*)"];
        $barColors[] = "#" . random_color();
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
    $mostMistakesText = implode(",", $mostMistakes);

    for ($r = 0; $r < count($questions); $r++) {
        for ($c = 0; $c < count($mostMistakes); $c++) {
            if ($questions[$r] == $mostMistakes[$c]) {
                $barColors[$r] = "#" . random_color();
                break;
            } else {
                $barColors[$r] = "#808080";
            }
        }
    }
    echo '
            <div class="card-header">
            <h3 class="card-title">
                &nbsp
                Questions with the most mistakes:<b>'.$mostMistakesText .'</b>
            </h3>
            </div>
            <div class="card-body">
                <canvas id="myChart" style="width:100%;"></canvas> 
            </div>
        ';
}else{
    $no_results = "No results yet.";
    echo '
        <center>
            <h3 class="card-title">There are no exam results at the moment.</h3>
                <small>Take exams and complete them to preview the results.</small>
                <br><br>
        </center>
         ';
}
?>

    <script>
    <?php echo "var xValues = ",js_array($questions_text),";"; ?>
    <?php echo "var yValues = ",js_array($values),";"; ?>
    <?php echo "var barColors = ",js_array($barColors),";"; ?>
    new Chart("myChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {display: false},
            title: {
                display: true,
                text: "<?php echo $chart_title; ?>",
                fontSize: 28
            }
        }
    });
    </script>