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
    $repoctComVdoID = $_GET['repoctComVdoID'];

    $sql = "
    SELECT * FROM member WHERE id = '" . $repoctComVdoID . "'
  ";
    
  $result = $connection->query($sql); 
  if (!$result){
    echo ("wrong mysql command");
    exit;
  }

  $member = $result->fetch_assoc();
//   print_r($member);
//   exit;

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
  $mail->setFrom('pnncathr@gmail.com','Admin Movies Spoiler');
  $mail->addAddress($member['email'],'Send Email');//add a recipient

  //Content
  $mail->isHTML(true);
  $mail->Subject = 'Report Comment';
  $mail->Body = '<b>คุณถูกรายงานความคิดเห็น เมื่อถูกรายงานครบ 3ครั้ง แอดมินจะทำการระงับบัญชีของคุณ </b> ' ;

  $mail->send();
  echo "<script>
        alert('เตือนสมาชิกที่ถูกรายงานเรียบร้อย');
        document.location.href = 'report-commentVDO.php';
        </script>" ;
    exit;
} catch (Exception $e){
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}

?>