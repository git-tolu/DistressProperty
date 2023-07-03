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
$agencycontact = strtoupper($info8['contactperson']);
$agencyuserid = $info8['username'];
$agencyemail = $info8['emailaddress'];
$agencyphone = $info8['phone'];
$contactdesignation = strtoupper($info8['designation']);
}
include("emailtemplates/approvalemail.php");
}
?>