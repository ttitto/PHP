<?php
echo ini_get('memory_limit').PHP_EOL;
echo strrchr("memory_limit",'o').PHP_EOL;
echo strtoupper( str_repeat('a',30).PHP_EOL);
echo ucfirst(str_repeat("b",22)).PHP_EOL;
echo ucwords("ala bala nica turska panica").PHP_EOL;
//Passing function parameters by reference
$n1='wILLIAM';
$n2="disaster";
 function fix_str(&$n1, &$n2){
     $n1=ucfirst($n1);
     $n2=ucfirst($n2);
 }
fix_str($n1, $n2);
echo $n1." ".$n2.PHP_EOL;

//Returning global variables
$a1='wILLIAM';
$a2='disaster';
function return_globals(){
    global $a1;
    global $a2;
    $a1=ucfirst($a1);
    $a2=ucfirst($a2);
}
return_globals();
echo $a1." ".$a2.PHP_EOL;