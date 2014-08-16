<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Print tags</title>
</head>
<body>
<form action="MostFrequentTag.php" method="get">
    <?php
    echo "<label for='tags-input'>Enter tags:</label>";
    echo "<input type='text' id='tags-input' name='tags-input'/>";
    echo " <input type='submit'/>";
    ?>
</form>
</body>
</html>
<?php
if (isset($_GET['tags-input'])) {
    $tags = explode(', ', $_GET['tags-input']);
    $sorted = array_count_values($tags);
    arsort($sorted, 1);
    foreach ($sorted as $tag => $count) {
        if (!isset($current_count)) {
            $current_count = $count;
            $most_frequent = $tag;
        } elseif ($current_count === $count) {
            $most_frequent .= ", " . $tag;
        }

        echo "$tag: $count times<br/>" . PHP_EOL;
    }
    echo " Most Frequent Tag is: $most_frequent";
}
?>