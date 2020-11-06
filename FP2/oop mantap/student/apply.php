<?php
    if(!isset($_SESSION)){session_start();}
    if (empty($_SESSION)){
        echo "<script>alert('Silahkan login terlebih dahulu!');</script>";
        echo "<script>location='login.php';</script>";
    } elseif (!isset($_SESSION['student'])) {
        echo "<script>alert('403 Forbidden');</script>";
        echo "<script>location='login.php';</script>";
        die;
    }
// class initialization
    require '../classes/student.php';
    require '../classes/company.php';
    require '../classes/vacancies.php';
    
    $student = new student();
    $vacancy = new vacancies();
    $company = new company();
// variable helper
    $student_id_helper = $_SESSION['student']['student_id'];
    $vacancy_id = $_GET['id'];
    $company_id = $vacancy->getters($vacancy_id,"company_id");
// ANOTHER VARIABLES
    $company_name = $vacancy->getters($vacancy_id,"company_name");
    $vacancy_title = $vacancy->getters($vacancy_id,"vacancy_title");
    $company_address = $vacancy->getters($vacancy_id,"company_address");
    $company_email = $company->getters($company_id,"email");
    $student_name = $student->getters($student_id_helper,"fullname");
    $student_address = $student->getters($student_id_helper,"address");
    $status = 1;
// UHUY
?>
<html>
    <head>
        <title>Pengajuan KP/MAGANG</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/ayomagang.css">
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
        <link rel="stylesheet" href="../assets/css/animate.css">
        <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            #job_summary{background-color: #f8f8f8;width: 100%;}
            #apply_form{background-color: white;width: 100%;}
        </style>
    </head>
    <body>
        <?php include ('local_navbar.php'); ?>
        <div class="container-fluid" id="job_summary">
            <div class="container">
                <div class="row align-items-center" style="padding-top:10px;padding-bottom:20px;">
                    <div class="col-sm-9 text-left">
                        <img src="../assets/img/logo/logo_hitam_pas.png" width="30%;"><br>
                        <h4><?php echo $vacancy_title;?></h4>
                        <h5><?php echo $company_name;?></h5>
                        <table>
                            <tr>
                                <td><i class='fas fa-map-marker-alt'></i> &nbsp;</td>
                                <td><?php echo $company_address;?></td>
                            </tr>
                        </table> 
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="apply_form">
            <div class="container">
                <div class="row align-items-center justfiy-content-start" style="padding-top:30px;padding-bottom:40px;">
                    <div class="col">
                        <form method="post" action="#">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Pengajuan</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" name="student_id" value="<?php echo $student_id_helper; ?>" hidden>
                                        <input type="text" name="company_id" value="<?php echo $company_id; ?>" hidden>
                                        <input type="text" name="company_name" value="<?php echo $company_name; ?>" hidden>
                                        <input type="text" name="vacancies_id" value="<?php echo $vacancy_id; ?>" hidden>
                                        <input type="text" name="company_address" value="<?php echo $company_address; ?>" hidden>
                                        <input type="text" name="company_email" value="<?php echo $company_email; ?>" hidden>
                                        <input type="text" name="status" value="<?php echo $status ?>" hidden>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Vacancy Title</span>
                                            </div>
                                            <input type="text" name="vacancy_title" class="form-control" value="<?php echo $vacancy_title; ?>" readonly>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Student Name</span>
                                            </div>
                                            <input type="text" name="student_name" class="form-control" value="<?php echo $student_name; ?>" readonly>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Student Address</span>
                                            </div>
                                            <input type="text" name="student_address" class="form-control" value="<?php echo $student_address; ?>" readonly>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload Dokumen Penting disini</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group mb-3">
                                            <div class="card">
                                                <div class="card-body text-justify">
                                                    Sebelum melakukan pengajuan, cek lagi ajuan magang kamu, serta data diri kamu, kalau kamu belum yakin,
                                                    bisa <a href="myprofile.php">diubah dulu kok.</a><br><br>
                                                    Cek lagi persyaratan magang serta persiapkan dokumen yang penting (Surat Keterangan dari sekolah / kampus, dll.) supaya pengajuan bisa berjalan lancar.
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row align-items-center text-right">
                                    <div class="col">
                                        <input type="submit" name="apply-internship" value="Ajukan" class="btn btn-primary btn-sm">
                                        <a href="appdetail.php?&id=<?php echo $vacancy_id; ?>" class="btn btn-success btn-sm">Kembali ke Detail Magang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include ('../footer.php'); ?>
    </body>
        <?php
        if(isset($_POST['apply-internship'])){
            $student_id = $_POST['student_id'];
            $company_id = $_POST['company_id'];
            $vacancies_id= $_POST['vacancies_id'];
            $company_name= $_POST['company_name'];
            $company_address = $_POST['company_address'];
            $company_email = $_POST['company_email'];
            $student_name = $_POST['student_name'];
            $student_address = $_POST['student_address'];
            $company_email = $_POST['company_email'];
            $status = $_POST['status'];
            $apply = $student->ApplyInternship($student_id,$company_id,$vacancies_id,$company_name,$vacancy_title,$company_address,$company_email,$student_name,$student_address,$status);
            if ($apply == 01) {echo "<script>alert('Selamat Pengajuan Berhasil!');location = 'dashboard.php';</script>";} 
            elseif ($apply == 3) {echo "<script>alert('Error! -> Pengajuan ini sudah ada!');location = 'dashboard.php';</script>";} 
        }
    ?>
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/fontawesome/js/all.min.js"></script>
</html>