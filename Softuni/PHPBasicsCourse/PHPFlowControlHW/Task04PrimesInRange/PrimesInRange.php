<html>
<head>
    <style>
        .bold {
            font-weight: bold;
        }
    </style>
</head>
<body>
<form action="PrimesInRange.php" method="post">
    <label for="start">Starting index</label>
    <input type="text" id="start" name="start"/>
    <label for="end">End</label>
    <input type="text" id="end" name="end"/>
    <input type="submit"/>
</form>


<?php
if ($_POST) {
    if (!empty($_POST['end'] && !empty($_POST['start']))) {
        $start = $_POST['start'];
        $end = $_POST['end'];

        for ($num = $start; $num <= $end; $num++) {
            if (is_prime($num)) {
                if ($num === $start) {
                    echo "<span class='bold'>" . " " . "$num</span>";
                } else {
                    echo "<span class='bold'>" . ", " . "$num</span>";
                }
            } else {
                if ($num === $start) {
                    echo "$num";
                } else {
                    echo ", $num";
                }
            }
        }
    }
}
/**Checks if a given number is prime
 * @param $num
 * @return bool
 */
function is_prime($num){
    if($num===1)return false;
    if($num===2)return true;
    for($i=2;$i<=ceil(sqrt($num));$i++){
        if($num%$i==0){
            return false;
        }
    }
    return true;
}
?>
</body>
</html>