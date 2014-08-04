<?php
function divideBy2_and_9($my_int)
{
    if($my_int===0){
        return false;
    }
    return ($my_int % 9 === 0) && ($my_int % 2 === 0);
}

echo divideBy2_and_9(17).PHP_EOL;
echo divideBy2_and_9(0).PHP_EOL;
echo divideBy2_and_9(10).PHP_EOL;
echo divideBy2_and_9(7).PHP_EOL;
echo divideBy2_and_9(18).PHP_EOL;
echo divideBy2_and_9(72).PHP_EOL;
