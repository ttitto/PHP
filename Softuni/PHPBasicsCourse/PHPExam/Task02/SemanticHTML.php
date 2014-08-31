<?php

$html = $_GET['html'];
$divBeginPattern = "/<(div)(.*)(id.*=.*[\\\"\']([a-z]*)[\'\\\"])(.*?)>/";
$divClassBeginPattern= "/<(div)(.*)(class.*=.*[\\\"\']([a-z]*)[\'\\\"])(.*?)>/";
$divEndPattern = "/<\/div>.*<\!--(.*([a-z]*).*)-->/";
$html = explode("\n", $html);
$result = array();
foreach ($html as $row) {
    $matches = array();
    preg_match_all($divBeginPattern, $row, $matches, PREG_SET_ORDER);
    preg_match_all($divClassBeginPattern, $row, $classMatches, PREG_SET_ORDER);
    preg_match_all($divEndPattern, $row, $endMatches, PREG_SET_ORDER);

    if (isset($matches[0])) {
        $replaced = str_replace($matches[0][0], $row, $matches[0][0]);
        $replaced = str_replace($matches[0][1], $matches[0][4], $replaced);
        $replaced = str_replace($matches[0][3], "", $replaced);
        $trimmed = array();
        preg_match("/(?<=<).*?(?=>)/", $replaced, $trimmed);
        $trimmed[0]=preg_replace("/\s{2,}/",' ',$trimmed[0]);
        $replaced = preg_replace("/(?<=<).*?(?=>)/", trim($trimmed[0]), $replaced);

        $result[] = $replaced;

    }elseif(isset($classMatches[0])){
        $replaced = str_replace($classMatches[0][0], $row, $classMatches[0][0]);
        $replaced = str_replace($classMatches[0][1], $classMatches[0][4], $replaced);
        $replaced = str_replace($classMatches[0][3], "", $replaced);
        $trimmed = array();
        preg_match("/(?<=<).*?(?=>)/", $replaced, $trimmed);
        $trimmed[0]=preg_replace("/\s{2,}/",' ',$trimmed[0]);
        $replaced = preg_replace("/(?<=<).*?(?=>)/", trim($trimmed[0]), $replaced);

        $result[] = $replaced;

    }    elseif (isset($endMatches[0])) {
        // var_dump($endMatches[0][0]);
        $replaced = str_replace($endMatches[0][0], $row, $endMatches[0][0]);

        $replaced = str_replace($endMatches[0][0], "</" . trim($endMatches[0][1]) . ">", $replaced);
        $result[] = $replaced;

    } else {
        $result[] = $row;
    }
}

foreach ($result as $resultRow) {
    echo $resultRow;
}

?>