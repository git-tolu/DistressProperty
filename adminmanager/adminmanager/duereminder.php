<?php
include('includes/opendb.php'); 
//get due date
$sql8 = "SELECT *FROM membership WHERE status='active'";			   
$result8 = mysqli_query($conn, $sql8);
if (mysqli_num_rows($result8) > 0) {
while($info8 = mysqli_fetch_array($result8)) {	
$agencyname = $info8['agencyname'];
$contactperson = $info8['contactperson'];
$emailaddress = $info8['emailaddress'];
$designation = $info8['designation'];
$nextannualdue = $info8['nextannualdue'];

//$today=date("d-m-Y");
$today="02-01-2024";
$date1 = new DateTime($today);
$date2 = new DateTime($nextannualdue);
$interval = $date1->diff($date2);

//echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 

// shows the total amount of days (not divided into years, months and days like above)

$difference = $interval->days;

//echo $difference;

if ($difference=="30" || $difference=="15" || $difference=="7" || $difference=="0" ){
echo "EMAIL<br>";

//echo $nextannualdue;
}
}
}
?>