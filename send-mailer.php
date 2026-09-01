<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

/**
 * Reusable SMTP Dispatcher Function for Customer & Admin
 */
function dispatchQuotationMail($toEmail, $toName, $subject, $bodyHTML)
{
    $mail = new PHPMailer(true);

    try {
        // SMTP Server Configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'manimalladi05@gmail.com';
        $mail->Password   = 'nsmgbxkyqxqrwfjh';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Clear previous state headers for double dispatch cycle
        $mail->clearAddresses();
        $mail->clearCustomHeaders();

        // Sender & Recipient Details
        $mail->setFrom('manimalladi05@gmail.com', 'Mega Modulars');
        $mail->addAddress($toEmail, $toName);

        // Mail Content Config
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $bodyHTML;

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("PHPMailer Error: " . $mail->ErrorInfo);
        return false;
    }
}
