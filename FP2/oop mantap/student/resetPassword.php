<?php
    include '../koneksi.php';
    require '../classes/student.php';
    $company = new company();
    if(!isset($_GET["code"])){exit("Can't find page");}
    $code = $_GET["code"];
    $getEmailQuery = mysqli_query($koneksi, "SELECT email FROM resetpasswords where code='$code'");
    if(mysqli_num_rows($getEmailQuery) == 0){
        exit("Error 404! CANNOT FIND PAGE");
    }
    if(isset($_POST["submit"])){
        $new_password = md5($_POST["new_password"]);
        $confirm_new_password = md5($_POST["confirm_new_password"]);
        $row = mysqli_fetch_array($getEmailQuery);
        $email = $row["email"];
        if ($new_password!=$confirm_new_password){
            echo '<script>
                        <div class="alert alert-danger">
                            Password Tidak sama! Konfirmasi ulang!
                        </div>
                  </script>
                 ';
        }
        else{
            $resetPwd = $student->ResetPassword($email,$new_password);
            if($resetPwd == 1){
                echo "<script>alert('Password berhasil direset! Silakan login ulang!');location='login.php';</script>";
            }
            else{
                echo '<script>
                        <div class="alert alert-danger">
                           Something Went Wrong!
                        </div>
                  </script>
                  ';
            }
        }
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
                                    <span class="input-group-text">Password Baru</span>
                                </div>
                                <input type="new_password" class="form-control" name="password" required autofocus placeholder="Masukkan Password baru anda disini">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Confirm Password Baru</span>
                                </div>
                                <input type="confirm_new_password" class="form-control" name="password" required autofocus placeholder="Konfirmasi Password baru anda disini">
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
