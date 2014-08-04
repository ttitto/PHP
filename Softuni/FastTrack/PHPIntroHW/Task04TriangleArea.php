<?php
function calc_triangle_area()
{
    if (array_count_values(func_get_args()) !== 6) {
        return "Invalid count of arguments!";
    }
    list($ax, $ay, $bx, $by, $cx, $cy) = func_get_args();
    $area = abs((
            $ax * ($by - $cy) + $bx * ($cy - $ay) + $cx * ($ay - $by)
        ) / 2);
    return $area;
}

echo calc_triangle_area(-5, 10, 25, 30, 60, 15);
echo calc_triangle_area(1, 1, 2, 2, 3, 3);
echo calc_triangle_area(53, 18, 56, 23, 24, 27);