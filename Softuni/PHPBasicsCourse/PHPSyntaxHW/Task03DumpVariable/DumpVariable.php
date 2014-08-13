<?php
function dump_variable ($variable){
    if(is_numeric($variable)){
        var_dump($variable);
    } else{
        echo gettype($variable).PHP_EOL;
    }
}

dump_variable("hello");
dump_variable(15);
dump_variable(1.234);
dump_variable(array(1,2,3));
dump_variable((object)[2,34]);
