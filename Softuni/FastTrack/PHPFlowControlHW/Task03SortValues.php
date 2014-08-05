<?php
function sort_three_numbers($first, $second, $third)
{
    if ($first > $second) {
       swap($first, $second);
    }
    if ($second > $third) {
        swap($second, $third);
        if ($first > $second) {
            swap($first,$second);
        }
    }
    return array($first, $second, $third);
}
//arguments passed by reference
function swap(&$first, &$second){
    $temp = $first;
    $first = $second;
    $second = $temp;
}

print_r(sort_three_numbers(32.2, 16.1, 4.5));
print_r(sort_three_numbers( 16.1,32.2, 4.5));
print_r(sort_three_numbers(32.2, 4.5, 16.1));