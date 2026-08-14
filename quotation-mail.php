<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$autoloadPath = __DIR__ . '/vendor/autoload.php';
if (file_exists($autoloadPath)) {
    require $autoloadPath;
} else {
    header('Location: get-quotation.php?mail=error&msg=' . urlencode('PHPMailer is not installed. Please add vendor/autoload.php.'));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: get-quotation.php');
    exit;
}

$name = trim($_POST['full_name'] ?? '');
$phone = trim($_POST['mobile_number'] ?? '');
$email = trim($_POST['email_address'] ?? '');
$city = trim($_POST['city'] ?? '');
$message = trim($_POST['additional_message'] ?? '');
$layout = trim($_POST['layout'] ?? 'U-Shaped Kitchen');
$area = trim($_POST['area'] ?? '76 - 100 sq.ft');
$finish = trim($_POST['finish'] ?? 'Acrylic');
$price = trim($_POST['estimated_price'] ?? '₹ 0');
$agree = isset($_POST['agree_updates']) ? 'Yes' : 'No';

if ($name === '' || $phone === '' || $city === '') {
    header('Location: get-quotation.php?mail=error&msg=' . urlencode('Please fill all required fields.'));
    exit;
}

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'manimalladi05@gmail.com';
    $mail->Password = 'rcaueajfwhczcrhm';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('manimalladi05@gmail.com', 'Mega Modular Industries');
    $mail->addAddress('manimalladi05@gmail.com', 'Mega Modular Industries');
    if ($email !== '') {
        $mail->addReplyTo($email, $name);
    }

    $mail->isHTML(true);
    $mail->Subject = 'New Quotation Request from Get Quotation Form';
    $mail->Body = "
        <h1>New Quotation Request</h1>
        <p><strong>Name:</strong> " . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "</p>
        <p><strong>Mobile:</strong> " . htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') . "</p>
        <p><strong>Email:</strong> " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "</p>
        <p><strong>City:</strong> " . htmlspecialchars($city, ENT_QUOTES, 'UTF-8') . "</p>
        <p><strong>Layout:</strong> " . htmlspecialchars($layout, ENT_QUOTES, 'UTF-8') . "</p>
        <p><strong>Area:</strong> " . htmlspecialchars($area, ENT_QUOTES, 'UTF-8') . "</p>
        <p><strong>Finish:</strong> " . htmlspecialchars($finish, ENT_QUOTES, 'UTF-8') . "</p>
        <p><strong>Estimated Price:</strong> " . htmlspecialchars($price, ENT_QUOTES, 'UTF-8') . "</p>
        <p><strong>Consent:</strong> " . htmlspecialchars($agree, ENT_QUOTES, 'UTF-8') . "</p>
        <p><strong>Message:</strong> " . nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8')) . "</p>
    ";

    $mail->send();
    header('Location: get-quotation.php?mail=success');
    exit;
} catch (Exception $e) {
    header('Location: get-quotation.php?mail=error&msg=' . urlencode($mail->ErrorInfo));
    exit;
}
