<?php
function show_sign($first, $second, $third){
    if($first===0 || $second===0 || $third===0){
        return '0';//zero has no sign
    } else{
        $count_negatives=0;
        foreach (func_get_args() as $arg) {
            if($arg<0){
                $count_negatives++;
            }
        }
        if($count_negatives%2!==0){
            return '-';
        } else{
            return '+';
        }
    }
}

echo show_sign(-2, 34,32);
echo show_sign(-2, 34,-32);
echo show_sign(-2, -34,-32);
echo show_sign(-2, 0,32);