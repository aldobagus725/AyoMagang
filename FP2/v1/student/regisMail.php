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
//    $mail->SMTPDebug = 1;
    $mail->isSMTP();// Send using SMTP
    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
    $mail->SMTPAuth = true;// Enable SMTP authentication
    $mail->Username = 'ayomagangayo@gmail.com';// SMTP username
    $mail->Password = 'ayomagang123'; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port = 587; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    //for testing purpose only
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    //Recipients
    $mail->setFrom('ayomagangayo@gmail.com', 'Ayo Magang - Register');
    $mail->addAddress($_POST['email'], $_POST['fullname']);
    $mail->addReplyTo('ayomagangayo@gmail.com', 'No Replay');
    // Content
    $mail->isHTML(true);// Set email format to HTML
    $mail->AddEmbeddedImage('logo.png', 'ayomagang');
    $mail->Subject = "Aktivasi Pendaftaran Student";
    $mail->Body = "
        <html xmlns='http://www.w3.org/1999/xhtml'>
        <head>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
        <style>
            .container{
                width:75%;
                font-size: 16px;
            }
        </style>
        </head>
        <body>
            <div class='container'>
                <center><img src='cid:ayomagang' width='50%'></center>
                <br>
                <center>
                Selamat, anda berhasil membuat akun Student! Untuk mengaktifkan akun anda silahkan klik <a href='http://localhost/ayomagang/student/activation.php?t=".$token."'>tautan link ini.</a><br>
                Jika tidak berhasil, bisa mencoba <a href='http://localhost:8080/ayomagang/student/activation.php?t=".$token."'> tautan link alternatif berikut </a>
                </center>
            </div>
        </body>
        </html>
        ";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}