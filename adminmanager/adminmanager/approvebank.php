<?php
include('includes/aunthenticate.php'); 
$page="Membership Approval/Decline";
$home="EXMAN";
$apptitle="Membership Management System";
$todaydate=date("jS F, Y");
$mid = $_GET['id'];
$newstatus = $_GET['newstatus'];

// approval or decline
if ($newstatus=="Approved"){
//send approval email
$id=0;
$sqlpay = "UPDATE bank set adminapproval ='$newstatus' WHERE id='$mid'";
if (mysqli_query($conn, $sqlpay)) {
//include("emailtemplates/approvalemail.php");	
header("location:bankapproval.php");
}
}

if ($newstatus=="Declined"){
//send approval email
$id=0;
$sqlpay = "UPDATE bank set adminapproval ='$newstatus' WHERE id='$mid'";
if (mysqli_query($conn, $sqlpay)) {
//include("emailtemplates/declineemail.php");
header("location:bankdecline.php");
}
}
//
?>