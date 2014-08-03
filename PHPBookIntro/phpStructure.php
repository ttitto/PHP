<?php
/**
 * Created by PhpStorm.
 * User: ttitto
 * Date: 14-8-1
 * Time: 21:33
 */
echo "This is line " . __LINE__ . " of the file " . __FILE__ . "\n";
/*function declaration and call*/
function longDate($timestamp)
{
    return date("H:i:s d.m.y", $timestamp);
}

echo longDate(time()) . "\n";
/*static variables*/
function testStatic()
{
    static $count = 0;
    echo $count . "\n";
    $count++;
}

testStatic();
testStatic();
testStatic();

/*superglobal variables*/

//$came_from = htmlentities($_SERVER['HTTP_REFERER']);
//echo "\n" . $came_from;

echo phpinfo(   );
echo ini_get("memory_limit");
echo ini_set("memory_limit","256M");
echo ini_get("memory_limit");