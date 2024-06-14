<?php
session_start();

$db_user = "root";
$db_pass = "";
$db_name = "alumnimalvar";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . "/vendor/autoload.php";

if(isset($_POST['approveCertificate'])) {
    try {
        $user_id = $_GET['user_id'];
        $certificate_id = $_GET['certificate_id'];
        $emailAddress = $_POST['emailAddress'];
        $approvedDate = $_POST['approvedDate'];
        $message = $_POST['message'];

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->Username = "alumnimalvarshs@gmail.com";
        $mail->Password = "pwwyenssjwlowzaq";

        $mail->setFrom("alumnimalvarshs@gmail.com");
        $mail->addAddress($emailAddress);
        $mail->isHTML(true);
        $mail->Subject = 'Certificate of Graduatuion - ' . $approvedDate;
        $mail->Body = $message;
        $mail->send();

        $sqlUpdateStatus = "UPDATE certificate SET status = 'approve' WHERE user_id = ? AND certificate_id = ?";
        $stmtUpdateStatus = $db->prepare($sqlUpdateStatus);
        $stmtUpdateStatus->execute([$user_id, $certificate_id]);

        $_SESSION['showApproveCertificate'] = true;
        header("Location: ../index.php");
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
