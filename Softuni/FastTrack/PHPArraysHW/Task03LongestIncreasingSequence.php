<?php
function find_longest_increasing_seq($input)
{
    $elements = explode(" ", $input);
    $len = count($elements);
    $sequences = array(array("seq" => array(), 'len' => 0));
    $current_seq = array($elements[0]);
    $result = '';

    for ($i = 1; $i < $len; $i++) {
        $num = $elements[$i];
        if ($num > $elements[$i - 1]) {
            $current_seq[] = $num;

        } else {
            $sequences[] = array("seq" => $current_seq, 'len' => count($current_seq));
            $result = $result . join(' ', $current_seq) . PHP_EOL;
            $current_seq = array($num);
        }
    }
    $sequences[] = array("seq" => $current_seq, 'len' => count($current_seq));
    $result = $result . join(' ', $current_seq) . PHP_EOL;
    rsort($sequences);

    $result = $result . "Longest: " . join(" ", $sequences[0]['seq']) . PHP_EOL;
    return $result;

}

echo find_longest_increasing_seq("2 3 4 1 50 2 3 4 5");
echo find_longest_increasing_seq("8 9 9 9 -1 5 2 3");
echo find_longest_increasing_seq("1 2 3 4 5 6 7 8 9");
echo find_longest_increasing_seq("5 -1 10 20 3 4");
echo find_longest_increasing_seq("10 9 8 7 6 5 4 3 2 1");
