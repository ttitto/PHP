<form action="" method="get">
    <input type="text" name="name"/>
    <input type="text" name="gender"/>
    <input type="text" name="pin"/>
    <input type="submit"/>
</form>

<?php
define('INCORRECT', "<h2>Incorrect data</h2>");
$voter=array("name"=>"","gender"=>"", "pin"=>"");
$check=[2,4,8,5,10,9,7,3,6];
$pin = $_GET['pin'];
if(strlen($pin)!=10){
    echo INCORRECT;
    exit;
}
$dd = substr($pin, 4, 2);
$mm = substr($pin, 2, 2);
if (intval($mm) > 12) {
    $mm = intval($mm) - 20;
    $yy = "20$mm";
    if ($mm > 12) {
        $mm = $mm - 20;
        $yy = "18$mm";
    }
} else {
    $yy = "19$mm";
}
if (!checkdate(intval($mm), intval($dd), intval($yy))) {
    echo INCORRECT;
    exit;
}
$gen = intval(substr($pin, 8, 1));

if($gen%2===0){
    if($_GET['gender']=='female'){
        echo INCORRECT;
        exit;
    }
}
if($gen%2!==0){
    if($_GET['gender']=='male'){
        echo INCORRECT;
        exit;
    }
}
$voter['gender']=$_GET['gender'];
$names=preg_split("/\s/",$_GET['name'],-1,PREG_SPLIT_NO_EMPTY);
if( count($names)!=2){
    echo INCORRECT;
    exit;
}
if(ctype_lower($names[0][0]) || ctype_lower($names[1][0]) ){
    echo INCORRECT;
    exit;
}
$voter['name']=implode(' ', $names);

$pin=str_split($pin);
$sum=0;
for ($i=0;$i<9;$i++) {
    $sum+=( intval($pin[$i])*$check[$i]   );
}
$checksum=$sum%11;
if($checksum===10){$checksum=0;}
if($pin[9]!=$checksum){
    echo INCORRECT;
    exit;
}

$voter['pin']=$_GET['pin'];
echo json_encode($voter);



?>