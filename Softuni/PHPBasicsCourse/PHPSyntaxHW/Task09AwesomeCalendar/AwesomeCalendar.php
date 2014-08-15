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
    $weekdays=get_weekdays();

    function get_weekdays(){
        $timestamp = strtotime('next Monday');
        $days = array();
        for ($i = 0; $i < 7; $i++) {
            $days[] = substr(ucfirst(strftime('%a', $timestamp)),0,2);
            $timestamp = strtotime('+1 day', $timestamp);
        }
        return $days;
    }

    function draw_calendar($year_str)
    {
        global $weekdays;
        if(strlen($year_str)!=4){
            echo "Insert year in four digit format! eg. 2014!";
            return false;
        }
        //$year[month][day]=day_number
        $year = array();
//        $year[strftime("%B")] = array();
//        $year[strftime("%B")][strftime("%u")] = array();

        $current_date = new DateTime();
        $current_date->setDate($year_str, 1, 1);
        $current_date->setTime(0, 0, 0);

        echo "<h1>$year_str</h1><hr><main id='calendar'>";

        do{
            $month=strftime("%B",$current_date->getTimestamp());
            $month_num=strftime("%d",$current_date->getTimestamp());
            if(!isset($year[$month])){
                $year[$month]=array();
                $current_date->setDate($year_str,$month_num,1);
                do{
                    
                    $current_date->modify("+1 day");
                } while(strftime("%B",$current_date->getTimestamp())==$month);

            }

            $current_date->modify("+1 day");
        }while(strftime("%Y",$current_date->getTimestamp())==$year_str);

//        do{
//            $month=strftime("%B",$current_date->getTimestamp());
//            if(!isset($year[$month])){
//                $year[$month]=$month;
//                echo "<section class='month'><h2>".ucfirst($month)."</h2><hr>";
//                echo "<table><thead><tr><td>".$weekdays[0]."<hr></td><td>".$weekdays[1]."<hr></td><td>".$weekdays[2]."<hr></td><td>".$weekdays[3]."<hr></td><td>".$weekdays[4]."<hr></td><td>".$weekdays[5]."<hr></td><td>".$weekdays[6]."<hr></td></tr></thead>";
//
//                $row=array();
//                do{
//                    $row[strftime("%w",$current_date->getTimestamp())][]=strftime("%d",$current_date->getTimestamp());
//                    $current_date->modify("+1 day");
//
//                }while(strftime("%B",$current_date->getTimestamp())==$month);
//
//                echo "<tr><td>".$row[0][0]."</td><td>".$row[1][0]."</td><td>".$row[2][0]."</td><td>".$row[3][0]."</td><td>".$row[4][0]."</td><td>".$row[5][0]."</td><td>".$row[6][0]."</td></tr>";
//                echo "</table>";
//            }
//
//            // $current_date->modify("+1 day");
//        } while(strftime("%Y",$current_date->getTimestamp())==$year_str);
        var_dump($year);

    }


    draw_calendar("2014");
    ?>
</div>


</body>
</html>