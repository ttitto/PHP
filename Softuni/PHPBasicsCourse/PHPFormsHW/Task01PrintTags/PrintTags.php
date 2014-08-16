<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Print tags</title>
</head>
<body>
<form action="PrintTags.php"method="get">
    <?php
    echo "<label for='tags-input'>Enter tags:</label>";
    echo "<input type='text' id='tags-input' name='tags-input'/>";
    echo " <input type='submit'/>";
    ?>
</form>
</body>
</html>

<?php
if(isset($_GET['tags-input'])){

    $tags=explode(', ',$_GET['tags-input']);
    foreach ($tags as $key=> $tag) {
        echo "$key: $tag<br/>".PHP_EOL;
    }

}
?>