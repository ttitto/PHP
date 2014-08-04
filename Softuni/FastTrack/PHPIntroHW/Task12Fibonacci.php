<?php
function print_fibo($n){
    if($n===1){
        echo 0;
        echo PHP_EOL;
        return;
    }

    $fibos=array(0,1);
    $len=2;
    for($i=$len;$i<$n;$i++){
        $fibos[]=$fibos[$len-1]+$fibos[$len-2];
        $len++;
    }
    echo join(' ',$fibos).PHP_EOL;
}
print_fibo(1);
print_fibo(2);
print_fibo(3);
print_fibo(10);