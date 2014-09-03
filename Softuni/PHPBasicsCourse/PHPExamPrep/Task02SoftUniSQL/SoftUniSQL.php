<form action="" method="get">
    <input type="text" name='commands'/>
    <input type="submit"/>
</form>

<?php
$commands=array_diff(explode('"' ,$_GET['commands']),array('',', ','[','];',']'));
var_dump($commands);

?>