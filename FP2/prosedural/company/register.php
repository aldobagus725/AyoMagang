<?php 
    session_start();
    include '../koneksi.php';
    $spesialisasi = array("Perhotelan", "Kelistrikan", "Teknologi", "Kuliner", "Jurnalis", "Akuntansi", "Marketing",);
    sort($spesialisasi);
?>
<html>
    <head>
        <style>
            #register-company::before{
            content: "";
            position: fixed;
            left: 0;
            right: 0;
            z-index: -1;
            display: block;
            background-image: url(../assets/img/backgrounds/reg-comp.jpg);
            filter: brightness(50%);
            background-repeat: no-repeat;
            background-size:cover;
            width: 100%;
            height: 100%;
            }
        </style>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">
    </head>
    <body>
        <div class="container-fluid" id="register-company">
            <div class="container" style="padding-top:15px;">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col wow fadeInDown" style="color:white;">
                        <img src="../assets/img/logo/logo_putih_pas.png" style="width:30%;">
                        <h1 style="color:white;font-weight:276;font-size:40px;">Company Register</h1>
                    </div>
                </div>
                <form method="post" action="#">
                <div class="row align-items-top justify-content-start text-left" style="padding-top:10px;">
                    <div class="col-sm-6 wow fadeInLeft">
                        <div class="card rounded border-0" style="background-color:rgba(255,255,255,0);">
                            <div class="card-body" style="color:white;">
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="company_name" required autofocus placeholder="Nama Lengkap Perusahaan Anda (Wajib)">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="username" required autofocus placeholder="Username Perusahaan Anda (Wajib)">
                                  </div>
                                  <div class="form-group">
                                      <input type="email" class="form-control" name="email" required autofocus placeholder="Email Perusahaan Anda (Wajib)">
                                  </div>
                                  <div class="form-group">
                                      <input type="password" class="form-control" name="password" required placeholder="Password Baru Perusahaan Anda (Wajib)">
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 wow fadeInRight">
                        <div class="card rounded border-0" style="background-color:rgba(255,255,255,0);">
                            <div class="card-body" style="color:white;">
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="siup" autofocus placeholder="Nomor SIU Perusahaan Anda (Opsional)">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="address" autofocus placeholder="Alamat Perusahaan Anda (Opsional)">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="phone" placeholder="No Telp Perusahaan Anda (Opsional)">
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-start text-left wow fadeInUp" style="color:white;">
                    <div class="col text-center align-items-center">
                        <div class="form-group">
                            <input type="submit" name="register-company" class="btn btn-primary" value="Daftar">
                            <input type="reset" name="reset" class="btn btn-danger" value="Reset Input">
                        </div>
                    </div>
                </div>
                </form>
                <div class="row align-items-center justify-content-start text-left wow fadeInUp" style="color:white;">
                    <div class="col text-center align-items-center">
                        <div class="form-group">
                              <p style="color:white;font-size:19px;">
                                 Sudah Punya Akun? Klik di <a href="login.php" class="" style="text-decoration: none; color:white;"><b>Sini</b></a><br>
                                 Mau daftar nyari magang? Klik di <a href="../student/register.php" style="text-decoration: none!important; color:white;"><b>Sini</b></a>
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
    <?php
        if(isset($_POST['register-company'])){
            $company_name = $_POST['company_name'];
            $username = $_POST['username'];
            $siup= $_POST['siup'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);	

            $query = $koneksi->query("SELECT * FROM company WHERE email = '$email' OR username = '$username'");
            $valid_user = $query->num_rows;

            //Validasi ketika email yang didaftarkan sama
            if($valid_user == 1){
                echo "<script>alert('Email atau Username telah terdaftar!');</script>";
                echo "<script>location='register.php';</script>";
            }
            //Validasi ketika email tidak sama
            else{
                $koneksi->query("INSERT INTO company (company_name,username,siup,address,phone,email,password)
                                VALUES ('$company_name','$username','$siup','$address','$phone','$email','$password')");
                echo "<script>alert('Selamat, pendaftaran berhasil ');</script>";
                echo "<script>location='dashboard.php';</script>";
            }
        }
    ?>
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script>jQuery(document).ready(function() { new WOW().init();});</script>
</html>