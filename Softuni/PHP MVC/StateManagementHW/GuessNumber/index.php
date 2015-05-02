<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Guess Number Game</title>
</head>
<body>
<form action="index.php" method="post">
    <label for="input-username">Username: </label>
    <input type="text" name="username" id="input-username"/>
    <input type="submit" value="Start Game"/>
</form>
<?php
session_start();
if (isset($_POST['username'])) {
    $username = htmlspecialchars(trim($_POST['username']));
    if (!empty($username) && strlen($username) > 2) {
        $randomNumber = rand(1, 100);

        $_SESSION['username'] = $username;
        $_SESSION['number'] = $randomNumber;
        header('Location: /GuessNumber/play.php');
    } else {
        echo('Please input valid username');
    }
}

?>
</body>
</html>
