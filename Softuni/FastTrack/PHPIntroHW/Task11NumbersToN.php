<?php
function print_to_n($n)
{
    for ($i = 1; $i <= $n; $i++) {
        echo $i . PHP_EOL;
    }
}

print_to_n(3);
print_to_n(5);
print_to_n(1);