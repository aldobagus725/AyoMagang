<?php    
    session_start(); 
    if (empty($_SESSION)) {
        echo "<script>alert('Silahkan login terlebih dahulu!');</script>";
        echo "<script>location='login.php';</script>";
    } elseif (!isset($_SESSION['student'])) {
        echo "<script>alert('403 Forbidden');</script>";
        echo "<script>location='login.php';</script>";
        die;
    }
    $spesialisasi = array("Perhotelan", "Kelistrikan", "Teknologi", "Kuliner", "Jurnalis", "Akuntansi", "Marketing",);
    sort($spesialisasi);
    require"../classes/student.php";
    $student = new student();
    $student_id = $_SESSION['student']['student_id'];
?>
<html>
    <head>
        <title>Edit Profile</title>
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
            <div class="container">
                <div class="row align-items-center text-center" style="padding-top:40px;">
                    <div class="col">
                        <h3>Edit Profile</h3>
                        <br>
                        <form method="post">
                            <div class="card">
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">ID Kamu (Permanent)</span>
                                        </div>
                                        <input type="text" name="student_id" class="form-control" value="<?php echo $student_id;?>" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">NIS/NIM (Permanent)</span>
                                        </div>
                                        <input type="text" name="student_number" class="form-control" value="<?php echo $student->getters($student_id,'student_number');?>" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Nama Lengkap</span>
                                        </div>
                                        <input type="text" name="fullname" class="form-control" value="<?php echo $student->getters($student_id,'fullname');?>" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Nama Sekolah / Kampus</span>
                                        </div>
                                        <input type="text" name="institution_name" class="form-control" value="<?php echo $student->getters($student_id,'institution_name');?>" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                               Bidang / Jurusan
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
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Alamat</span>
                                        </div>
                                        <input type="text" name="address" class="form-control" value="<?php echo $student->getters($student_id,'address');?>" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Telepon</span>
                                        </div>
                                        <input type="text" name="phone" class="form-control" value="<?php echo $student->getters($student_id,'phone');?>" required>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <input type="submit" class="btn btn-primary btn-sm" name="edit-profile" value="Ganti" onclick= "return confirm('Yakin Ingin Melakukan Perubahan?')">
                                </div>
                            </div>
                        </form>
                        <br>*untuk pengubahan NIS/NIM serta username, silakan hubungi admin!
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php
        if(isset($_POST['edit-profile'])){
            $fullname = $_POST['fullname'];
            $institution_name = $_POST['institution_name'];
            $course = $_POST['course'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];

            $edit = $student->editProfile($student_id,$fullname,$institution_name,$course,$address,$phone);
            if ($edit==1){
                echo "<script>alert('Selamat! Data anda telah berubah!');location = 'myprofile.php';</script>";
            }
            elseif ($edit==2){
                echo "<script>alert('Format Nomor Telepon Salah!');location = 'edit_profile.php';</script>";
            }
            else{
                echo "<script>alert('Error!Silakan coba lagi!');location = 'change_password.php';</script>";
            }
            
        }
    ?>
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/fontawesome/js/all.min.js"></script>
</html>