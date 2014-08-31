<?php
$list = array_diff(explode("\n", $_GET['list']), array(''));
$maxSize =intval( $_GET['maxSize']);

$result="<ul>";
foreach ($list as $row) {
    if(ord($row)==13){
        continue;
    }
    $row=trim($row);
    $len=strlen($row);
    if($len>$maxSize){
        $row=substr($row,0,$maxSize)."...";
    }

    $result.="<li>".htmlspecialchars($row)."</li>";
}
$result.="</ul>";
echo $result;

?>