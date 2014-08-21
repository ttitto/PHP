<?php

if ($_POST){
?>
<table border="1">
    <thead>
    <tr>
        <th>Year</th>
        <th>January</th>
        <th>February</th>
        <th>March</th>
        <th>April</th>
        <th>May</th>
        <th>June</th>
        <th>July</th>
        <th>August</th>
        <th>September</th>
        <th>October</th>
        <th>November</th>
        <th>December</th>
        <th>Total:</th>
    </tr>
    </thead>
    <tbody>

    <?php
    if (!empty($_POST['years_count'])) {
        $years = array();
        $years_count = intval($_POST['years_count']);
        for ($i =2014; $i >= 2014- $years_count; $i--) {
            $year_sum = 0;
            $years[$i]['January'] = rand(0, 999);
            $years[$i]['February'] = rand(0, 999);
            $years[$i]['March'] = rand(0, 999);
            $years[$i]['April'] = rand(0, 999);
            $years[$i]['May'] = rand(0, 999);
            $years[$i]['June'] = rand(0, 999);
            $years[$i]['July'] = rand(0, 999);
            $years[$i]['August'] = rand(0, 999);
            $years[$i]['September'] = rand(0, 999);
            $years[$i]['October'] = rand(0, 999);
            $years[$i]['November'] = rand(0, 999);
            $years[$i]['December'] = rand(0, 999);

            $year_sum = array_sum($years[$i]);
            //Generate table
            echo "<tr><td>$i</td><td>" . $years[$i]['January'] . "</td><td>"
                . $years[$i]['February'] . "</td><td>" . $years[$i]['March'] . "</td><td>" . $years[$i]['April'] . "</td><td>"
                . $years[$i]['May'] . "</td><td>" . $years[$i]['June'] . "</td><td>" . $years[$i]['July'] . "</td><td>"
                . $years[$i]['August'] . "</td><td>" . $years[$i]['September'] . "</td><td>"
                . $years[$i]['October'] . "</td><td>" . $years[$i]['November'] . "</td><td>" . $years[$i]['December'] . "</td><td>$year_sum</td></tr>";
        }
    }
    echo "</tbody></table>";
    }
    ?>


    <form action="AnnualExpenses.php" method="post">
        <label for="years-count">Enter number of years</label>
        <input type="text" id="years-count" name="years_count"/>
        <input type="submit" value="Show costs"/>
    </form>