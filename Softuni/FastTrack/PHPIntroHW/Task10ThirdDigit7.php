<?php
function is_third_digit_7($my_int){
   return  ($my_int/100)%10===7;
}

echo is_third_digit_7(5).PHP_EOL;
echo is_third_digit_7(701).PHP_EOL;
echo is_third_digit_7(9703).PHP_EOL;
echo is_third_digit_7(877).PHP_EOL;
echo is_third_digit_7(777877).PHP_EOL;
echo is_third_digit_7(9999799).PHP_EOL;