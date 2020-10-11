<?php 
    session_start(); 
    include'../koneksi.php'; 

    if(!isset($_SESSION['student'])){
        echo "<script>alert('Silahkan login terlebih dahulu!');</script>";
        echo "<script>location='login.php';</script>";
    }
?>

<html>
    <head>
        <title><?php echo $_SESSION['student']['fullname']; ?></title>
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
                filter: brightness(55%);
                background-repeat: no-repeat;
                background-size:cover;
                width: 100%;
                height: 75%;
            }
            #student-application{
                background-color:white;
            }
        </style>
    </head>
    <body>
        <?php include ('../header.php'); ?>
        <div class="container-fluid" id="student-home">
            <div class="container" style="padding-bottom:50px;">
                <div class="row align-items-center text-center" style="padding-top:40px;">
                    <div class="col" style="padding-top:100px;">
                        <h1 style="color:white;">Hello <?php echo $_SESSION['student']['fullname']; ?> !</h1>
                        <br>
                        <?php
                        $id_student = $_SESSION['student']['student_id'];
                        $query = mysqli_query($koneksi,"SELECT * FROM application where student_id = $id_student");
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
                        <h2>Aplikasi Kamu</h2>
                        <hr>
                    </div>
                </div>
                <div class="row align-items-center text-center" style="padding-top:40px;padding-bottom:40px;">
                    <div class="col">
                        <?php
                        $id_student = $_SESSION['student']['student_id'];
                        $query = mysqli_query($koneksi,"SELECT * FROM application where student_id = $id_student");
                        if(mysqli_num_rows($query)>0){
                            while($data = mysqli_fetch_array($query)){
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <h4><?php echo $data["vacancy_title"];?></h4>
                                <h6><?php echo $data["application_id"];?></h6>
                                <h6><?php echo $data["vacancies_id"];?></h6>
                            </div>
                            <div class="card-body">
                                <p>
                                    <?php echo $data["student_id"];?><br>
                                    <?php echo $data["company_id"];?><br>
                                    <?php echo $data["company_name"];?><br>
                                    <?php echo $data["company_address"];?><br>
                                    <?php echo $data["company_email"];?><br>
                                    <?php echo $data["status"];?><br>
                                </p>
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
    <script src="../assets/js/waypoints.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/fontawesome/js/all.js"></script>
</html>