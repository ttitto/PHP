<?php
function find_longest_seq($elements){
    $my_arr=explode(" " ,$elements);
    $len=count($my_arr);
    $max_count=array('count'=>1,"index"=>0);
    $current_count=1;
    for($i=1;$i<$len;$i++){
        if($my_arr[$i]===$my_arr[$i-1]){
            $current_count++;
        } else{
            $current_count=1;
        }
        if($current_count>$max_count['count']){
            $max_count['count']=$current_count;
            $max_count['index']=$i;
        }
    }
    return str_repeat($my_arr[$max_count['index']]." ",$max_count['count']);
}
echo find_longest_seq("hi yes yes yes bye").PHP_EOL;
echo find_longest_seq('SoftUni softUni softuni').PHP_EOL;
echo find_longest_seq("1 1 2 2 3 3 4 4 5 5").PHP_EOL;
echo find_longest_seq("a b b xxx c c c").PHP_EOL;
echo find_longest_seq("hi hi hi hi hi").PHP_EOL;
echo find_longest_seq("hello").PHP_EOL;