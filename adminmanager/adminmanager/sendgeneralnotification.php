<?php
include('includes/opendb.php'); 
$todaydate=date("jS F, Y");

$sql8 = "SELECT *FROM membership";			   
$result8 = mysqli_query($conn, $sql8);
if (mysqli_num_rows($result8) > 0) {
	$column_num = 1;
while($info8 = mysqli_fetch_array($result8)) {	
$agencyname = strtoupper($info8['agencyname']);
$contactperson = strtoupper($info8['contactperson']);
$emailaddress = $info8['emailaddress'];
$phone = $info8['phone'];
include("emailtemplates/notification.php");
include("includes/sendsmsnow.php");
}
}

?>
                                          