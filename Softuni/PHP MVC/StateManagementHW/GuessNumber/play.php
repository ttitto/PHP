<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Guess Number Game</title>
</head>
<body>
<form action="play.php" method="post">
    <label for="input-guess-number">Guess number in range [1, 100]: </label>
    <input type="text" name="guess-number" id="input-guess-number"/>
    <input type="submit" value="Guess"/>
</form>
<?php
session_start();
$selectedNumber = intval($_SESSION['number']);
echo $selectedNumber;
if (empty($selectedNumber)) {
    header('Location: /GuessNumber/index.php');
}

if (isset($_POST['guess-number'])) {
    $guessed = intval($_POST['guess-number']);
    if (empty($guessed) || $guessed < 0 || $guessed > 100) {
        echo 'Invalid number. Please try with an integer between 1 and 100!';
    } elseif ($selectedNumber === $guessed) {
        echo("<h2>Congratulations, {$_SESSION['username']}!</h2>");
        session_destroy();
        ?>
        <a href="/GuessNumber/index.php">Play Again</a>
    <?php
    } elseif ($selectedNumber > $guessed) {
        echo("Up");
    } elseif ($selectedNumber < $guessed) {
        echo("Down");
    }
}
?>
</body>
</html>