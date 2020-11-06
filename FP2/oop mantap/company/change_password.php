<?php    
    if(!isset($_SESSION)){session_start();} 
    if (empty($_SESSION)) {
        echo "<script>alert('Silahkan login terlebih dahulu!');</script>";
        echo "<script>location='login.php';</script>";
    } elseif (!isset($_SESSION['company'])) {
        echo "<script>alert('403 Forbidden');</script>";
        echo "<script>location='login.php';</script>";
        die;
    }
    require"../classes/student.php";
    $student = new student();
    $student_id = $_SESSION['student']['student_id'];
?>
<html>
    <head>
        <title>Ganti Password</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/ayomagang.css">
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
        <link rel="stylesheet" href="../assets/css/animate.css">
        <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            #utama{background-color:white;}
        </style>
    </head>
    <body>
        <?php include ('local_navbar.php'); ?>
        <div class="container-fluid" id="utama">
            <div class="container" style="padding-bottom:50px;">
                <div class="row align-items-center text-center" style="padding-top:40px;">
                    <div class="col" style="padding-top:50px;">
                        <h3>Change Password</h3>
                        <br>
                        <form method="post">
                            <div class="card">
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Masukkan Password Lama</span>
                                        </div>
                                        <input type="password" name="old_password" class="form-control" value="">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Masukkan Password Baru</span>
                                        </div>
                                        <input type="password" name="new_password" class="form-control" value="">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Konfirmasi Password Baru</span>
                                        </div>
                                        <input type="password" name="confirm_new_password" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <input type="submit" class="btn btn-primary btn-sm" name="change-password" value="Ganti Password">
                                    <input type="reset" class="btn btn-secondary btn-sm" name="reset" value="Ulang Isi">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php
        if(isset($_POST['change-password'])){
            $old_password = md5($_POST['old_password']);
            $new_password = md5($_POST['new_password']);
            $confirm_new_password = md5($_POST['confirm_new_password']);
            if ($old_password!=$student->getters($student_id,'password')){
                echo "<script>alert('Password Lama Salah!');location = 'change_password.php';</script>";
            }
            else{
                if ($new_password!=$confirm_new_password){
                    echo "<script>alert('Password Baru tidak sama! Konfirmasi Ulang!');location = 'change_password.php';</script>";
                }
                else{
                    $change = $student->changePassword($student_id,$new_password);
                    if ($change == 1){
                        echo "<script>alert('Selamat! Password anda telah berubah!');location = 'myprofile.php';</script>";
                    }
                    else{
                        echo "<script>alert('Error!Silakan coba lagi!');location = 'change_password.php';</script>";
                    }
                }
            }
        }
    ?>
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</html>