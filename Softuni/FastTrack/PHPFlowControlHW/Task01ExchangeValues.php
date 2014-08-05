<?php
function exchange_values($first, $second){
    if($first>$second){
        $temp=$first;
        $first=$second;
        $second=$temp;
    }
}
