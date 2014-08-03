<?php

class obj
{
}

;
$int = 1;
$float = 1.2;
$bool = true;
$string = "ala bala";
$array = array("element0", "element1");
$object = new obj();
$resource = mysql_connect();
$null = null;

echo gettype($int) . PHP_EOL;
echo gettype($float) . PHP_EOL;
echo gettype($bool) . PHP_EOL;
echo gettype($string) . PHP_EOL;
echo gettype($array) . PHP_EOL;
echo gettype($object) . PHP_EOL;
echo gettype($resource) . PHP_EOL;
echo gettype($null);