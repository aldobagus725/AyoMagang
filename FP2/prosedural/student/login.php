<?php 
    session_start();
    include '../koneksi.php';
?>
<html>
    <head>
        <style>
            #login-student::before{
                content: "";
                position: fixed;
                left: 0;
                right: 0;
                z-index: -1;
                display: block;
                background-image: url(../assets/img/carousel/4.jpg);
                filter: brightness(60%);
                background-repeat: no-repeat;
                background-size:cover;
                width: 100%;
                height: 100%;
            }
        </style>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
    </head>
    <body>
        <div class="container-fluid" id="login-student">
            <div class="container" style="padding-top:30px;">
                <div class="row align-items-center justify-content-start text-left">
                    <div class="col wow fadeInLeft" style="color:white;">
                        <img src="../assets/img/logo/logo_putih_pas.png" style="width:30%;">
                        <p style="font-weight:350!important;color:white!important;font-size:24px;">Mencari Magang Akademik Menjadi Lebih Mudah!</p>
                    </div>
                </div>
                <div class="row align-items-center justify-content-start text-left">
                    <div class="col-sm-4 wow fadeInLeft">
                        <div class="card rounded border-0" style="background-color:rgba(255,255,255,0);">
                            <div class="card-body" style="color:white;">
                                <h1 style="color:white;font-weight:276;font-size:40px;">Student Login</h1>
                                <form method="post" action="">
                                    <div class="form-group" style="padding-top:20px;">
                                        <input type="text" class="form-control" name="username" placeholder="Email atau Username Anda" value=""/>
                                    </div>
                                    <div class="form-group" style="padding-bottom:20px;">
                                        <input type="password" class="form-control" name="password" placeholder="Kata Sandi anda" value=""/>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Masuk" name="login-student"> 
                                        <a href="#" class="ForgetPwd btn btn-secondary" style="text-decoration: none;color:white;">Lupa Password? Klik Di sini!</a>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                            <label class="form-check-label" for="remember">Ingat Akun Saya</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <p style="color:white;font-size:19px;">
                                            Ingin mendaftar ? Klik di <a href="register.php" style="text-decoration: none; color:white;"><b>Sini</b></a><br>
                                            Atau Ingin Posting job? Klik di <a href="../company/login.php" style="text-decoration: none!important; color:white;"><b>Sini</b></a>
                                        </p>
                                    </div>
                                </form>
                                <a href="../index.php"><img src="../assets/img/logo/logo%20putih.png" style="padding-bottom:20px;"></a>
                                <h6>Copyright &copy; 2020 Ayo Magang</h6>
                            </div>
                        </div>
                    </div>
                </div>              
            </div>
        </div>
    </body>
    <?php
        if(isset($_POST['login-student'])){
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $query = $koneksi->query("SELECT * FROM student WHERE 
                (email    = '$username' OR username = '$username' ) AND 
                 password = '$password'");
            $data = $query->num_rows;
            if($data == 1){
                $akun = $query->fetch_assoc(); 
                $_SESSION['student'] = $akun;
                echo "<script>location='dashboard.php';</script>";
            }
            else{
                echo "<div class='alert alert-danger'>Login Gagal! Silakan masukkan kembali username & password anda!</div>";
            }
        }
    ?>  
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/wow.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script>jQuery(document).ready(function() { new WOW().init(); }); </script>
</html>