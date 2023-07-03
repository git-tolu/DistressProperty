<?php
$today ="08-11-2023";
$nextannualdue ="01-01-2024";
$nextannualdue1 =strtotime($nextannualdue);
$today1 =strtotime($today);
$date1 = new DateTime($today);
$date2 = new DateTime($nextannualdue);
$interval = $date1->diff($date2);
//echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 

// shows the total amount of days (not divided into years, months and days like above)

$diffe =  $interval->days ;


echo $diffe ;
?>