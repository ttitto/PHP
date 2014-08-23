<form action="" method="post">
    <input type="text" name="input"/>

    <input type="radio" name="actions" id="palindrome" value="palindrome"/>
    <label for="palindrome">Check Palindrome</label>

    <input type="radio" name="actions" id="reverse" value="reverse"/>
    <label for="reverse">Reverse String</label>

    <input type="radio" name="actions" id="split" value="split"/>
    <label for="split">Split</label>

    <input type="radio" name="actions" id="hash" value="hash"/>
    <label for="hash">Hash String</label>

    <input type="radio" name="actions" id="shuffle" value="shuffle"/>
    <label for="shuffle">Shuffle String</label>

    <input type="submit"/>
</form>
<?php
if (isset($_POST['input']) && !empty($_POST['input'])) {
    switch ($_POST['actions']) {
        case 'palindrome':
            handlePalindrome($_POST['input']);
            break;
        case 'reverse':
            echo strrev($_POST['input']);
            break;
        case 'split':
            str_split_by_pattern($_POST['input']);
            break;
        case 'hash':
            echo crypt($_POST['input']);
            break;
        case 'shuffle':
            echo str_shuffle($_POST['input']);
            break;
    }
} else {

}

function handlePalindrome($str)
{
    if ($str == strrev($str)) {
        echo "$str is a palindrome";
    } else {
        echo "$str is not any palindrome";
    }
}

function str_split_by_pattern($str)
{
    echo implode('', preg_split("/[^a-zA-Z]/", $str));
}

?>
