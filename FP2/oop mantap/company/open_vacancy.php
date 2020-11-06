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
    require"../classes/company.php";
    $id = $_SESSION['company']['company_id'];
    $company = new company();
//  variable helper 
    $username = $company->getters($id,"username");
    $company_name = $company->getters($id,"company_name");
    $company_address = $company->getters($id,"address");
    $phone = $company->getters($id,"phone");

?>
<html>
    <head>
        <title><?php echo $username; ?></title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/ayomagang.css">
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
        <link rel="stylesheet" href="../assets/css/animate.css">
        <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            #daftar:before{
                background-image: url(../assets/img/blog/3.jpg);
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
                height: 100%;
            }
        </style>
    </head>
    <body>
        <?php include ('local_navbar.php'); ?>
        <div class="container-fluid" id="daftar">
            <div class="container" style="padding-bottom:50px;">
                <div class="row align-items-center text-center" style="padding-top:40px;">
                    <div class="col" style="padding-top:75px;">
                        <h1 style="color:white;">Buka Lamaran</h1>
                    </div>
                </div>
                <form method="post">
                <div class="row align-items-top text-center">
                    <div class="col-sm-6" style="padding-top:60px;">
                        <h3 style="color:white;">Perusahaan</h3>
                        <br>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Nama Perusahaan</span>
                          </div>
                          <input type="text" readonly class="form-control" name="company_name" value="<?php echo $company_name;?>">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">ID Perusahaan</span>
                          </div>
                          <input type="text" readonly class="form-control" name="company_id" value="<?php echo $id; ?>">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Alamat</span>
                          </div>
                            <textarea class="form-control" name="company_address" rows="3" required readonly><?php echo $company_address; ?></textarea>
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Telepon</span>
                          </div>
                            <input type="text" class="form-control" name="phone" required value="<?php echo $phone; ?>" readonly>		
                        </div>  
                    </div>
                    <div class="col-sm-6" style="padding-top:60px;">
                        <h3 style="color:white;">Detail Bukaan</h3>
                        <br>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Judul Bukaan</span>
                          </div>
                          <input type="text" class="form-control" name="vacancy_title" required>
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Author</span>
                          </div>
                          <input type="text" class="form-control" name="author" required>
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Bidang Perusahaan</span>
                          </div>
                          <input type="text" class="form-control" name="company_speciality" required>
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Syarat Magang</span>
                          </div>
                            <textarea class="form-control" name="intern_policies" rows="3" required></textarea>	
                        </div>
                        <div class="input-group mb-3">
                              <input class="btn btn-primary" type="submit" name="submit" value="Publish!">
                        </div>
                    </div>
                </div>
                </form>
                <?php
                if(isset($_POST['submit'])){
                    $company_id = $_POST['company_id'];
                    $company_name = $_POST['company_name'];
                    $author = $_POST['author'];
                    $company_address = $_POST['company_address'];
                    $phone = $_POST['phone'];
                    $company_speciality = $_POST['company_speciality'];
                    $intern_policies = $_POST['intern_policies'];
                    $vacancy_title = $_POST['vacancy_title'];
                    $buka = $company->OpenVacancy($company_id,$company_name,$vacancy_title,$company_address,$company_speciality,$phone,$intern_policies,$author);
                    if ($buka == 0){"<script>alert('Error! Silakan coba lagi');location='open_vacancy.php';</script>";}
                    elseif($buka == 1){echo "<script>alert('Selamat, lowongan berhasil di publish!');location='dashboardcom.php';</script>";}
                }
                ?>
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