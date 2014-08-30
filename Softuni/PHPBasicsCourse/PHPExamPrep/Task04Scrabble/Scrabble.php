<form action="" method="get">
    <input type="text" name="mainWord"/>
    <input type="text" name="words"/>
    <input type="submit"/>
</form>

<?php
$mw = json_decode($_GET['mainWord']);
$words = json_decode($_GET['words']);

foreach (get_object_vars($mw) as $key => $val) {
    preg_match("/[0-9]+/", $key, $mwRow);
    $mwRow = $mwRow[0] - 1;
    $mw = $val;
    $mwLen = strlen($mw);
}
$table = array();
$table[$mwRow] = str_split($mw);

usort($words, 'sort_by_length');
$rowsAbove = $mwRow;
$rowsBelow = $mwLen - $mwRow - 1;
$crossWord = "";
$column = 0;
$row = 0;
for ($i = 0; $i < count($words); $i++) {
    $curw = $words[$i];
    $curWLen = strlen($curw);
    if ($curWLen > $mwLen) {
        continue;
    }
    for ($c = 0; $c < $curWLen; $c++) {
        if ($crossWord) break;
        for ($m = 0; $m < $mwLen; $m++) {
            if ($curw[$c] == $mw[$m]) {
                if ($c <= $rowsAbove && ($curWLen - $c) <= $rowsBelow) {
                    $crossWord = $curw;
                    unset($words[$i]);
                    $column = $m;
                    $row = $c - $mwRow;
                    break;
                }
            }
        }
    }
}

$i = 0;
for ($r = $row; $r < strlen($crossWord); $r++) {

    $table[$r][$column] = $crossWord[$i];
    $i++;
}
//calculate ascii code sums
$asciiSum = array();
foreach ($words as $word) {
    $len = strlen($word);
    $sum = 0;
    for ($i = 0; $i < $len; $i++) {
        $sum += ord($word[$i]);
    }
    if (isset($asciiSum[$word])) {
        $asciiSum[$word] += $sum;
    } else {
        $asciiSum[$word] = $sum;
    }

}
//create html table output
$result = "<table>";
for ($r = 0; $r < $mwLen; $r++) {
    $result .= "<tr>";
    for ($c = 0; $c < $mwLen; $c++) {
        if (isset($table[$r][$c])) {
            $result .= "<td>" . $table[$r][$c] . "</td>";
        } else {
            $result .= "<td></td>";
        }
    }
    $result .= "</tr>";
}
$result .= "</table>";

ksort($asciiSum);
$result .= json_encode($asciiSum);
echo $result;


function sort_by_length($a, $b)
{
    return strlen($a) < strlen($b);
}


?>