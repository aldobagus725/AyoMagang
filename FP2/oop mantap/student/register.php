<?php 
    session_start();
    $spesialisasi = array("Perhotelan", "Kelistrikan", "Teknologi", "Kuliner", "Jurnalis", "Akuntansi", "Marketing",);
    sort($spesialisasi);
    require '../classes/student.php';
    $student = new student();
?>
<html>
    <head>
        <style>
            #register-student::before{
                content: "";
                position: fixed;
                left: 0;
                right: 0;
                z-index: -1;
                display: block;
                background-image: url(../assets/img/carousel/1.jpg);
                filter: brightness(65%);
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
        <div class="container-fluid" id="register-student">
            <div class="container" style="padding-top:10px;">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col wow fadeInDown" style="color:white;">
                        <img src="../assets/img/logo/logo_putih_pas.png" style="width:30%;">
                        <h1 style="color:white;font-weight:276;font-size:40px;">Student Register</h1>
                    </div>
                </div>
                <form method="post" action="#">
                <div class="row align-items-top justify-content-start text-left" style="padding-top:10px;">
                    <div class="col-sm-6 wow fadeInLeft">
                        <div class="card rounded border-0" style="background-color:rgba(255,255,255,0);">
                            <div class="card-body" style="color:white;">
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="fullname" required autofocus placeholder="Nama Lengkap Anda (WAJIB)">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="username" required autofocus placeholder="Username Anda (WAJIB)">
                                  </div>
                                  <div class="form-group">
                                      <input type="email" class="form-control" name="email" required autofocus placeholder="Email Anda (WAJIB)">
                                  </div>
                                  <div class="form-group">
                                      <input type="password" class="form-control" name="password" required placeholder="Password Baru Anda (WAJIB)">
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 wow fadeInRight">
                        <div class="card rounded border-0" style="background-color:rgba(255,255,255,0);">
                            <div class="card-body" style="color:white;">
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="institution_name" autofocus placeholder="Nama Sekolah/Kampus Anda (Opsional)">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="student_number" autofocus placeholder="NIS / NIM anda (Opsional)">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="address" autofocus placeholder="Alamat Anda (Opsional)">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="phone" placeholder="No Telp Anda (Opsional)">
                                  </div>
                                  <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                   Bidang
                                                </span>
                                            </div>
                                            <select name="course" class="custom-select" required>
                                                <?php
                                                    for($i=0;$i<count($spesialisasi);$i++){
                                                        echo "<option value=\"$spesialisasi[$i]\">$spesialisasi[$i]</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-start text-left wow fadeInUp" style="color:white;">
                    <div class="col text-center align-items-center">
                        <div class="form-group">
                            <input type="submit" name="register-student" class="btn btn-primary" value="Daftar">
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
                                 Mau daftar jadi employer? Klik di <a href="../company/register.php" style="text-decoration: none!important; color:white;"><b>Sini</b></a>
                              </p>
                          </div>
                        <a href="index.php"><img src="../assets/img/logo/logo%20putih.png" style="padding-bottom:20px;"></a>
                        <h6>Copyright &copy; 2020 Ayo Magang</h6>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php
        if(isset($_POST['register-student'])){
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $student_number= $_POST['student_number'];
            $institution_name= $_POST['institution_name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);	
            $course = $_POST['course'];
            $aktif = 0;
            //buat token
            $token=hash('sha256', md5(date('Y-m-d')));
            $register_student = $student->register_student($fullname,$username,$password,$student_number,$institution_name,$course,$address,$phone,$email,$token,$aktif);
            if ($register_student==0){echo "<script>alert('Silahkan Lengkapi Data Departemen');location='register.php';</script>";}
            elseif ($register_student==2){echo "<script>alert('Nomor Telepon Tidak Valid');location='register.php';</script>";} 
            elseif ($register_student==3){echo "<script>alert('Email atau Username telah terdaftar!');location='register.php';</script>";} 
            elseif ($register_student==1){include("regisMail.php");echo "<script>alert('Pendaftaran anda berhasil, silahkan cek email anda untuk aktivasi. ');location = 'login.php';</script>";}
        }
    ?>
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script>jQuery(document).ready(function() { new WOW().init(); });</script>
</html>