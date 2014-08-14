<?php
$current_date=getdate();
print_r($current_date);

$new_year_date=new DateTime();
$new_year_date->setDate( $current_date['year']+1 ,1,1);
$new_year_date->setTime(0,0,0);

$new_year_date=getdate($new_year_date->getTimestamp());
//$new_year_date->setTimezone(new DateTimeZone('Europe/Sofia'));



print_r($new_year_date);