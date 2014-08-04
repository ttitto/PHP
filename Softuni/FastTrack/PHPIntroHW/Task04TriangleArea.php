<?php
function calc_triangle_area()
{
    if (count(func_get_args()) !== 6) {
        return "Invalid count of arguments!";
    }
    list($ax, $ay, $bx, $by, $cx, $cy) = func_get_args();
    $area = abs((
            $ax * ($by - $cy) + $bx * ($cy - $ay) + $cx * ($ay - $by)
        ) / 2);
    return round($area,0);
}

echo calc_triangle_area(-5, 10, 25, 30.5, 60, 15).PHP_EOL;
echo calc_triangle_area(1, 1, 2, 2, 3, 3).PHP_EOL;
echo calc_triangle_area(53, 18, 56, 23, 24, 27).PHP_EOL;