<?php
$current_date = new DateTime('now', new DateTimeZone('EUROPE/Sofia'));

$new_year_date = new DateTime();
$new_year_date->setDate(intval($current_date->format('Y')) + 1, 1, 1);
$new_year_date->setTime(-1, 0, 0);
$new_year_date->setTimezone(new DateTimeZone('EUROPE/Sofia'));

$timestamp_diff = $new_year_date->getTimestamp() - $current_date->getTimestamp();
$time_diff = getdate($timestamp_diff);

printf("Hours until new year : %.0d\nMinutes until new year : %.0d\nSeconds until new year : %.0d\nDays:Hours:Minutes:Seconds %.0d:%.0d:%.0d:%.0d",
    $timestamp_diff / 60 / 60,
    $timestamp_diff / 60,
    $timestamp_diff,
    $time_diff['yday'],
    $time_diff['hours'],
    $time_diff['minutes'],
    $time_diff['seconds']);
