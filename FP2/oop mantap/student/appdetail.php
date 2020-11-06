<?php
    include"../koneksi.php";
    if(!isset($_SESSION)){session_start();} 
    if (empty($_SESSION)){
        echo "<script>alert('Silahkan login terlebih dahulu!');</script>";
        echo "<script>location='login.php';</script>";
    } elseif (!isset($_SESSION['student'])) {
        echo "<script>alert('403 Forbidden');</script>";
        echo "<script>location='login.php';</script>";
        die;
    }
    require '../classes/vacancies.php';
    require '../classes/company.php';
    $vacancy = new vacancies();
    $company = new company();
    $vacancy_id = $_GET['id'];
    $student_id = $_SESSION['student']['student_id'];
    //variable initialiation
    $title = $vacancy->getters($vacancy_id,'vacancy_title');
    $company_name = $vacancy->getters($vacancy_id,'company_name');
    $company_address = $vacancy->getters($vacancy_id,'company_address');
    $company_id = $vacancy->getters($vacancy_id,'company_id');
    $company_speciality = $vacancy->getters($vacancy_id,'company_speciality');
    $intern_policies = $vacancy->getters($vacancy_id,'intern_policies');
    $phone = $vacancy->getters($vacancy_id,'phone');
    $author = $vacancy->getters($vacancy_id,'author');
    $siup = $company->getters($company_id,'siup');
    
?>
<html>
    <head>
        <title>Rincian</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/ayomagang.css">
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
        <link rel="stylesheet" href="../assets/css/animate.css">
        <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            #job-title{background-color: #f8f8f8;width: 100%;}
            #vacancy-detail{background-color: white;width: 100%;}
        </style>
    </head>
    <body>
        <?php include ('local_navbar.php'); ?>
        <div class="container-fluid" id="job-title">
            <div class="container">
                <div class="row align-items-center" style="padding-top:10px;padding-bottom:20px;">
                    <div class="col-sm-9 text-left">
                        <img src="../assets/img/logo/logo_hitam_pas.png" width="30%;"><br>
                        <h4><?php echo $title;?></h4>
                        <h5><?php echo $company_name;?></h5>
                        <table>
                            <tr>
                                <td><i class='fas fa-map-marker-alt'></i> &nbsp;</td>
                                <td><?php echo $company_address;?></td>
                            </tr>
                        </table> 
                    </div>
                    <div class="col-sm-3 text-right">
                        <?php
                            $check = mysqli_query($koneksi,"select * from application where student_id = '$student_id' AND vacancies_id = '$vacancy_id'");
                            $checkRow = mysqli_num_rows($check);
                            if ($checkRow > 0) {
                            ?>
                        <h3>Kamu sudah Melakukan Pengajuan disini!</h3>
                        <?php
                            } else {
                        ?>
                         <a href="apply.php?&id=<?php echo $vacancy_id; ?>" class="btn btn-primary btn-block ">Ajukan KP/PKL</a><br>
                            <a href="#" class="btn btn-danger btn-block">Laporkan Bukaan Ini</a><br>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="vacancy-detail">
            <div class="container">
                <div class="row align-items-center justfiy-content-start" style="padding-top:30px;padding-bottom:40px;">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4>Deskripsi Bukaan</h4>
                            </div>
                            <div class="card-body">
                                <table>
                                    <tr>
                                        <td><i class='fas fa-clipboard-list'></i> ID Lowongan &nbsp;</td>
                                        <td> : <?php echo $vacancy_id;?></td>
                                    </tr>
                                    <tr>
                                        <td><i class='fas fa-clipboard-list'></i> ID Perusahaan &nbsp;</td>
                                        <td> : <?php echo $company_id;?></td>
                                    </tr>
                                </table>
                                <br>
                                
                                <table>
                                    <tr>
                                        <td><i class='fas fa-map-marker-alt'></i> &nbsp;</td>
                                        <td><?php echo $company_address;?></td>
                                    </tr>
                                    <tr>
                                        <td><i class='fas fa-user-alt'></i> &nbsp;</td>
                                        <td><?php echo $company_speciality;?></td>
                                    </tr>
                                    <tr>
                                        <td><i class='fas fas fa-clipboard-check'></i> &nbsp;</td>
                                        <td><?php echo $intern_policies;?></td>
                                    </tr>
                                    <tr>
                                        <td><i class='fas fas fa-phone'></i> &nbsp;</td>
                                        <td><?php echo $phone;?></td>
                                    </tr>
                                    <tr>
                                        <td>SIUP &nbsp;</td>
                                        <td><?php echo $siup;?></td>
                                    </tr>
                                </table> 
                            </div>
                            <div class="card-footer">
                                <div class="row align-items-center text-right">
                                    <div class="col">
                                        <h5>Author: <?php echo $author;?></h5>
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
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/fontawesome/js/all.min.js"></script>
</html>