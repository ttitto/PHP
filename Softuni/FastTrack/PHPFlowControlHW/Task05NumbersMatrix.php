<?php
function draw_matrix($n){
    for($r=1;$r<=$n;$r++){
        for($c=$r;$c<$r+$n;$c++){
            echo $c . " ";
        }
        echo PHP_EOL;
    }
}
draw_matrix(2);
draw_matrix(3);
draw_matrix(4);
draw_matrix(20);