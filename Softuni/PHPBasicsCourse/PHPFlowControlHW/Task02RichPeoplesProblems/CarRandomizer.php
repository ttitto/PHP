<table border="1">
    <thead>
    <tr>
        <th>Car</th>
        <th>Color</th>
        <th>Count</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $colors = array('red', 'blue', 'yellow', 'green', 'pink', 'brown', 'black');
    $color_count = count($colors);
    if ($_POST) {
        if (!empty($_POST['cars'])) {
            $cars = explode(', ', $_POST['cars']);
            foreach ($cars as $car) {
                $rnd_color = $colors[rand(0, $color_count)];
                $rnd_count = rand(1, count($cars));

                echo "<tr><td>$car</td><td>$rnd_color</td><td>$rnd_count</td></tr>";
            }

        }
    }
    ?>
    </tbody>
</table>

<form method="post" action="CarRandomizer.php">
    <label for="cars-list">Enter cars</label>
    <input type="text" id="cars-list" name="cars"/>
    <input type="submit" value="Show result"/>
</form>