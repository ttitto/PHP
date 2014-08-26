<form action="" method="get">
    <input type="text" name='dateOne'/>
    <input type="text" name='dateTwo'/>
    <textarea name='holidays' cols="30" rows="10"></textarea>
    <input type="submit"/>
</form>

<?php
date_default_timezone_set('UTC');
$start = new DateTime($_GET['dateOne']);
$end = new DateTime($_GET['dateTwo']);
$raw_holidays = explode("\n", $_GET['holidays']);
$holidays=array();
foreach ($raw_holidays as $holiday) {
    if ($holiday !== "") {
        $holidays[] = trim($holiday);
    }
}

$all_days = array();
while ($start <= $end) {
    if ($start->format('w') == 0 || $start->format('w') == 6) {

    } else {
        $all_days[] = $start->format('d-m-Y');
    }
    $start->add(new DateInterval('P1D'));
}
$results=array();
if(!empty($holidays)){
$results = array_diff($all_days, $holidays);
}else{
    $results=$all_days;
}

if (!empty($results)) {
    echo "<ol>";
    foreach ($results as $result) {
        echo "<li>$result</li>";
    }
    echo "</ol>";
} else {
    echo "<h2>No workdays</h2>";
}

?>