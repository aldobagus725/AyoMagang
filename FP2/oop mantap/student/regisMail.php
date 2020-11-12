<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->isSMTP();// Send using SMTP
    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
    $mail->SMTPAuth = true;// Enable SMTP authentication
    $mail->Username = 'ayomagangayo@gmail.com';// SMTP username
    $mail->Password = 'ayomagang123'; // SMTP password
    $mail->SMTPSecure = 'tsl'; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port = 587; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    //Recipients
    $mail->setFrom('ayomagangayo@gmail.com', 'Ayo Magang - Register');
    $mail->addAddress($_POST['email'], $_POST['fullname']);
    $mail->addReplyTo('ayomagangayo@gmail.com', 'No Replay');
    // Content
    $mail->isHTML(true);// Set email format to HTML
    $mail->Subject = "Aktivasi pendaftaran Member";
    $mail->Body = "Selamat, anda berhasil membuat akun. Untuk mengaktifkan akun anda silahkan klik link dibawah ini.
    <a href='http://localhost/ayomagang/student/activation.php?t=".$token."'>http://localhost/ayomagang/student/activation.php?t=".$token."</a><br>
    jika anda menggunakan port 8080, maka <a href='http://localhost:8080/ayomagang/student/activation.php?t=".$token."'>http://localhost:8080/ayomagang/student/activation.php?t=".$token."</a>
    ";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}