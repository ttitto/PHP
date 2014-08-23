<form action="" method="post">
    <label for="input">Input string</label>
    <input type="text" id="input" name="input"/>
    <input type="submit"/>
</form>

<?php
if (isset($_POST['input']) && !empty($_POST['input'])) {
    $numbers = explode(", ", $_POST['input']);

    echo "<table border='1'>
            <tbody>";

    foreach ($numbers as $num) {
        $sum=0;
        if (preg_match("/^[0-9]*$/", $num)) {
            $len=strlen($num);
            for($i=0;$i<$len;$i++){
            $sum+=   intval($num[$i]);
            }

        } else {
            echo "<tr><td>$num</td><td>I cannot sum that</td></tr> ";
            continue;
        }
        echo "<tr><td>$num</td><td>$sum</td></tr> ";
    }
    echo   "</tbody>
          </table>";
}
?>
