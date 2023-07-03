<?php
$ty = date('Y');
$messageemail = "
<style>
  body {
    background-color: white !important;
    
  }
  *{
    
  }
</style>
<center>
  <div style='width: 500px !important; border: 3px solid #E3392C; padding: 30px; background-color:#fff !important;'>
    <table style='background-color:#fff !important;' align='center' role='presentation' cellspacing='0'
      cellpadding='0' border='0' width='100%'>
      <tr>
        <td colspan='3'>
          <div style='text-align: center;'>
            <img src='https://hostelafrica360.com/wp-content/uploads/2023/03/newlogo-1.png' width='50%' alt=''>
                      </div>
                  </tr>
                  <tr>
                      <div style='text-align: center; color:#E3392C'>
            <hr style='color:#E3392C'>
            <h2 style='color:#E3392C'>WELCOME TO HOSTEL AFRICA</h2>
            <hr style='color:#E3392C'>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan='3'>
          <div style='text-align: justify;'>
            
			<p style='color: black;'> $emailmessage <br><br>
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
            <p style='color:#E3392C;'>&copy; $ty HOSTEL AFRICA. All Rights Reserved | support@hostelafrica360.com</p>
          </div>
        </td>
        
      </tr>
    </table>
  </div>
</center>";
//echo $messageemail;
$_SESSION['messageemail'] = $messageemail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'mail.hostelafrica360.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
     $mail->Username = 'support@hostelafrica360.com';                     //SMTP username
    $mail->Password = 'Y3-ipVN8sAZ}';                                //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port = 465;    
                                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('support@hostelafrica360.com', 'HOSTEL AFRICA');
    $mail->addAddress($emailaddress, $customername); //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addCC('cc@example.com');
    $mail->addBCC('admintechnical@hostelafrica360.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = 'Hostel Africa: Welcome on Board';
    $mail->Body = $messageemail;
    $mail->AltBody = 'Thanks for joining us';

    $mail->send();
    // echo 'Message has been sent';
	//header("location:../apply/successbalpay.php");
} catch (Exception $e) {
   // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>