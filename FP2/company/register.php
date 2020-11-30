<?php
    include '../koneksi.php';
    if(!isset($_SESSION)) {session_start();}
    require '../classes/company.php';
    $company = new company();
?>
<html>
    <head>
        <style>
            #register-company::before{
            content: "";position: fixed;
            left: 0;right: 0;
            z-index: -1;display: block;
            background-image: url(../assets/img/backgrounds/reg-comp.jpg);
            filter: brightness(20%);background-repeat: no-repeat;
            background-size:cover;width: 100%;height: 100%;}
            #pwd_check{font-weight: bold;}
        </style>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">
    </head>
    <body>
        <div class="container-fluid" id="register-company">
            <div class="container" style="padding-top:15px;">
                <div class="row align-items-center">
                    <div class="col-sm-1 wow fadeInleft text-left" style="color:white;">
                        <a href="../index.php"><i class='fas fa-arrow-left' style='font-size:36px;color:white;'></i></a>
                    </div>
                    <div class="col-sm-11 mx-auto wow fadeInDown text-center" style="color:white;">
                        <a href="../index.php"><img src="../assets/img/logo/logo_putih_pas.png" style="width:30%;"></a>
                    </div>
                </div>
                <div class="row align-items-top">
                    <div class="col-sm-6 wow fadeInLeft text-left" style="color:white;">
                        <br>
                        <h4>Apa itu Ayo Magang?</h4><br>
                        <p style="font-size:16px;" class="text-justify">
                            Ayo Magang adalah aplikasi web yang membantu kamu siswa atau mahasiswa praktek
                            dalam mencari perusahaan sebagai tempat magang akademik kalian!<br><br>

                            Aplikasi web kami sudah dilengkapi dengan teknologi terbaru, menggunakan
                            properti web yang ringan, sehingga kalian bisa dengan cepat mengakses informasi
                            yang kalian butuhkan!<br><br>

                            Kamu juga sudah bekerja sama dengan banyak perusahaan, sehingga kalian memiliki
                            banyak pilihan dalam mencari perusahaan sesuai jurusan ataupun preferensi kalian.<br><br>
                        </p>
                        <hr style="color:white;">
                        <div class="jumbotron rounded shadow-sm">
                            <div class="row align-items-center text-center" style="">
                                <div class="col"><img src="../assets/img/partner/stikom.png" width="60%"></div>
                                <div class="col"><img src="../assets/img/partner/help.png" width="80%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 wow fadeInRight justify-content-end">
                        <div class="card rounded border-0" style="background-color:rgba(255,255,255,0);">
                            <div class="card-body" style="color:white;">
                                <p style="color:white;font-weight:276;font-size:26px;">Company Register</p>
                                <form method="post" id="register-student-form" onSubmit="return valid();">
                                <div class="form-group">
                                    <label for="fullname">Nama Perusahaan:</label>
                                    <input type="text" name="company_name" class="form-control" required autofocous> 
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" id="email" class="form-control" onBlur="checkEmailAvailability()" required autofocous> 
                                    <i><span style="float:left;font-size:14px;" id="user-email-availability-status"></span></i><br>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username:</label>
                                    <input type="text" name="username" id="username" class="form-control" onBlur="checkUsernameAvailability()" required autofocous> 
                                    <i><span style="float:left;font-size:14px;" id="user-username-availability-status"></span></i><br>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" id="pass" onkeyup="passwordStrength(this.value)" class="form-control"  required autofocous>
                                    <p style="color:white;font-weight:280;font-size:10px;"><i>*Minimal 8 karakter, huruf besar, kecil, angka &amp; karakter khusus</i></p>
                                    <i><span style="float:right;font-size:14px;" id="pwd_check"></span></i>
                                    <input type="checkbox" onclick="passToggle()">&nbsp;Show Password
                                </div>
                                <div class="form-group align-items-center">
                                    <div class="row">
                                        <div class="col text-left">
                                            <p style="color:white;text-decoration:none;">
                                                Dengan mengklik daftar, anda telah setuju dengan <a href="#">Kebijakan Privasi dan Ketentuan yang telah Berlaku</a>
                                            </p>
                                        </div>
                                        <div class="col text-right">
                                            <input type="submit" name="register-company" class="btn btn-primary btn-block" id="submit" value="Daftar jadi Company!"><br>
                                        </div>
                                    </div>
                                    <div class="row text-center">
                                        <div class="col">
                                            <a href="login.php"><button type="button" class="btn btn-success">Login ke Company</button></a>
                                            <a href="../student/register.php"><button type="button" class="btn btn-info">Daftar Jadi Student</button></a>    
                                        </div>
                                    </div>
                                </div>
                                </form>
                                <div class="form-group text-center">
                                    <p style="color:white;font-size:15px;">
                                        Copyright &copy; 2020 Ayo Magang
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </div>
    </body>
        
    <?php
            if(isset($_POST['register-company'])){
            $company_name = mysqli_real_escape_string($koneksi,$_POST['company_name']);
            $username = mysqli_real_escape_string($koneksi,$_POST['username']);
            $email = mysqli_real_escape_string($koneksi,$_POST['email']);
            $password = password_hash(mysqli_real_escape_string($koneksi,$_POST['password']),PASSWORD_DEFAULT);	
            $aktif = 0;
            $token=hash('sha256', md5(date('Y-m-d')));
            $reg_company = $company->register_company_first($company_name,$username,$password,$email,$token,$aktif);           
            if ($reg_company==1){include("regisMail.php");echo "<script>alert('Pendaftaran anda berhasil, silahkan cek email anda untuk aktivasi.');location = 'login.php';</script>";}
            elseif($reg_student==3){echo "<script>alert('Email / Username Duplicate detected!');location='register.php';</script>";}
            else{echo "<script>alert('Oops! Error occured');location='register.php';</script>";}
        }
    ?>
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/fontawesome/js/all.min.js"></script>
    <script>jQuery(document).ready(function() { new WOW().init();});</script>
        <script>
    // fungsi untuk mengecek kekuatan password
    function passwordStrength(p){
        var pwd_check = document.getElementById('pwd_check');
        var regex = new Array();
        regex.push("[A-Z]");
        regex.push("[a-z]");
        regex.push("[0-9]");
        regex.push("[!@#$%^&*]");
        var passed = 0;
        for(var x = 0; x < regex.length;x++){
            if(new RegExp(regex[x]).test(p)){
                console.log(passed++);
            }
        }
        var strength = null;
        var color = null;
        switch(passed){
            case 0:case 1:
            case 2:
                strength = "Kekuatan Password Lemah";
                color = "#FF3232";
                break;
            case 3:
                strength = "Kekuatan Password Sedang";
                color = "#E1D441";
                break;
            case 4:
                strength = "Kekuatan Password Aman";
                color = "#27D644";
        }
        pwd_check.innerHTML = strength;
        pwd_check.style.color = color;
    }
    // fungsi untuk menampilkan dan menyembunyikan password
    function passToggle(){
        var x = document.getElementById("pass");
        if (x.type === "password") {x.type = "text";} 
        else {x.type = "password";}
    }
    // email availability
    function checkEmailAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data:'email='+$("#email").val(),
            type: "POST",
            success:function(data){
                $("#user-email-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error:function (){}
        });
    }
    // username availability
    function checkUsernameAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data:'username='+$("#username").val(),
            type: "POST",
            success:function(data){
                $("#user-username-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error:function (){}
        });
    }
    </script>
</html>