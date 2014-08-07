<?php
include_once('Task04SelectionSort.php');

/** Binary search algorithm - finds the index of a value in a sorted array
 * @param $arr Array where to search in
 * @param $key Searched value
 * @param $min The minimum index in the array for the current function call. If the whole array should be searched
 * set it to 0 for the first call of the function
 * @param $max The maximum index in the array for the current function call. For the first call it is the last busy
 * index of the array.
 * @return bool|int If the key is found returns its index in the array. Otherwise returns false.
 */
function binary_search($arr, $key, $min, $max)
{
    if ($max < $min) {
        //set is empty
        return false;
    } else {
        $mid_indx = intval(($max+$min) / 2);

        if ($key < $arr[$mid_indx]) {
            return binary_search($arr, $key, $min, $mid_indx - 1);
        } elseif ($key > $arr[$mid_indx]) {
            return binary_search($arr, $key, $mid_indx + 1, $max);
        } else {
            return $mid_indx;
        }
    }
}

$sorted1 = arr_selection_sort(array(2, 3, 4, 1, 50, 2, -3, 4, 5));
$sorted2 = arr_selection_sort(array(8, 9, 9, 9, -1, 5, 2, 3));
$sorted3 = arr_selection_sort(array(5, -1, 10, 20, 3, 4));

echo binary_search($sorted1,50,0,count($sorted1)-1).PHP_EOL;
echo binary_search($sorted1,5,0,count($sorted1)-1).PHP_EOL;
echo binary_search($sorted2,9,0,count($sorted2)-1).PHP_EOL;
echo binary_search($sorted2,-1,0,count($sorted2)-1).PHP_EOL;