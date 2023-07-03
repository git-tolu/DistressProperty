<?php
include('includes/opendb.php'); 
$sql8 = "SELECT *FROM membership WHERE status='active' AND approvaladmin='Approved' ORDER BY id DESC";		   
$result8 = mysqli_query($conn, $sql8);
if (mysqli_num_rows($result8) > 0) {
	$column_num = 1;
while($info8 = mysqli_fetch_array($result8)) {	
$mid = $info8['id'];
$agencyname = $info8['agencyname'];
$contactperson = $info8['contactperson'];
$datereg = $info8['datereg'];
$initialpayment = $info8['initialpayment'];
$userid = $info8['username'];
$emailaddress = $info8['emailaddress'];
$phone = $info8['phone'];
$rcno = $info8['rcno'];
$orgfunctions = $info8['orgfunctions'];
$memberstatus = $info8['status'];
$nextannualdue = $info8['nextannualdue'];
$today=date("d-m-Y");

$date1 = strtotime($nextannualdue);
$date2 = strtotime($today);
if ($date2>=$date1){
	$sqlpay = "UPDATE membership set owing ='yes' WHERE username = '$userid'";
if (mysqli_query($conn, $sqlpay)) {
}
}
}
}
?>