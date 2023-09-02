<?php
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
require '../../../vendor/autoload.php';
require '../../../config/connection.php';
$database = new Database();
$pdo = $database->getConnection();

$message = ''; // Initialize an empty message variable

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userEmail = $_POST['email'];
    $productName = $_POST['product']; // Get the product name from the form

    // You can include additional processing for the purchase here, such as storing the purchase details in your database.

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'emailhere';
        $mail->Password   = 'yourpasswordhere'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        $mail->setFrom('reissathena64@gmail.com', 'Aki Reiss');
        $mail->addAddress($userEmail);

        $mail->Subject = 'Thank You for Your Purchase';
        $mail->Body = "Thank you for purchasing '$productName'. Your order has been processed.";
        $mail->AltBody = "";

        $mail->send();

        $message = 'Thank you for purchasing. An email has been sent with order details.';

        header('Location: index.php'); // Redirect to index.php
        exit;
    } catch (Exception $e) {
        $message = 'An error occurred while sending the email: ' . $e->getMessage();
    }
}
