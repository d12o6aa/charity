<?php 


// Load Composer's autoloader
// require 'vendor/autoload.php';
require_once '/opt/lampp/htdocs/charity/PHPMailer/src/PHPMailer.php';

require_once '../../PHPMailer/src/PHPMailer.php';
require_once '../../PHPMailer/src/SMTP.php';
require_once '../../PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Create an instance of PHPMailer
$mail = new PHPMailer(true); // Passing `true` enables exceptions

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;       // Enable verbose debug output
    $mail->isSMTP();                             // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                      // Enable SMTP authentication
    $mail->Username = 'doaakarem6321@gmail.com';    // SMTP username
    $mail->Password = 'doaa1236';           // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 587;                           // TCP port to connect to

    // Recipients
    $mail->setFrom('doaakarem6321@gmail.com', 'Your Name');
    $mail->addAddress('doaakarem798@example.com', 'Recipient Name');     // Add a recipient

    // Content
    $mail->isHTML(true);                        // Set email format to HTML
    $mail->Subject = 'Subject Here';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
