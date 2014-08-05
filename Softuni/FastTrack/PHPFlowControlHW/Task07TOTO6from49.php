<?php
function get_toto_combinations(){
    $combinations=array();
        for($a=1;$a<=44;$a++){
            for($b=$a+1;$b<=45;$b++){
                for($c=$b+1;$c<=46;$c++){
                    for($d=$c+1;$d<=47;$d++){
                        for($e=$d+1;$e<=48;$e++){
                            for($f=$e+1;$f<=49;$f++){
                               echo join(" ", array($a,$b,$c, $d, $e, $f)).PHP_EOL;
                            }
                        }
                    }
                }
            }
        }
return $combinations;
}
get_toto_combinations();
//print_r(get_toto_combinations());