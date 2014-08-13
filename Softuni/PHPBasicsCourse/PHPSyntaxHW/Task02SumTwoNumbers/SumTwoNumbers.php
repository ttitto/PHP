<?php
function print_sum($firstNumber, $secondNumber){
    printf('$firstNumber + $secondNumber = '." $firstNumber + $secondNumber = %.2f",($firstNumber+$secondNumber));
  //  echo '$firstNumber + $secondNumber = '."$firstNumber + $secondNumber = ".round($firstNumber+$secondNumber,2);
}

print_sum(2,5);
echo PHP_EOL;
print_sum(1.567808,0.356);
echo PHP_EOL;
print_sum(1234.5678,333);