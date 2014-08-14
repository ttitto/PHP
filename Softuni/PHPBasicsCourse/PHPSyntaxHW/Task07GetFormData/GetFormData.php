<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Get Form Data</title>
    <style>
        input {
            display: block;
        }

        input[type="radio"] {
            display: inline;
        }
    </style>
</head>
<body>
<?php
if (isset($_POST) && $_POST['submit-btn'] = "Изпращане" && count($_POST) === 4) {
    $info = "My name is $_POST[name] and I am $_POST[age] years old. I am $_POST[sex].";
}?>

<form action="GetFormData.php" method="post" id="info-form" name="info-form">
    <label for="name-in">Name</label><input type="text" id="name-in" name="name" required="required"/>
    <label for="age-in">Age</label><input type="number" id="age-in" name="age" required="required"/>
    <input type="radio" id="male" name="sex" value="male" required="required">
    <label for="male">Male</label>
    <input type="radio" id="female" name="sex" value="female">
    <label for="female">Female</label>
    <input type="submit" id="submit-btn" name="submit-btn" value="Изпращане"/>
</form>
<?php echo $info ?>
</body>
</html>

