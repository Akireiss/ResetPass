<?php  
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
require '../../../vendor/autoload.php';
require '../../../config/connection.php';
$database = new Database();
$pdo = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userEmail = $_POST['email'];
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $userEmail);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo 'Email not found in the database. Password reset email was not sent.';
    } else {
        $resetToken = bin2hex(random_bytes(16));
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'emailmo@gmail.com';
            $mail->Password   = 'passwordmo'; // Replace with your email password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            $mail->setFrom('emailmo@gmail.com', 'Aki Reiss');
            $mail->addAddress($userEmail);

            $resetLink = 'https://yourwebsite.com/reset-password.php?token=' . $resetToken;

            $mail->Subject = 'Password Reset';
            $mail->Body = "Click the link below to reset your password:<br><a href='$resetLink'>$resetLink</a>";
            $mail->AltBody = 'Copy and paste the following URL in your browser: ' . $resetLink;

            $mail->send();

            echo 'Password reset email sent successfully.';
        } catch (Exception $e) {
            echo 'An error occurred while sending the email: ' . $e->getMessage();
        }
    }
}
