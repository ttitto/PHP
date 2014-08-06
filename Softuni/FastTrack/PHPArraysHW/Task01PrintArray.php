<?php
function print_array($n)
{
    $my_arr=array();
    for ($i = 0; $i < $n; $i++) {
        $my_arr[]=$i*5;
    }
    print_r($my_arr);
}
print_array(20);
