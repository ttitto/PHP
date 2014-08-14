<?php
$current_date=new DateTime('now', new DateTimeZone('EUROPE/Sofia'));

print_r($current_date);
$new_year_date=new DateTime();
$new_year_date->setDate( $current_date->format('Y')+1,1,1);
$new_year_date->setTime(-1,0,0);
$new_year_date->setTimezone(new DateTimeZone('EUROPE/Sofia'));
print_r($new_year_date);

//$new_year_date=getdate($new_year_date->getTimestamp());
////$new_year_date->setTimezone(new DateTimeZone('Europe/Sofia'));
//$diff=date_diff( $new_year_date,$current_date);
//
//print_r($diff);
$timestamp_diff= $new_year_date->getTimestamp()-$current_date->getTimestamp();

print_r($timestamp_diff);
printf( "Hours until new year : %.0d\nMinutes until new year : %.0d\n Seconds until new year : %
.0d\nDays:Hours:Minutes:Seconds '%.0d:%.0d:%.0d:%.0d'",
    ($timestamp_diff/60/60),
    $timestamp_diff/60);
