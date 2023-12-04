<?php
include("authentication.php");
include("database.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

if(isset ($_GET['action']) && $_GET['action'] == 'send'){
    $forgotpasswordID = $_GET['forgotpasswordID'];

    $sql = " SELECT * FROM forgot_password WHERE forgotpasswordID = '" . $forgotpasswordID . "'";
    
  $result = $connection->query($sql); 
  if (!$result){
    echo ("wrong mysql command");
    exit;
  }
  $forgot_password = $result->fetch_assoc();
  // print_r($forgot_password);
  // exit;
try {
  //Server setting
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'pnncathr@gmail.com'; //Email Admin
  $mail->Password = "jgox kucn ldlw urfy";
  //gmail password :: 1QazxsW2
  $mail->Port = 465;
  $mail->SMTPSecure = 'ssl';

  //Recipients
  $mail->setFrom( $_SESSION['email'],'Admin Movies Spoiler');
  $mail->addAddress($forgot_password['email'],'Send Email');//add a recipient

  //Content
  $mail->isHTML(true);
  $mail->Subject = 'Password OTP';
  $mail->Body = '<b>นี่คือรหัสผ่านยืนยันของคุณ : </b> ' . $forgot_password['comfirmPassword'];

  $mail->send();
  echo "<script>
        alert('ส่งรหัสให้สมาชิกแล้ว');
        document.location.href = 'forgot-password.php';
        </script>" ;
    exit;
} catch (Exception $e){
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}

?>