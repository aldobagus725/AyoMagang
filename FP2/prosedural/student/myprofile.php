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
        <title>Profile</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/ayomagang.css">
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
        <link rel="stylesheet" href="../assets/css/animate.css">
        <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            #bar{
                background-color: rgb(0, 133, 216);
                width: 100%;
            }
        </style>
    </head>
    <body>
        <?php include ('local_navbar.php'); ?>
        <div class="container-fluid" id="student-application">
            <div class="container">
                <div class="row align-items-center text-center" style="padding-top:40px;">
                    <div class="col">
                        <h2>Profil Anda</h2>
                        <hr>
                    </div>
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
                                                <img src="../assets/img/testimonials/1.jpg" width="100%;">
                                            </div>
                                            <div class="col-sm-9">
                                                <table>
                                                    <tr>
                                                        <td><h4><?php echo $_SESSION['student']['fullname']; ?></h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h6><?php echo $_SESSION['student']['course']; ?></h6></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h6><?php echo $_SESSION['student']['institution_name']; ?></h6></td>
                                                    </tr>
                                                </table>
                                                <table>
                                                    <tr>
                                                        <td><i class='fas fas fa-phone'></i> &nbsp; <?php echo $_SESSION['student']['phone']; ?>&nbsp;|&nbsp;</td>
                                                        <td><i class='fas fa-envelope'></i> &nbsp; <?php echo $_SESSION['student']['email']; ?>&nbsp;|&nbsp;</td>
                                                        <td><i class='fas fa-map-marker-alt'></i> &nbsp;<?php echo $_SESSION['student']['address']; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>ID Kamu</th><td><?php echo $_SESSION['student']['student_id']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Fullname</th><td><?php echo $_SESSION['student']['fullname']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>NIS/NIM</th><td><?php echo $_SESSION['student']['student_number']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Nama Institusi</th><td><?php echo $_SESSION['student']['institution_name']; ?></td>
                                            </tr>
                                             <tr>
                                                <th>Jurusan</th><td><?php echo $_SESSION['student']['course']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th><td><?php echo $_SESSION['student']['address']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Email</th><td><?php echo $_SESSION['student']['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Telepon</th><td><?php echo $_SESSION['student']['phone']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-security" role="tabpanel" aria-labelledby="v-pills-security-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-sm-3">
                                                <img src="../assets/img/testimonials/1.jpg" width="100%;">
                                            </div>
                                            <div class="col-sm-9">
                                                <table>
                                                    <tr>
                                                        <td><h4><?php echo $_SESSION['student']['fullname']; ?></h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h6><?php echo $_SESSION['student']['course']; ?></h6></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h6><?php echo $_SESSION['student']['institution_name']; ?></h6></td>
                                                    </tr>
                                                </table>
                                                <table>
                                                    <tr>
                                                        <td><i class='fas fas fa-phone'></i> &nbsp; <?php echo $_SESSION['student']['phone']; ?>&nbsp;|&nbsp;</td>
                                                        <td><i class='fas fa-envelope'></i> &nbsp; <?php echo $_SESSION['student']['email']; ?>&nbsp;|&nbsp;</td>
                                                        <td><i class='fas fa-map-marker-alt'></i> &nbsp;<?php echo $_SESSION['student']['address']; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>ID Kamu</th><td><?php echo $_SESSION['student']['student_id']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Email</th><td><?php echo $_SESSION['student']['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Telepon</th><td><?php echo $_SESSION['student']['phone']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="card-footer text-right">
                                        <a href="#" class="btn btn-primary">Ganti Password</a>
                                        <a href="#" class="btn btn-info">Ganti Email</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>ID Kamu</th><td><?php echo $_SESSION['student']['student_id']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Fullname</th><td><?php echo $_SESSION['student']['fullname']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>NIS/NIM</th><td><?php echo $_SESSION['student']['student_number']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Nama Institusi</th><td><?php echo $_SESSION['student']['institution_name']; ?></td>
                                            </tr>
                                             <tr>
                                                <th>Jurusan</th><td><?php echo $_SESSION['student']['course']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th><td><?php echo $_SESSION['student']['address']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Telepon</th><td><?php echo $_SESSION['student']['phone']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="card-footer text-right">
                                        <a href="#" class="btn btn-success">Edit Info</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                       
                    </div>
                </div>
            </div>
        </div>
        <?php include ('../footer.php'); ?>
    </body>
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/fontawesome/js/all.js"></script>
</html>