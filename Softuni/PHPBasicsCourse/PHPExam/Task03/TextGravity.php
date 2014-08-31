<?php
$text = $_GET['text'];
$lineLen = intval($_GET['lineLength']);
$rowNum = intval(ceil(strlen($text) / $lineLen));
$board = array();
for ($i = 0; $i < ($rowNum * $lineLen); $i++) {
    for ($r = 0; $r < $rowNum; $r++) {
        for ($c = 0; $c < $lineLen; $c++) {
            if ($i >= strlen($text)) {
                $board[$r][$c] = ' ';
                $i++;
            } else {
                $board[$r][$c] = $text[$i];
                $i++;
            }
        }
    }
}

for ($row = $rowNum - 1; $row > 0; $row--) {
    for ($col = 0; $col < $lineLen; $col++) {
        $newrow = $row;
        while ( true) {
            if($newrow==1){
                break;
            }
            if($board[$newrow][$col]==' '){
                $board[$newrow][$col] = $board[$newrow - 1][$col];
                $board[$newrow - 1][$col] = ' ';
                $newrow--;
            }
        }
    }
}

$result = "<table>";

for ($rb = 0; $rb < $rowNum; $rb++) {
    $result .= "<tr>";
    for ($cb = 0; $cb < $lineLen; $cb++) {
        $result .= "<td>" . $board[$rb][$cb] . "</td>";
    }
    $result .= "</tr>";
}

$result .= "<table>";
echo($result);
?>