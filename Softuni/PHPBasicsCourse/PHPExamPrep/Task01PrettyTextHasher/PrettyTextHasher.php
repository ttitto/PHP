<form action="" method="get">
    <input type="text" name="text"/>
    <input type="text" name="hashValue"/>
    <input type="text" name="fontSize"/>
    <input type="text" name='fontStyle'/>
    <input type="submit"/>
</form>

<?php
$text=$_GET['text'];
$hash=intval($_GET['hashValue']);
$style=$_GET['fontStyle'];
switch($style){
    case 'bold':
        $style="font-weight:$style;";
        break;
    case 'italic':
        $style="font-style:$style;";
        break;
    case 'normal':
        $style="font-style:$style;";
        break;
    default:
       $style= 'none';
}
$len=strlen($text);
$encoded='';
for($i=0;$i<$len;$i++){
    if($i%2==0){
        $encoded.= chr(ord($text[$i])+$hash);
    } else{
        $encoded.= chr(ord($text[$i])-$hash);
    }
}

$result= "<p style=\"font-size:".$_GET['fontSize'].";$style\">$encoded</p>";
echo $result;
?>