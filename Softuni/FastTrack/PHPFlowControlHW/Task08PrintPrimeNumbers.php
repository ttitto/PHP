<?php
function get_primes($n)
{
    if ($n === 1) return array(1);

    $primes = array();
    for ($i = 1; $i <= $n; $i++) {
        $primes[$i] = $i;
    }

    for ($divider = 2; $divider <= round(sqrt($n), 0); $divider++) {
        for ($num = $divider + 1; $num <= $n; $num++) {
            if (($num % $divider) === 0) {
                $primes[$num] = "";
            }
        }
    }
    return array_splice(array_filter($primes), 1);
}

function print_array($arr)
{
    echo join(PHP_EOL, $arr);
}

print_array(get_primes(10000));