<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Information table</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<?php
$name='Gosho';
$phone_num='0882-321-423';
$age=24;
$address='Hadji Dimitar';
?>
    <table id="info-table" border="1">
        <tr>
            <th>Name</th>
            <td><?php echo $name ?></td>
        </tr>
        <tr>
            <th>Phone number</th>
            <td>
                <?php echo $phone_num ?>
            </td>
        </tr>
        <tr>
            <th>Age</th>
            <td>
                <?php echo $age ?>
            </td>
        </tr>
        <tr>
            <th>Address</th>
            <td>
                <?php echo $address ?>
            </td>
        </tr>
    </table>
</body>
</html>