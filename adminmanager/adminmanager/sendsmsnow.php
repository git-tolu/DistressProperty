<?php 
include('includes/opendb.php'); 
function sendSMS ($sender, $message , $destination, $dnd, $apikey){ 
$sender = urlencode($sender); 
$message = urlencode($message);
$destination = str_replace(' ', '', $destination); 
$destination = urlencode($destination); 
$live_mebo_url = "https://www.bulksmsnigeria.com/api/v1/sms/create?api_token=".$apikey."&from=".$sender."&dnd=".$dnd."&body=".$message."&to=".$destination;
$parse_mebo_url= file($live_mebo_url); 
$numm = count($parse_mebo_url);
$numm = $numm-1 ;
$reports = $parse_mebo_url[$numm];
return $reports ; 	
}
global $message, $destination, $sender, $dnd, $apikey, $sid;
$sql8 = "SELECT *FROM notifications WHERE mtype='general' AND smsstatus='notsent'";		   
$result8 = mysqli_query($conn, $sql8);
if (mysqli_num_rows($result8) > 0) {
while($info8 = mysqli_fetch_array($result8)) {	
$sid = $info8['id'];
$message = $info8['smsmessage'];
$destination = $info8['recipientphoneno'];
}
}
$sender = "EXMAN";
include('includes/smscredentials.php'); 
    $sendd = sendSMS($sender, $message, $destination, $dnd, $apikey);
	$send = json_decode($sendd, true);
if ($sendd){
$sqlpay = "UPDATE notifications set smsstatus ='sent' WHERE id='$sid'";
if (mysqli_query($conn, $sqlpay)) {
}	

}

?>