<?php  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; 
$mailer = new PHPMailer(true);

try {
    $mailer->isSMTP();
    $mailer->Host = 'smtp.example.com';
    $mailer->SMTPAuth = true;
    $mailer->Username = 'reissathena64@gmail.com';
    $mailer->Password = '.';
    $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mailer->Port = 587;

    $mailer->setFrom('joshcstnd@gmail.com', 'Akira');

   
    $mailer->addAddress($userEmail, $userName);
} catch (Exception $e) {
   
}

?>