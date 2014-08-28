<form action="" method="get">
    <input type='text' name="board"/>
    <input type="submit"/>
</form>

<?php
$result = '';
$json_base = array('Bishop' => 0,'Horseman' => 0,'King' => 0,'Pawn' => 0, 'Queen' => 0,'Rook' => 0    );
$pieces = array('R', 'H', 'B', 'K', 'Q', 'P', ' ');
$input_rows = explode('/', $_GET['board']);
$result.="<table>";
for ($i = 0; $i < count($input_rows); $i++) {
    $board[$i] = explode('-', $input_rows[$i]);
    if (0 != count(array_diff($board[$i], $pieces)) || count($board[$i]) != 8) {
        echo "<h1>Invalid chess board</h1>";
        exit;
    }
    $result .= "<tr>";
    foreach ($board[$i] as $piece) {
        $result .= "<td>$piece</td>";
    }
    $result .= "</tr>";

    $mapped = array_map('assign_full_key', $board[$i]);
    $mapped = array_count_values($mapped);
    foreach ($mapped as $key=>$val) {
        $json_base[$key] = $json_base[$key] + $val;
    }
}
$result.= "</table>";
unset ($json_base['']);
foreach ($json_base as $key => $val) {
    if ($val==0) {
       unset($json_base[$key]);
    }
}

$result.=json_encode($json_base);
echo "$result";
function assign_full_key($kv)
{
    switch ($kv) {
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