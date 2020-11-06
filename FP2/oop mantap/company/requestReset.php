<?php
    include '../koneksi.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

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
                if(!$query){exit("Error");}
                // Instantiation and passing `true` enables exceptions
                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    //$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
                    $mail->isSMTP();// Send using SMTP
                    $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
                    $mail->SMTPAuth = true;// Enable SMTP authentication
                    $mail->Username = 'ayomagangayo@gmail.com';// SMTP username
                    $mail->Password = 'ayomagang123';// SMTP password
                    $mail->SMTPSecure = 'tsl';// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port = 587;// TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
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
                } catch (Exception $e) {echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";}
                exit();
            }
        }
        else{echo"<script>alert('Email yang dimasukkan tidak ditemukan!')</script>";}
    }
?>
<html>
    <head>
        <title>Reset Password</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/ayomagang.css">
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            #reset-pass:before{
                background-image: url(../assets/img/backgrounds/1@2x.jpg);
                content: "";
                position: absolute;
                left: 0;
                right: 0;
                z-index: -1;
                display: block;
                filter: brightness(60%);
                background-repeat: no-repeat;
                background-size:cover;
                width: 100%;
                height: 100%;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid" id="reset-pass">
            <div class="container" style="padding-bottom:50px;">
                <div class="row align-items-center text-center" style="padding-top:40px;">
                    <div class="col">
                        <img src="../assets/img/logo/logo_putih_pas.png" style="width:30%;">
                        <h1 style="color:white;">Reset Password</h1>
                        <br>
                    </div>
                </div>
                <div class="row align-items-center text-center" style="padding-top:70px;">
                    <div class="col-sm-6 mx-auto">
                        <form method="POST">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Alamat</span>
                                </div>
                                <input type="email" class="form-control" name="email" required autofocus placeholder="Email">
                            </div>
                            <input type="submit" name="submit" value="Reset Password">
                        </form>
                    </div>
                </div>
                <div class="row align-items-center justify-content-start text-left wow fadeInUp" style="color:white;">
                    <div class="col text-center align-items-center">
                        <div class="form-group">
                              <p style="color:white;font-size:19px;">
                                 Sudah Punya Akun? Klik di <a href="login.php" class="" style="text-decoration: none; color:white;"><b>Sini</b></a><br>
                              </p>
                          </div>
                        <div class="form-group">
                            <a href="../index.php"><img src="../assets/img/logo/logo%20putih.png" style="padding-bottom:20px;"></a>
                            <h6>Copyright &copy; 2020 Ayo Magang</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</html>




