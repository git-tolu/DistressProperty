<?php
include('includes/opendb.php'); 
$todaydate=date("jS F, Y");

$sql7 = "SELECT *FROM notifications WHERE mtype='general' AND emailstatus='notsent'";		   
$result7 = mysqli_query($conn, $sql7);
if (mysqli_num_rows($result7) > 0) {
while($info7 = mysqli_fetch_array($result7)) {	
$subject = $info7['emailsubject'];
$emailmessage = $info7['emailmessage'];
}
include("emailtemplates/notification.php");
}

?>
                                          