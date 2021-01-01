<?php
    require"../classes/superadmin.php";
    $superadmin = new superadmin();
    include"../koneksi.php";
?>
<html>
    <head>
        <style>
            #reg-superadmin::before{
                content: "";position: fixed;
                left: 0;right: 0;z-index: -1;display: block;
                background-image: url(../assets/img/carousel/1.jpg);
                filter: brightness(65%);background-repeat: no-repeat;background-size:cover;
                width: 100%;height: 100%;
            }
        </style>
        <title>Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
    </head>
    <body>
        <div class="container-fluid" id="reg-superadmin">
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
                                <h1 style="color:white;font-weight:276;font-size:40px;">SuperAdmin Register</h1>
                                <form method="post">
                                    <div class="form-group" style="padding-top:20px;">
                                        <input type="text" class="form-control" name="fullname" placeholder="Nama Lengkap Anda" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" placeholder="Username Anda" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email anda" required>
                                    </div>
                                    <div class="form-group" style="padding-bottom:20px;">
                                        <input type="password" class="form-control" name="password" placeholder="Kata Sandi anda" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Daftar" name="reg-superadmin"> 
                                    </div>
                                </form>
                                <br>
                                <a href="../index.php"><img src="../assets/img/logo/logo%20putih.png" style="padding-bottom:20px;"></a>
                                <h6>Copyright &copy; 2020 Ayo Magang</h6>
                            </div>
                        </div>
                             <?php
                                if(isset($_POST['reg-superadmin'])){
                                    $fullname = mysqli_real_escape_string($koneksi,$_POST['fullname']);
                                    $username = mysqli_real_escape_string($koneksi,$_POST['username']);
                                    $email = mysqli_real_escape_string($koneksi,$_POST['email']);
                                    $password = password_hash(mysqli_real_escape_string($koneksi,$_POST['password']),PASSWORD_DEFAULT);
                                    $reg_admin = $superadmin->addAdmin($fullname,$username,$password,$email);           
                                    if ($reg_admin==1){echo "<script>alert('Pendaftaran anda berhasil!');location = 'login.php';</script>";}
                                    else{echo "<script>alert('Oops! Error occured');location='register.php';</script>";}
                                }
                            ?>  
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>