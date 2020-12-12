<?php
    if (!isset($_SESSION)) {session_start();}
    include"../koneksi.php";
    include 'pdo-con.php';
    if(isset($_SESSION['superadmin'])) {echo "<script>location='dashboard.php';</script>";die;} 
?>
<html>
    <head>
        <style>
            #login-superadmin::before{
                content: "";position: fixed;
                left: 0;right: 0;
                z-index: -1;display: block;
                background-image: url(../assets/img/backgrounds/1@2x.jpg);
                filter: brightness(60%);
                background-repeat: no-repeat;background-size:cover;
                width: 100%;height: 100%;
            }
        </style>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
    </head>
    <body>
        <div class="container-fluid" id="login-superadmin">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col wow fadeInDown" style="color:white;">
                    <img src="../assets/img/logo/logo_putih_pas.png" style="width:30%;">
                </div>
            </div>
            <div class="container" style="padding-top:40px;">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-sm-4 wow fadeInUp">
                        <div class="card rounded border-0" style="background-color:rgba(255,255,255,0);">
                            <div class="card-body" style="color:white;">
                                <h1 style="color:white;font-weight:276;font-size:40px;">SuperAdmin Login</h1>
                                <form method="post">
                                    <div class="form-group" style="padding-top:20px;">
                                        <input type="text" class="form-control" name="username" placeholder="Email atau Username Anda">
                                    </div>
                                    <div class="form-group" style="padding-bottom:20px;">
                                        <input type="password" class="form-control" name="password" placeholder="Kata Sandi anda">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Masuk" name="login-superadmin"> 
                                    </div>
                                </form>
                                <div class="form-group">
                                    <a href="register.php"><button class="btn btn-success">Register SuperAdmin (Experimental)</button></a> 
                                </div>
                                <br>
                                <a href="../index.php"><img src="../assets/img/logo/logo%20putih.png" style="padding-bottom:20px;"></a>
                                <h6>Copyright &copy; 2020 Ayo Magang</h6>
                            </div>
                        </div>
                             <?php
                                if(isset($_POST['login-superadmin'])){
                                    $username = mysqli_real_escape_string($koneksi,$_POST['username']);
                                    $password = mysqli_real_escape_string($koneksi,$_POST['password']);
                                    $query = "SELECT * FROM superadmin WHERE email='$username' OR username='$username'";
                                    $result = mysqli_query($koneksi, $query);
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result)){
                                            if(password_verify($password, $row["password"])){
                                                $queryTemp = $koneksi->query("SELECT * FROM superadmin WHERE (email = '$username' OR username = '$username')");
                                                $data = $queryTemp->num_rows;
                                                if($data == 1){
                                                    $akun = $queryTemp->fetch_assoc(); 
                                                    $_SESSION['superadmin'] = $akun;
                                                    $sub_query = "INSERT INTO login_details (user_id) VALUES ('".$row['superadmin_id']."')";
                                                    $statement = $connect->prepare($sub_query);
                                                    $statement->execute();
                                                    $_SESSION['login_details_id'] = $connect->lastInsertId();
                                                    header("location:dashboard.php");
                                                }
                                            }else{echo "<div class='alert alert-danger'>Login Gagal! Silakan masukkan kembali username & password anda!</div>";}
                                        }
                                    }
                                }
                            ?>  
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script>jQuery(document).ready(function() { new WOW().init();});</script>
</html>