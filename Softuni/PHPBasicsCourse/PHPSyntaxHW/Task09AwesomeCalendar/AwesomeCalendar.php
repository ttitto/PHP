<!DOCTYPE html>
<html>
<head>
    <meta charset="windows-1251">
    <title>AWESOME CALENDAR</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<div id="wrapper">
    <?php
    mb_internal_encoding("windows-1251");
     setlocale(LC_TIME, 'bg-BG');
    $weekdays = get_weekdays();

    function get_weekdays()
    {
        $timestamp = strtotime('next Monday');
        $days = array();
        for ($i = 0; $i < 7; $i++) {
            $days[] = substr(ucfirst(strftime('%a', $timestamp)), 0, 2);
            $timestamp = strtotime('+1 day', $timestamp);
        }
        return $days;
    }

    function draw_calendar($year_str)
    {
        global $weekdays;
        if (strlen($year_str) != 4) {
            echo "Insert year in four digit format! eg. 2014!";
            return false;
        }
        $year = array();

        $current_date = new DateTime();
        $current_date->setDate($year_str, 1, 1);
        $current_date->setTime(0, 0, 0);

        echo "<h1>$year_str</h1><hr><main id='calendar'>";

        do {
            $month = strftime("%B", $current_date->getTimestamp());
            $month_num = strftime("%m", $current_date->getTimestamp());
            $current_date->setDate($year_str, $month_num, 1);
            echo "<section class='month'><h2>" . $month . "</h2><hr>";
            echo "<table><thead><tr><th>" . $weekdays[0] . "<hr></th><th>" . $weekdays[1] . "<hr></th><th>" . $weekdays[2]
                . "<hr></th><th>" . $weekdays[3] . "<hr></th><th>" . $weekdays[4] . "<hr></th><th>" . $weekdays[5] . "<hr></th><th>"
                . $weekdays[6] . "<hr></th></tr></thead>";
            do {
                $year[$month] = array();
                $week = $current_date->format('W');
                do {
                    if (!isset($year[$month][$week])) {
                        $year[$month][$week] = array();
                    }
                    $year[$month][$week][substr(ucfirst(strftime('%a', $current_date->getTimestamp())), 0,
                    2)] = $current_date->format('d');
                    $current_date->modify("+1 day");
                    if(strftime("%B", $current_date->getTimestamp()) != $month){
                        break;
                    }
                } while ($current_date->format('W') == $week);
                echo "<tbody><tr>";
                if (isset($year[$month][$week][$weekdays[0]])) {
                    echo "<td>" . $year[$month][$week][$weekdays[0]] . "</td>";
                } else echo "<td>" . ' ' . "</td>";
                if (isset($year[$month][$week][$weekdays[1]])) {
                    echo "<td>" . $year[$month][$week][$weekdays[1]] . "</td>";
                } else echo "<td>" . ' ' . "</td>";
                if (isset($year[$month][$week][$weekdays[2]])) {
                    echo "<td>" . $year[$month][$week][$weekdays[2]] . "</td>";
                } else echo "<td>" . ' ' . "</td>";
                if (isset($year[$month][$week][$weekdays[3]])) {
                    echo "<td>" . $year[$month][$week][$weekdays[3]] . "</td>";
                } else echo "<td>" . ' ' . "</td>";
                if (isset($year[$month][$week][$weekdays[4]])) {
                    echo "<td>" . $year[$month][$week][$weekdays[4]] . "</td>";
                } else echo "<td>" . ' ' . "</td>";
                if (isset($year[$month][$week][$weekdays[5]])) {
                    echo "<td>" . $year[$month][$week][$weekdays[5]] . "</td>";
                } else echo "<td>" . ' ' . "</td>";
                if (isset($year[$month][$week][$weekdays[6]])) {
                    echo "<td>" . $year[$month][$week][$weekdays[6]] . "</td>";
                } else echo "<td>" . ' ' . "</td>";
                echo "</tr>";

            } while (strftime("%B", $current_date->getTimestamp()) == $month);
            echo "</tbody></table></section>";
            // $current_date->modify("+1 day");
        } while (strftime("%Y", $current_date->getTimestamp()) == $year_str);
    }

    draw_calendar("2014");
    ?>
    </main>
</div>
<!--End wrapper-->
</body>
</html>