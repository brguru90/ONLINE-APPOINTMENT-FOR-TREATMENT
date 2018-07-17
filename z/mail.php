<?php
require 'Classes/PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp1.gmail.com;smtp2.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'brguru90@gmail.com';                 // SMTP username
$mail->Password = 'GURUVEN1';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'brguru90@gmail.com';
$mail->FromName = 'GURUPRASAD';
$mail->addAddress('brguru90@gmail.com', 'Joe User');     // Add a recipient
$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('brguru90@gmail.com', 'Information');


$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>

<?php
require 'Classes/PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP(); 
$mail->Host = 'smtp.gmail.com';    
$mail->SMTPAuth = true;
$mail->Username = 'brguru90@gmail.com';
$mail->Password = 'GURUVEN1';
$mail->SMTPSecure = 'tls';

$mail->From = 'brguru90@gmail.com';
$mail->FromName = 'Guruprasad';
$mail->addAddress('brguru90@gmail.com');

$mail->isHTML(true);

$mail->Subject = 'Test Mail Subject!';
$mail->Body    = 'This is SMTP Email Test';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
 } else {
    echo 'Message has been sent';
}
?>