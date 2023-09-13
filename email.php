<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../drupal10/PHPMailer-master/src/Exception.php';
require '../drupal10/PHPMailer-master/src/PHPMailer.php';
require '../drupal10/PHPMailer-master/src/SMTP.php';

function sendEmail($email, $head, $message)
{
    $mail = new PHPMailer(true);
    try {
        // Clear all recipients
        $mail->clearAllRecipients();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'siddartha7121@gmail.com'; // Your Gmail address
        $mail->Password = 'cpfaorkmrnrqsbcy'; // Replace with your application-specific password
        $mail->SMTPSecure = 'tls'; // TLS encryption, 'ssl' also accepted
        $mail->Port = 587; // TCP port to connect to
        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ]
        ];
        // Sender and recipient details
        $mail->setFrom('siddartha7121@gmail.com', 'siddartha'); // Your name and Gmail address
        $mail->addAddress($email, 'dear employee'); // Recipient's name and email address

        // Email subject and body
        $mail->Subject = $head;
        $mail->Body = $message;

        // Disable SMTP debugging
        $mail->SMTPDebug = false;

        // Send the email
        $result = $mail->send();

        // Email sending status message
        if ($result) {
            $status = 'Email sent successfully.';
        } else {
            $status = 'Failed to send email. Error: ' . $mail->ErrorInfo;
        }

    } catch (Exception $e) {
        $status = 'Failed to send email. Error: ' . $e->getMessage();
    }

    return $status;
}

// // $status = sendEmail('dhinesh.murugan28@gmail.com', 'infanion', "12345");
// echo $status;
