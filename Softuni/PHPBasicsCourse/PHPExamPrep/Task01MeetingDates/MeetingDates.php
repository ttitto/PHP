<form action="" method="get">
    <input type="text" name="dateOne"/>
    <input type="text" name="dateTwo"/>
    <input type="submit"/>
</form>
<?php
date_default_timezone_set("Europe/Sofia");
$dateOne = new DateTime($_GET['dateOne']);
$dateTwo = new DateTime($_GET['dateTwo']);
if ($dateTwo < $dateOne) {
    $dateTwo = new DateTime($_GET['dateOne']);
    $dateOne = new DateTime($_GET['dateTwo']);
}

$offset = (11 - intval($dateOne->format('w'))) % 7;
$firstThursday = $dateOne->add(new DateInterval("P{$offset}D"));
if ($firstThursday > $dateTwo) {
    echo "<h2>No Thursdays</h2>";
} else {
    echo "<ol>";
    while ($firstThursday <= $dateTwo) {
        echo "<li>" . $firstThursday->format("d-m-Y") . "</li>";
        $firstThursday->add(new DateInterval('P7D'));
    }
    echo "</ol>";
}
?>