
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../Controllers/MailerController.php';
// require_once '../../PHPMailer/src/PHPMailer.php';
// require_once '../../PHPMailer/src/SMTP.php';
// require_once '../../PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

try {
    // Instantiate the mailer object
    $mail = new PHPMailer(true); // Passing `true` enables exceptions
    
    // Set From and To addresses
    $mail->setFrom('doaakarem6321@gmail.com', 'Doaa');
    $mail->addAddress('doaakarem798@gmail.com', 'Doaa karem'); 
    
    // Set email subject and body
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    // Send the email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

