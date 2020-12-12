<?php 
    if(!isset($_SESSION)){session_start();}
    include '../koneksi.php';
    include 'db_chat.php';
    if (isset($_SESSION['company'])) {echo "<script>location='../company/dashboard.php';</script>";die;} 
    elseif (isset($_SESSION['student'])) {echo "<script>location='dashboard.php';</script>";die;}
?>
<html>
    <head>
        <style>
            #login-student::before{
                content: "";position: fixed;
                left: 0;right: 0;
                z-index: -1;display: block;
                background-image: url(../assets/img/carousel/4.jpg);
                filter: brightness(60%);
                background-repeat: no-repeat;background-size:cover;
                width: 100%;height: 100%;
            }
        </style>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
        <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
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
                                <h1 style="color:white;font-weight:276;font-size:40px;">Student Login</h1><br>
                                <form method="post" action="#">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class='fas fa-id-card'></i></span></div>
                                    <input type="text" class="form-control" name="emailuname" placeholder="Email atau Username anda" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class='fas fa-lock'></i></span></div>
                                    <input type="password" class="form-control" name="password" placeholder="Kata Sandi anda" required>
                                </div>
                                <div class="input-group mb-3 justify-content-center">
                                    <input type="submit" class="btn btn-primary btn-block" style="font-size:18px;" value="Masuk" name="login-student">
                                    <a href="register.php" class="btn btn-success btn-block" style="text-decoration: none;color:white;font-size:18px;">Daftar jadi Student</a><br>
                                </div>
                                <?php
                                    if(isset($_POST['login-student'])){
                                        $emailuname = mysqli_real_escape_string($koneksi,$_POST['emailuname']);
                                        $password = mysqli_real_escape_string($koneksi,$_POST['password']);
                                        $query = "SELECT * FROM student WHERE (email='$emailuname' OR username ='$emailuname')"; 
                                        $result = mysqli_query($koneksi, $query); 
                                        if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_array($result)){
                                                if($row["aktif"]==0){echo "
                                                <div class='input-group mb-3 justify-content-center'>
                                                    <div class='alert alert-danger'>Akun anda belum teraktivasi! Silakan aktivasi terlebih dahulu!</div>
                                                </div>";}
                                                else{
                                                    if(password_verify($password, $row["password"])){
                                                        $queryTemp = $koneksi->query("SELECT * FROM student WHERE (email = '$emailuname' OR username = '$emailuname')");
                                                        $data = $queryTemp->num_rows;
                                                        if($data == 1){
                                                            $akun = $queryTemp->fetch_assoc(); 
                                                            $_SESSION['student'] = $akun;
                                                            //login-details for chat
                                                            $sub_query = "INSERT INTO login_details (user_id) VALUES ('".$row['student_id']."')";
                                                            $statement = $connect->prepare($sub_query);
                                                            $statement->execute();
                                                            $_SESSION['login_details_id'] = $connect->lastInsertId();
                                                            header("location:dashboard.php");
                                                        }
                                                    }else{echo "<div class='alert alert-danger'>Login Gagal! Silakan masukkan kembali username & password anda!</div>";}
                                                }
                                            }  
                                       }else{echo "<div class='alert alert-danger'>Login Gagal! Silakan masukkan kembali username & password anda!</div>";}
                                    }
                                ?>  
                                    <div class="form-group">
                                        <p style="color:white;font-size:19px;">
                                            Lupa password? Klik di <a href="requestReset.php" style="text-decoration: none; color:white;"><b>Sini</b></a><br>
                                            Ingin masuk jadi Company? Klik di <a href="../company/login.php" style="text-decoration: none!important; color:white;"><b>Sini</b></a>
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
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/fontawesome/js/all.min.js"></script>
    <script>jQuery(document).ready(function() { new WOW().init(); }); </script>
</html>