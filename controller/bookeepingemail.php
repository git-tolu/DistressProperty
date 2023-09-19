<?php
$ty = date('Y');
// ob_start();


$message = "
<style>
body {
  background-color: white !important;
  color: black !important;
}
*{
  color: black !important;
}
</style>
<center>
<div style='width: 500px !important; border: 3px solid #D9A464; padding: 30px; background-color:white !important;'>
  <table style='background-color:white !important;' align='center' role='presentation' cellspacing='0'
    cellpadding='0' border='0' width='100%'>
    <tr>
      <td colspan='3'>
        <div style='text-align: center;'>
          <img src='https://distresspropertymarket.com/assets/images/logo.png' width='50%' alt='>
                    </div>
                </tr>
                <tr>
                    <div style='text-align: center; color:#D9A464'>
          <hr style='color:#D9A464'>
          <h2 style='color:#D9A464'>Book Inspection Notification </h2>
          <hr style='color:#D9A464'>
        </div>
      </td>
    </tr>
    <tr>
      <td colspan='3'>
        <div style='text-align: justify;'>
          <p style='color: black;'>Dear Admin ,</p>
          <h3 style='color: black;'>$fullname Booked An Inspection on $date </h3>
          <Center style='color: black;'><h1> User Phone No $phone</h1></Center>
          <p style='color: black;'>User $fullname Message,<br> $message. <br><br>
           </p> 
      

        </div>
      </td>
    </tr>
   
  </table>
  <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
    <tr align='center'>
      <td style='text-align: left;'>
        <div>
        <br>
        <hr>
          <p style='color:#D9A464;'>&copy; $ty Distress Properties  Market . All Rights Reserved | testemail@Distress Properties  Market .com.ng</p>
        </div>
      </td>
      
    </tr>
  </table>
</div>
</center>
";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require('PHPMailer-master/src/Exception.php');
require('PHPMailer-master/src/PHPMailer.php');
require('PHPMailer-master/src/SMTP.php');


// require('vendor/autoload.php');

$mail = new PHPMailer;


// $mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

// $mail->SMTPDebug  = SMTP::DEBUG_SERVER;  
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "ssl";
$mail->Port = 465;


$mail->Host = "mail.uptechng.com";
$mail->Username = "distressproperties@uptechng.com";
$mail->Password = "Mypass@@.com@@";


$mail->IsHTML(true);
// $mail->AddAddress("adegokeralph@gmail.com", "peter obi");
$mail->AddAddress("distressproperties@uptechng.com", "Distress Admin");
// $mail->AddCC('tenants@uptechng.com');
$mail->SetFrom("$email", "User $fullname");
$mail->AddReplyTo("$email", "User $fullname");
// $mail->Subject = $subject;
$mail->Subject = 'Booking Inspection';
$mail->AltBody = 'User $fullname Booked An Inspection';

$mail->MsgHTML($message);
if ($mail->Send()) {

//   header("location: verifymail.php");
  // header("alertfailure.php");
  // var_dump($mail);
}else{
  // echo 'failed';

}
// header('location: verifyemail.php'); 
