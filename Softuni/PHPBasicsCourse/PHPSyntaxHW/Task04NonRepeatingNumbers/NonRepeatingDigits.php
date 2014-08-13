<?php
function get_nonrepeating_digits($end_num)
{
    $result = array();

    if ($end_num <= 101) {
        echo "no";
        return;
    }
    for ($current = 100; $current <= $end_num; $current++) {

        if($current>999){
            break;
        }
        $digits = array_map('intval', str_split($current));
        if (count($digits) !== count(array_unique($digits))) {
            continue;
        } else {
            array_push($result, $current);
        }
    }
    echo implode(", ", $result) . PHP_EOL;
}

get_nonrepeating_digits(15);
get_nonrepeating_digits(145);
get_nonrepeating_digits(247);
get_nonrepeating_digits(1234);
