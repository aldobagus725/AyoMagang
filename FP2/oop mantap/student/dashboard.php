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
    require '../classes/student.php';
    $student = new student();
    $id_student = $_SESSION['student']['student_id'];
?>
<html>
    <head>
        <title><?php echo $student->getters($id_student,"fullname");?></title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/ayomagang.css">
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
        <link rel="stylesheet" href="../assets/css/animate.css">
        <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            #student-home:before{
                background-image: url(../assets/img/backgrounds/student1.jpg);
                content: "";
                position: absolute;
                left: 0;
                right: 0;
                z-index: -1;
                display: block;
                filter: brightness(60%);
                background-repeat: no-repeat;
                background-size:cover;
                width: 100%;
                height: 75%;
            }
            #student-application{background-color:white;}
        </style>
    </head>
    <body>
        <?php include ('../header.php'); ?>
        <div class="container-fluid" id="student-home">
            <div class="container" style="padding-bottom:50px;">
                <div class="row align-items-center text-center" style="padding-top:40px;">
                    <div class="col" style="padding-top:100px;">
                        <h1 style="color:white;">Hello <?php echo $student->getters($id_student,"fullname"); ?> !</h1>
                        <br>
                        <?php
                        $query = $student->viewApplication($id_student);
                        if(mysqli_num_rows($query)>0){
                        ?>
                        <p style="font-size:24px; color:white;">
                            Sepertinya Kamu Sudah Pengajuan ya? Semangat!<br>
                            Kalau mau cari lagi, boleh aja kok!
                        </p>
                        <br>
                        <input class="form-control mr-sm-2" type="text" placeholder="Nama Jurusan, Bidang Studi, Jenis Pekerjaan, contoh : Sistem Informasi">
                        <br/>
                        <a href="applist.php" class="btn btn-success" type="submit" style="font-size:20px;font-weight:bold;">Cari Lagi</a>
                        <?php
                        }else{
                        ?>
                        <p style="font-size:24px; color:white;">Yuk Langsung Cari Magang Akademikmu!</p>
                        <br>
                        <input class="form-control mr-sm-2" type="text" placeholder="Nama Jurusan, Bidang Studi, Jenis Pekerjaan, contoh : Sistem Informasi">
                        <br/>
                        <a href="applist.php" class="btn btn-success" type="submit" style="font-size:20px;font-weight:bold;">Cari</a>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="student-application">
            <div class="container">
                <div class="row align-items-center text-center" style="padding-top:40px;">
                    <div class="col">
                        <h1>Aplikasi Kamu</h1>
                        <hr>
                    </div>
                </div>
                <div class="row align-items-center justify-content-end text-left" style="padding-top:40px;padding-bottom:40px;">
                    <div class="col-sm-9">
                        <?php
                        $query = $query = $student->viewApplication($id_student);
                        if(mysqli_num_rows($query)>0){
                            while($data = mysqli_fetch_array($query)){
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-6 text-left">
                                        <h2><?php echo $data["company_name"];?></h2>
                                        <h4><?php echo $data["vacancy_title"];?></h4>
                                        <h6>ID Aplikasi Kamu: <?php echo $data["application_id"];?></h6>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <img src="../assets/img/logo/logo_hitam_pas.png" width="100%">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>
                                    <?php echo $data["company_address"];?><br>
                                    <?php echo $data["company_email"];?><br><br>
                                </p>
                                <h6>
                                    <?php 
                                        $status = $data["status"];
                                        if ($status ==1){echo "Pengajuan Kamu sudah diterima perusahaan! Tunggu infonya ya!";}
                                        else if ($status==2){echo "Yeay! Perusahaan telah menerima ajuan KP/PKL Mu!";}
                                        else{echo "Pengajuan Kamu ditolak! tunggu info lebih lanjutnya!";}
                                    ;?>
                                </h6>
                            </div>
                            <div class="card-footer text-right">
                                <a href="appdetail.php?&id=<?php echo $data['vacancies_id']; ?>" class="btn btn-primary btn-sm">Kunjungi</a>
                                <a href="#" class="btn btn-danger btn-sm">Batalkan Pengajuan</a>
                            </div>
                        </div>
                        <hr>
                        <?php }}
                        else{?>
                            <div class="alert alert-info">
                                Pengajuan Magang Akademikmu belum ada nih! Yuk <a href="applist.php">Gas Ajukan!</a>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include ('../footer.php'); ?>
    </body>
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/fontawesome/js/all.min.js"></script>
</html>