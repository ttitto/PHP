<form action="" method="get">
    <input type="text" name="text"/>
    <textarea name="blacklist" cols="30" rows="10"></textarea>
    <input type="submit"/>
</form>

<?php
$text = $_GET['text'];
$blacklist = explode("\n", $_GET['blacklist']);
$black_patterns = array();
foreach ($blacklist as $black_item) {
    if ($black_item !== '') {
        $black_item=trim($black_item);
        $black_item = preg_replace("/\*/", ".*", $black_item);
        $black_item="/\b".preg_replace("/\./","\.",$black_item)."\b/";
        $black_patterns[] = $black_item;
    }
}


$email_pattern = "/[0-9a-zA-Z\-\_\+]+@[0-9a-zA-Z\-]+[\.0-9a-zA-Z]+/";

//var_dump($black_patterns);
preg_match_all($email_pattern, $text, $emails, PREG_SET_ORDER);
//var_dump($emails);
for ($i = 0; $i < count($emails); $i++) {
    $mail = $emails[$i][0];
    $is_matched_mail=false;
    foreach ($black_patterns as $bl_pattern) {
        if(preg_match($bl_pattern,$mail)){
            $pad=str_pad('*',strlen($mail),'*');
           $text= preg_replace("/".$mail."/",$pad,$text);
            $is_matched_mail=true;
        }
    }
    if(!$is_matched_mail){
        $mail_link="<a href=\"mailto:$mail\">$mail</a>";
        $text= preg_replace("/".$mail."/",$mail_link,$text);
    }

}

echo "<p>$text</p>";

?>
