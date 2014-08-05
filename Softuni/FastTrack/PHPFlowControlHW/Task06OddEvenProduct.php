<?php
function odd_even_product($nums)
{
    $odd_prod = 1;
    $even_prod = 1;

    $nums = func_get_args();
    $len = count($nums);
    for ($n = 0; $n < $len; $n++) {
        if (($n + 1) % 2 !== 0) {
            $odd_prod *= $nums[$n];
        } else {
            $even_prod *= $nums[$n];
        }
    }

    if($odd_prod===$even_prod){
        echo "yes".PHP_EOL."product=$odd_prod";
    } else{
        echo "no".PHP_EOL."odd_product=$odd_prod".PHP_EOL."even_product=$even_prod";
    }
}

odd_even_product(4, 3, 2, 5, 2);
odd_even_product(3, 10, 4, 6, 5, 1);
odd_even_product(2, 1, 1, 6, 3);