<?php
function get_nonrepeating_digits($end_num)
{
    $result = array();
    for ($current = 100; $current <= $end_num; $current++) {
        $digits = array_map('intval', str_split($current));
        $digits = array_unique($digits);
        $len = count($digits);
        for ($a = 0; $a < $len - 2; $a++) {
            for ($b = $a+1 ; $b < $len - 1; $b++) {
                if ($digits[$a] === $digits[$b]) {
                    continue;
                }
                for ($c = $b+1; $c < $len; $c++) {
                    if ($digits[$a] === $digits[$c] || $digits[$b] === $digits[$c]) {
                        continue;
                    }
                    array_push($result, "$digits[$a]$digits[$b]$digits[$c]");
                }
            }
        }
    }
    if (count($result) < 1) {
        echo "no" . PHP_EOL;
    } else {
        echo implode(", ", $result) . PHP_EOL;
    }
}

//get_nonrepeating_digits(15);
get_nonrepeating_digits(145);
//get_nonrepeating_digits(247);
get_nonrepeating_digits(1234);
