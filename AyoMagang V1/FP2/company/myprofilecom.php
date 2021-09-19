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
    include "../koneksi.php";
    require '../classes/company.php';
    $company = new company();
    $company_id = $_SESSION['company']['company_id'];
    //variable
    $company_name = $company->getters($company_id, "company_name");
    $username = $company->getters($company_id, "username");
    $email = $company->getters($company_id, "email");
    $phone = $company->getters($company_id, "phone");
    $address = $company->getters($company_id, "address");
    $siup = $company->getters($company_id, "siup");
    ?>
<html>
    <head>
        <title>Profile</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/ayomagang.css">
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
        <link rel="stylesheet" href="../assets/css/animate.css">
        <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>#bar {background-color: rgb(0, 133, 216);width: 100%;}</style>
    </head>
    <body>
        <?php include('local_navbar.php'); ?>
        <div class="container-fluid" id="companyapplication">
            <div class="container">
                <div class="row align-items-center text-center" style="padding-top:40px;">
                    <div class="col"><h2>Profil Perusahaan Anda</h2><hr></div>
                </div>
                <div class="row align-items-top justfiy-content-start" style="padding-top:30px;padding-bottom:40px;">
                    <div class="col-sm-3 ">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-geninfo-tab" data-toggle="pill" href="#v-pills-geninfo" role="tab" aria-controls="v-pills-geninfo" aria-selected="true">Profile Preview</a>
                            <a class="nav-link" id="v-pills-security-tab" data-toggle="pill" href="#v-pills-security" role="tab" aria-controls="v-pills-security" aria-selected="false">Keamanan</a>
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Pengaturan</a>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-geninfo" role="tabpanel" aria-labelledby="v-pills-geninfo-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-sm-3">
                                                <?php
                                                    if($company->getters($company_id,"profile_picture")==NULL){
                                                ?>
                                                        <img src="../assets/img/testimonials/4.jpg" width="100%;">
                                                <?php
                                                    }else{
                                                ?>
                                                        <img src="../company/profile_picture/<?php echo $company->getters($company_id,"profile_picture");?>" width="100%;">
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                            <div class="col-sm-9">
                                                <table>
                                                    <tr><td><h4><?php echo $company_name; ?></h4></td></tr>
                                                </table>
                                                <table style="font-size:12px;">
                                                    <tr>
                                                        <td><i class='fas fas fa-phone'></i> &nbsp; <?php echo $phone; ?>&nbsp;|&nbsp;</td>
                                                        <td><i class='fas fa-envelope'></i> &nbsp; <?php echo $email; ?>&nbsp;|&nbsp;</td>
                                                        <td><i class='fas fa-map-marker-alt'></i> &nbsp;<?php echo $address; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-hover">
                                            <tr><th>ID Perusahaan</th><td><?php echo $company_id; ?></td></tr>
                                            <tr><th>Nama Perusahaan</th><td><?php echo $company_name; ?></td></tr>
                                            <tr><th>SIUP</th><td><?php echo $siup; ?></td></tr>
                                            <tr><th>Alamat</th><td><?php echo $address; ?></td></tr>
                                            <tr><th>Email</th><td><?php echo $email; ?></td></tr>
                                            <tr><th>Telepon</th><td><?php echo $phone; ?></td></tr>
                                        </table>
                                    </div>
                                    <div class="card-footer text-right">
                                        <?php if ($phone==NULL or $address==NULL or $siup==NULL){ ?>
                                        <a href="#" class="btn btn-primary"data-toggle="modal" data-target="#fullData">LENGKAPI DATA</a>
                                        <?php } ?>
                                        <!--modal for fullData-->
                                        <div class="modal fade" id="fullData">
                                             <div class="modal-dialog">
                                                 <div class="modal-content">
                                                     <form method="post">
                                                         <div class="modal-header"><h4>LENGKAPI DATA</h4>
                                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                         </div>
                                                         <div class="modal-body">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend"><span class="input-group-text">Alamat Anda</span></div>
                                                                <input type="text" name="address" class="form-control" required>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend"><span class="input-group-text">No. Telp Anda</span></div>
                                                                <input type="text" name="phone" class="form-control" required>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend"><span class="input-group-text">SIUP Perusahaan</span></div>
                                                                <input type="text" name="siup" class="form-control" required>
                                                            </div>
                                                        </div>
                                                     <div class="modal-footer">
                                                        <input type="submit" class="btn btn-primary btn" name="full_data" value="LENGKAPI DATA">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                     </div>
                                                     </form>
                                                 </div>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-security" role="tabpanel" aria-labelledby="v-pills-security-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-sm-3">
                                                <?php
                                                    if($company->getters($company_id,"profile_picture")==NULL){
                                                ?>
                                                        <img src="../assets/img/testimonials/4.jpg" width="100%;">
                                                <?php
                                                    }else{
                                                ?>
                                                        <img src="../company/profile_picture/<?php echo $company->getters($company_id,"profile_picture");?>" width="100%;">
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                            <div class="col-sm-9">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <h4><?php echo $company_name; ?></h4>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table style="font-size:12px;">
                                                    <tr>
                                                        <td><i class='fas fas fa-phone'></i> &nbsp; <?php echo $phone; ?>&nbsp;|&nbsp;</td>
                                                        <td><i class='fas fa-envelope'></i> &nbsp; <?php echo $email; ?>&nbsp;|&nbsp;</td>
                                                        <td><i class='fas fa-map-marker-alt'></i> &nbsp;<?php echo $address; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-hover">
                                            <tr><th>ID Perusahaan</th><td><?php echo $company_id; ?></td></tr>
                                            <tr><th>Email</th><td><?php echo $email; ?></td></tr>
                                            <tr><th>Telepon</th><td><?php echo $phone; ?></td></tr>
                                        </table>
                                    </div>
                                    <div class="card-footer text-right">
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#changePass">Ganti Password</a>
                                        <!--modal for change password-->
                                        <div class="modal fade" id="changePass">
                                             <div class="modal-dialog">
                                                 <div class="modal-content">
                                                     <form method="post">
                                                         <div class="modal-header">
                                                             <h4 class="modal-title">Change Password</h4>
                                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                         </div>
                                                         <div class="modal-body">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend"><span class="input-group-text">Masukkan Password Lama</span></div>
                                                                <input type="password" name="old_password" class="form-control">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend"><span class="input-group-text">Masukkan Password Baru</span></div>
                                                                <input type="password" name="new_password" class="form-control">
                                                            </div>
                                                        </div>
                                                     <div class="modal-footer">
                                                        <input type="submit" class="btn btn-primary btn" name="change-password" value="Ganti Password">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                     </div>
                                                     </form>
                                                     <?php
                                                        if(isset($_POST['change-password'])){
                                                            $old_password = mysqli_real_escape_string($koneksi,$_POST['old_password']);
                                                            $new_password = password_hash(mysqli_real_escape_string($koneksi,$_POST['new_password']),PASSWORD_DEFAULT);
                                                            if (password_verify($old_password, $company->getters($company_id,"password"))){
                                                                $change = $company->changePasswordC($company_id,$new_password);
                                                                if ($change == 1){echo "<script>alert('Selamat! Password anda telah berubah!');location = 'myprofilecom.php'; </script>";}
                                                                else{echo "<script>alert('Error!Silakan coba lagi!');location = 'myprofilecom.php';</script>";}
                                                            }
                                                            else{echo "<script>alert('Password Lama Salah!');location = 'myprofilecom.php';</script>";}
                                                        }
                                                     ?>
                                                 </div>
                                             </div>
                                        </div>
                                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#changeEmail">>Ganti Email</a>
                                        <!--modal for change email-->
                                        <div class="modal fade" id="changeEmail">
                                             <div class="modal-dialog">
                                                 <div class="modal-content">
                                                     <form method="post">
                                                         <div class="modal-header">
                                                             <h4 class="modal-title">Change Email</h4>
                                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                         </div>
                                                         <div class="modal-body">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend"><span class="input-group-text">Masukkan Email Baru</span></div>
                                                                <input type="email" name="email" class="form-control">
                                                            </div>
                                                        </div>
                                                     <div class="modal-footer">
                                                        <input type="submit" class="btn btn-primary btn" name="change-email" value="Ganti Email">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                     </div>
                                                     </form>
                                                     <?php
                                                        if(isset($_POST['change-password'])){
                                                            $old_password = mysqli_real_escape_string($koneksi,$_POST['old_password']);
                                                            $new_password = password_hash(mysqli_real_escape_string($koneksi,$_POST['new_password']),PASSWORD_DEFAULT);
                                                            if (password_verify($old_password, $company->getters($company_id,"password"))){
                                                                $change = $company->changePasswordC($company_id,$new_password);
                                                                if ($change == 1){echo "<script>alert('Selamat! Password anda telah berubah!');location = 'myprofilecom.php'; </script>";}
                                                                else{echo "<script>alert('Error!Silakan coba lagi!');location = 'myprofilecom.php';</script>";}
                                                            }
                                                            else{echo "<script>alert('Password Lama Salah!');location = 'myprofilecom.php';</script>";}
                                                        }elseif(isset($_POST['change-email'])){
                                                            $email= $_POST['email'];
                                                            $old_email = $company->getters($student_id,"email");
                                                            $token=hash('sha256', md5(date('Y-m-d')));
                                                            $aktif=0;
                                                            $email_change = $company->changeEmail($company_id,$email,$token,$aktif,$old_email);
                                                            if ($email_change==1){
                                                                include("regisMail.php");echo "<script>alert('Email Telah berubah, Anda Akan Log out dan Harus Verifikasi Ulang Email!');location = 'logout.php';</script>";
                                                            }elseif($email_change==3){
                                                                echo "<script>alert('Email Tidak Boleh Sama!');location = 'myprofile.php';</script>";
                                                            }else{echo "<script>alert('Error!Silakan coba lagi!');location = 'myprofile.php';</script>";}
                                                        }
                                                     ?>
                                                 </div>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-hover">
                                            <tr><th>ID Perusahaan</th><td><?php echo $company_id; ?></td></tr>
                                            <tr><th>Nama Perusahaan</th><td><?php echo $company_name; ?></td></tr>
                                            <tr><th>SIUP</th><td><?php echo $siup; ?></td></tr>
                                            <tr><th>Alamat</th><td><?php echo $address; ?></td></tr>
                                            <tr><th>Telepon</th><td><?php echo $phone; ?></td></tr>
                                        </table>
                                    </div>
                                    <div class="card-footer text-right">
                                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#editCompany">Edit Info Perusahaan</a>
                                        <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#reqChangeNumber">Ajukan Perubahan SIUP</a>
                                        <!-- modal for edit profile company-->
                                        <div class="modal fade" id="editCompany">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="post" enctype="multipart/form-data">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Company</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">ID Perusahaan</span>
                                                                </div>
                                                                <input type="text" name="company_id" class="form-control" value="<?php echo $company_id; ?>" readonly>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">SIUP</span>
                                                                </div>
                                                                <input type="text" name="siup" class="form-control" value="<?php echo $siup; ?>" readonly>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Username</span>
                                                                </div>
                                                                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Nama Perusahaan</span>
                                                                </div>
                                                                <input type="text" name="company_name" class="form-control" value="<?php echo $company_name; ?>">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Alamat</span>
                                                                </div>
                                                                <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" required>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Telepon</span>
                                                                </div>
                                                                <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>" required>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <label>Ganti Profil Gambar :</label>
                                                                <input type="file" name="profile_picture" value="<?php echo $company->getters($company_id,"profile_picture");?>" required>
                                                                <p style="color: red;font-size:10px;">
                                                                    <i>
                                                                        Ekstensi yang diperbolehkan .png | .jpg | .jpeg | <br>
                                                                        Maksimal Ukuran File 1 MB!
                                                                    </i>
                                                                 </p>
                                                            </div>
                                                            <p class="text-left">
                                                                <i>*untuk pengubahan SIUP, harap melakukan pengajuan melalui tombol "Ajukan Perubahan SIUP" atau langsung chat admin</i><br>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="submit" name="editprofilec" value="Update Data!" class="btn btn-primary">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="reqChangeNumber">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="post">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Form Perubahan SIUP Perusahaan</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Judul Form</span>
                                                                </div>
                                                                <input type="text" name="req_title" class="form-control" value="Form Perubahan SIUP Perusahaan <?php echo $company_id; ?>" readonly>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Alasan Pengajuan</span>
                                                                </div>
                                                                <textarea class="form-control" name="req_detail" rows="4"></textarea>
                                                            </div>
                                                         <div class="input-group mb-3">
                                                            <label>Upload Surat Pernyataan :</label>
                                                            <input type="file" name="formal_letter" value="Pilih Berkas" required>
                                                            <p style="color: red;font-size:10px;">
                                                                <i>
                                                                    Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf <br>
                                                                    Maksimal Ukuran File 1 MB!
                                                                </i>
                                                             </p>
                                                        </div>
                                                        </div>
                                                        <input type="hidden" class="btn btn-primary btn" name="status" value="0">
                                                        <div class="modal-footer">
                                                            <input type="submit" class="btn btn-primary btn" name="reqChange" value="Ajukan Perubahan">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                    <?php
                                                    if (isset($_POST['reqChange'])) {
                                                        $req_title = $_POST['req_title'];
                                                        $req_detail = $_POST['req_detail'];
                                                        $status = $_POST['status'];
                                                        //upload operaton, courtesy by malasngoding.com
                                                        $rand = rand();
                                                        $ekstensi =  array('png','jpg','jpeg','pdf');
                                                        $filename = $_FILES['formal_letter']['name'];
                                                        $ukuran = $_FILES['formal_letter']['size'];
                                                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                                                        if(!in_array($ext,$ekstensi) ) {
                                                            echo "<script>alert('Ekstensi file salah!');location = 'dashboard.php';</script>";
                                                        }else{
                                                            if($ukuran < 1044070){		
                                                                $xx = $rand.'_'.$filename;
                                                                move_uploaded_file($_FILES['formal_letter']['tmp_name'], 'request/'.$rand.'_'.$filename);
                                                                $reqSubmit = $company->CreateRequest($req_title,$req_detail,$status,$xx);
                                                                if ($reqSubmit == 1) {
                                                                    echo "<script>alert('Permintaan Pembatalan Sudah terkirim! Admin kami akan memproses!');location = 'dashboardcom.php';</script>";
                                                                } else {
                                                                    echo "<script>alert('Error! Coba Lagi');location = 'dashboardcom.php';</script>";
                                                                }
                                                            }else{
                                                                echo "<script>alert('Ukuran file terlalu besar');location = 'dashboardcom.php';</script>";
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('../footer.php'); ?>
    </body>
    <?php
    if (isset($_POST['editprofilec'])) {
        $company_id = $_POST['company_id'];
        $company_name = $_POST['company_name'];
        $username = $_POST['username'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        //upload operaton, courtesy by malasngoding.com
        $rand = rand();
        $ekstensi =  array('png','jpg','jpeg');
        $filename = $_FILES['profile_picture']['name'];
        $ukuran = $_FILES['profile_picture']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!in_array($ext,$ekstensi) ) {
            echo "<script>alert('Ekstensi file salah!');location = 'dashboardcom.php';</script>";
        }else{
            if($ukuran < 1044070){		
                $xx = $rand.'_'.$filename;
                move_uploaded_file($_FILES['profile_picture']['tmp_name'], 'profile_picture/'.$rand.'_'.$filename);
//                $edit = $student->editProfile($student_id,$username,$fullname,$institution_name,$course,$address,$phone,$xx);
                $editc = $company->editProfileC($company_id,$username,$company_name,$address,$phone,$xx);
                if ($editc == 1) {echo "<script>alert('Selamat! Data anda telah berubah!');location = 'myprofilecom.php';</script>";} 
                elseif ($editc == 2) {echo "<script>alert('Format Nomor Telepon Salah!');location = 'myprofilecom.php';</script>";} 
                else {echo "<script>alert('Error!Silakan coba lagi!');location = 'myprofilecom.php';</script>";}
            }else{
                echo "<script>alert('Ukuran file terlalu besar');location = 'dashboardcom.php';</script>";
            }
        }
    }elseif(isset($_POST['full_data'])){
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $siup = $_POST['siup'];
            $full = $company->register_company_second($company_id,$siup,$address,$phone);
            if ($full==1){echo "<script>alert('Selamat! Data anda sudah lengkap');location = 'myprofilecom.php';</script>";}
            elseif ($full==2){echo "<script>alert('Format Nomor Telepon Salah!');location = 'myprofilecom.php';</script>";}
            else{echo "<script>alert('Error!Silakan coba lagi!');location = 'myprofilecom.php';</script>";}
        }
    ?>
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/fontawesome/js/all.min.js"></script>
</html>