<?php
include('includes/aunthenticate.php'); 
$page="Registration Details";
$home="EXMAN";
$apptitle="Membership Management System";
$todaydate=date("jS F, Y");
$mid = $_GET['id'];

// get user details

$sql8 = "SELECT *FROM membership WHERE id='$mid'";			   
$result8 = mysqli_query($conn, $sql8);
if (mysqli_num_rows($result8) > 0) {
	$column_num = 1;
while($info8 = mysqli_fetch_array($result8)) {	
$mid = $info8['id'];
$agencyname = strtoupper($info8['agencyname']);
$contactperson = strtoupper($info8['contactperson']);
$userid = $info8['username'];
$emailaddress = $info8['emailaddress'];
$phone = $info8['phone'];
$designation = strtoupper($info8['designation']);
$pincode = $info8['pincode'];
}
include("emailtemplates/adminactivationemail.php");
}
?>