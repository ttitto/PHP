<?php
//define radius as constant
define("R",2.0);
function point_in_circle($x, $y){

   if( sqrt( $x*$x+$y*$y)>R){
       return 'false';
   } else {
       return 'true';
   }
}

echo point_in_circle(0,1).PHP_EOL;
echo point_in_circle(-2,0).PHP_EOL;
echo point_in_circle(-1,2).PHP_EOL;
echo point_in_circle(1.5,-1).PHP_EOL;
echo point_in_circle(-1.5,-1.5).PHP_EOL;
echo point_in_circle(100,-30).PHP_EOL;
echo point_in_circle(0,0).PHP_EOL;
echo point_in_circle(0.2,-0.8).PHP_EOL;
echo point_in_circle(0.9,-1.93).PHP_EOL;
echo point_in_circle(1,1.655).PHP_EOL;