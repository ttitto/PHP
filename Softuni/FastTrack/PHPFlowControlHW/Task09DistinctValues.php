<?php
function get_distinct_values($arr)
{
    return array_unique($arr);
}

echo join(", ", get_distinct_values(array('Nakov', 'Svetlin', 'Nakov', 'Pesho', 'Mario', 'Dimityr', 'Georgi',
    'Mario')));