<?php

/**
 * Selection sort algorithm
 * @param $arr Array to be sorted
 */
function arr_selection_sort($arr)
{
    $len = count($arr);
    for ($i = 0; $i < $len; $i++) {
        $min_indx = $i;
        for ($j = $i + 1; $j < $len; $j++) {
            if ($arr[$j] < $arr[$min_indx]) {
                $min_indx = $j;
            }
        }
        //swap
        $temp = $arr[$i];
        $arr[$i] = $arr[$min_indx];
        $arr[$min_indx] = $temp;
    }
    print_r($arr);
}

arr_selection_sort(array(2, 3, 4, 1, 50, 2, -3, 4, 5));
arr_selection_sort(array(8, 9 ,9, 9, -1, 5, 2, 3));
arr_selection_sort(array(5, -1, 10, 20, 3, 4));