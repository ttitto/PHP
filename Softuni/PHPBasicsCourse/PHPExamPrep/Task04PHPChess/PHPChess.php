<form action="" method="get">
    <input type='text' name="board"/>
    <input type="submit"/>
</form>

<?php
$result = '';
$json_base = array();
$pieces = array('R', 'H', 'B', 'K', 'Q', 'P', ' ');
$input_rows = explode('/', $_GET['board']);
for ($i = 0; $i < count($input_rows); $i++) {
    $board[$i] = explode('-', $input_rows[$i]);
    if (0 != count(array_diff($board[$i], $pieces)) || count($board[$i]) != 8) {
        echo "<h1>Invalid chess board</h1>";
        exit;
    }
    $result .= "<table><tr>";
    foreach ($board[$i] as $piece) {
        $result .= "<td>$piece</td>";
        $board[$i] = array_map('assign_full_key', $board[$i]);
        $board[$i] = array_count_values($board[$i]);
        var_dump($board[$i]);
    }


    $result .= "</tr>";

}
var_dump($input_rows);
echo($result);


function assign_full_key($kv)
{
    switch ($kv->key) {
        case 'Q':
            return 'Queen';
        case 'R':
            return 'Rook';
        case 'H':
            return 'Horseman';
        case 'B':
            return 'Bishop';
        case 'K':
            return 'King';
        case 'P':
            return 'Pawn';
        default:
            return '';
    }
}

?>