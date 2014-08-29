<form action="" method="get">
    <input type="text" name="text"/>
    <input type="text" name="key"/>
    <input type="submit"/>
</form>

<?php
$partial_pattern=create_pattern($_GET['key']);
$pattern="/".$partial_pattern."(.{2,6})".$partial_pattern."/";
$text=$_GET['text'];
$address=array();
preg_match_all($pattern,$text,$address,PREG_PATTERN_ORDER);
$result=implode('',$address[1]);
echo $result;

function create_pattern($key)
{
    if(!preg_match("/[a-zA-Z0-9]/",$key[0])){
        $pattern='\\'.$key[0];
    }else{
    $pattern ="$key[0]";
    }
    $len = strlen($key);
    for ($i = 1; $i < $len - 1; $i++) {
        if (preg_match("/[a-z]/", $key[$i])) {
            $pattern .= "[a-z]*";
        } elseif (preg_match("/[A-Z]/", $key[$i])) {
            $pattern .= "[A-Z]*";
        } elseif (preg_match("/[0-9]/", $key[$i])) {
            $pattern .= "[0-9]*";
        } else {
            $pattern .="\\". $key[$i];
        }
    }
    if(!preg_match("/[0-9a-zA-Z]/",$key[$len-1])){
        $pattern.='\\'.$key[$len-1];
    }else{
        $pattern .= $key[$len - 1];
    }
    return $pattern;
}
?>


