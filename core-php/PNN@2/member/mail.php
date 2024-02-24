<?php
$to='nishadpavan567@gmail.com';
$message="Message is the sent";
$subject="COnfrmation";


  //include('smtp/PHPMailerAutoload.php');
  include('smtp/class.smtp.php');

//Load Composer's autoloader
require 'smtp/PHPMailerAutoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.painapro.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info@painapro.com';                     //SMTP username
    $mail->Password   = 'xYFvO4_^~]fI';                               //SMTP password
    $mail->SMTPSecure = 'ssl/tsl';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 25;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('info@painapro.com', 'PainaPro');
    $mail->addAddress($to);     //Add a recipient
    

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';


?>