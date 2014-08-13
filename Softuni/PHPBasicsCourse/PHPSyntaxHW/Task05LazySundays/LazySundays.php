<?php
$date = new DateTime();
$date->setDate(date('Y'), date('n'), 1);
$current_month = $date->format('m');

do {
    if ($date->format('w') == '0') {
        echo $date->format('jS F, Y').'<br/>'.PHP_EOL;
    }
    $date = $date->modify('+1day');
} while ($date->format('m') == $current_month);
