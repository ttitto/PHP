<table border='1'>
<thead><tr><th>Number</th><th>Square</th></tr></thead>
<tbody>
<?php
$sum=0;
    for($i=0;$i<=100;$i+=2){
        $square=round(sqrt($i),2);
        echo "<tr><td>$i</td><td>";
        echo ($square);
        echo "</td></tr>";
        $sum+=$square;
    }

?>
</tbody>
<tfoot><tr><th>Total: </th><td><?php echo "$sum"; ?></td></tr></tfoot>
</table>