<?php
  /*
    Author: Shahid Shaikh
    Blog  : http://codeforgeek.com
  */
  require_once('php_mailer/PHPMailerAutoload.php');
  //require_once('class.phpmailer.php');
  function sendmail($to,$subject,$message,$name)
  {
    $mail             = new PHPMailer();
    
    $mail->CharSet = 'UTF-8';
    $body             = $message;
    $mail->isSMTP();
    $mail->Host       = "smtp.gmail.com";
    $mail->SMTPAuth   = true;
    $mail->Port       = 465;
    // $mail->SMTPDebug = 2;

    $mail->Username   = "roomjugaad@gmail.com";
    $mail->Password   = "roomjuga@d@395007";
    $mail->SMTPSecure = 'ssl';
    $mail->SetFrom('roomjugaad@gmail.com', 'Room Jugaad');
    $mail->AddReplyTo("roomjugaad@gmail.com",'Room Jugaad');
    $mail->Subject    = $subject;
    //$mail->AddAttachment("fpdf.php");
    $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
    $mail->MsgHTML($body);
    $address = $to;
    $mail->AddAddress($address, $name);
    if(!$mail->Send()) 
    {
      //return 0;
      echo "Mailer Error: ".$mail->ErrorInfo;
    }
    else
    {
      return 1;
    }
  }
?>