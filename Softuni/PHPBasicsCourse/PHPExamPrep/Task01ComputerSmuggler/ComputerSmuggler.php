<form action="" method="get">
    <input type="text" name="list"/>
    <input type="submit"/>
</form>

<?php
$prices = array('CPU' => 85, 'ROM' => 45, 'RAM' => 35, 'VIA' => 45);
$parts =array_diff(explode(', ', $_GET['list']),array(''));
$counted = array_count_values($parts);

//calculate costs
$cost = 0;
$min = PHP_INT_MAX;
foreach ($counted as $part => $cnt) {
    if ($min > $cnt) {
        $min = $cnt;
    }
    if ($cnt >= 5) {
        $cost -= $prices[$part] * $cnt / 2;
    } else {
        $cost -= $prices[$part] * $cnt;
    }
}

if(count($counted)<4){
    $min=0;
}
$cost += $min * 420;
foreach ($counted as $part => $cnt) {
    $counted[$part] = $cnt - $min;
}
foreach ($counted as $part => $cnt) {
    $cost += $prices[$part] * $cnt / 2;
}

$left = count($parts) - $min * 4;

echo "<ul><li>" . $min . " computers assembled</li><li>" . $left . " parts left</li></ul>";
if ($cost > 0) {
    echo "<p>Nakov gained {$cost} leva</p>";
} else {
    echo "<p>Nakov lost ".$cost." leva</p>";
}
?>