<?php
    include '../koneksi.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    if($_POST){
        $email = $_POST["email"];

        $sel_query = "SELECT * FROM `company` WHERE email='".$email."'";
        $results = mysqli_query($koneksi, $sel_query);
        $row = mysqli_num_rows($results);

        if($row > 0){
            if(isset($_POST["email"])){
                $emailTo = $_POST["email"];
                $code = uniqid(true);
                $query = mysqli_query($koneksi, "INSERT INTO resetpasswords(code, email) VALUES ('$code','$emailTo')");

                if(!$query){
                    exit("Error");
                }

                // Instantiation and passing `true` enables exceptions
                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth = true;                                   // Enable SMTP authentication
                    $mail->Username = 'ayomagangayo@gmail.com';                     // SMTP username
                    $mail->Password = 'ayomagang123';                               // SMTP password
                    $mail->SMTPSecure = 'tsl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                    //Recipients
                    $mail->setFrom('ayomagangayo@gmail.com', 'Ayo Magang - Reset Password');
                    $mail->addAddress($emailTo);     // Add a recipient
                    $mail->addReplyTo('ayomagangayo@gmail.com', 'No Replay');

                    // Content
                    $url = "http://".$_SERVER["HTTP_HOST"]. dirname($_SERVER["PHP_SELF"])."/resetPassword.php?code=$code";
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Your password reset link';
                    $mail->Body = "<h1>Your requested a password reset</h1> 
                            Click <a href='$url'>this link</a> to do so";
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    echo 'Reset password link has been sent to your email';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                exit();
            }
        }
        else{
            echo"<script>alert('Email yang dimasukkan tidak ditemukan!')</script>";
        }
    }
?>

<form method="POST">
    <input type="text" name="email" placeholder="Email" autocomplete="off">
    <br>
    <input type="submit" name="submit" value="Reset Password">
</form>


