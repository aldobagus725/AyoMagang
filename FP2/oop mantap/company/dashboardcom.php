<?php
    if(!isset($_SESSION)) {session_start();}
    if (empty($_SESSION)) {
        echo "<script>alert('Silahkan login terlebih dahulu!');</script>";
        echo "<script>location='login.php';</script>";
    } elseif (!isset($_SESSION['company'])) {
        echo "<script>alert('403 Forbidden');</script>";
        echo "<script>location='login.php';</script>";
        die;
    }
    require '../classes/company.php';
    require '../classes/vacancies.php';
    require '../classes/application.php';
    //class initialization
    $company = new company();
    $vacancy = new vacancies();
    $application = new application();
    // variable helper
    $id_company = $_SESSION['company']['company_id'];
    //another variables
    $company_name = $company->getters($id_company,'company_name');
    $username = $company->getters($id_company,'username');
?>

<html>
    <head>
        <title><?php echo $username; ?></title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/ayomagang.css">
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
        <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            #company-home:before{
                background-image: url(../assets/img/backgrounds/1@2x.jpg);
                content: "";position: absolute;left: 0;right: 0;
                z-index: -1;display: block;
                filter: brightness(60%); background-repeat: no-repeat;
                background-size:cover;width: 100%;height: 70%;
            }
            #company-vacancy{background-color:#f8f8f8;}
            #company-application{background-color:white;}
        </style>
    </head>
    <body>
        <?php include ('../header.php'); ?>
        <div class="container-fluid" id="company-home">
            <div class="container" style="padding-bottom:50px;">
                <div class="row align-items-center text-center" style="padding-top:40px;">
                    <div class="col" style="padding-top:100px;">
                        <h1 style="color:white;">Hello <?php echo $company_name;?> !</h1>
                        <br>
                        <?php
                            $query = $company->viewInternshipList($id_company);
                            if(mysqli_num_rows($query)>0){
                        ?>
                        <p style="font-size:24px; color:white;">Siap udah ada bukaan nih! Mau buka lagi juga bisa!</p>
                        <br>
                        <a href="open_vacancy.php" class="btn btn-success" type="submit" style="font-size:20px;font-weight:bold;">Buka KP / PKL</a>
                        <?php
                            }else{
                        ?>
                        <p style="font-size:24px; color:white;">
                            Sepertinya Belum ada Bukaan ya?<br>
                            Silakan dibuka!
                        </p>
                        <br>
                        <a href="open-vacancy.php" class="btn btn-success" type="submit" style="font-size:20px;font-weight:bold;">Buka KP / PKL</a>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
<!--        VACANCY-->
        <div class="container-fluid" id="company-vacancy">
            <div class="container">
                <div class="row align-items-center text-center" style="padding-top:40px;">
                    <div class="col"><h1>List Bukaan Perusahaan</h1><hr></div>
                </div>
                <div class="row align-items-center text-left justify-content-end" style="padding-top:40px;padding-bottom:40px;">
                    <div class="col-sm-7 ">
                    <?php
                        $query = $company->viewInternshipList($id_company);
                        if(mysqli_num_rows($query)>0){
                            while($data = mysqli_fetch_array($query)){
                     ?>
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3><?php echo $data["vacancy_title"];?></h3>
                                        <h5><?php echo $data["company_name"];?></h5>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <img src="../assets/img/logo/logo_hitam_pas.png" width="75%;">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table>
                                    <tr>
                                        <td><i class='fas fa-map-marker-alt'></i> &nbsp;</td>
                                        <td><?php echo $data["company_address"];?></td>
                                    </tr>
                                    <tr>
                                        <td><i class='fas fa-user-alt'></i> &nbsp;</td>
                                        <td><?php echo $data["company_speciality"];?></td>
                                    </tr>
                                </table> 
                            </div>
                            <div class="card-footer">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <a href="appdetail.php?&id=<?php echo $data['vacancies_id']; ?>" class="btn btn-primary btn-sm">Kunjungi</a>
                                        <a href="edit_vacancy.php?id=<?php echo $data['vacancies_id'];?>" class="btn btn-success btn-sm">Edit Bukaan</a>
                                        <a href="delete_vacancy.php?id=<?php echo $data['vacancies_id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus Bukaan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <?php }}
                        else{?>
                            <div class="alert alert-primary">
                                No Vacancy Exist!
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
<!--        APPLICATION-->
        <div class="container-fluid" id="company-application">
            <div class="container">
                <div class="row align-items-center text-center" style="padding-top:40px;">
                    <div class="col"><h1>List Pengajuan KP / PKL</h1><hr></div>
                </div>
                <div class="row align-items-center text-left" style="padding-top:40px;padding-bottom:40px;">
                    <div class="col-sm-7">
                    <?php
                        $query = $company->viewApplication($id_company);
                        if(mysqli_num_rows($query)>0){
                            while($data = mysqli_fetch_array($query)){
                     ?>
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h3><?php echo $data["vacancy_title"];?></h3>
                                        <h5><?php echo $data["company_name"];?></h5>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <img src="../assets/img/logo/logo_hitam_pas.png" width="75%;">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table>
                                    <tr>
                                        <td><i class='fas fa-user-alt'></i> &nbsp;</td>
                                        <td><?php echo $data["student_name"];?></td>
                                    </tr>
                                    <tr>
                                        <td><i class='fas fa-map-marker-alt'></i> &nbsp;</td>
                                        <td><?php echo $data["student_address"];?></td>
                                    </tr>

                                </table> 
                            </div>
                            <div class="card-footer">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <a href="appdetail.php?&id=<?php echo $data['vacancies_id']; ?>" class="btn btn-primary btn-sm">Kunjungi</a>
                                        <a href="edit_vacancy.php&id=<?php echo $data['vacancies_id'];?>" class="btn btn-success btn-sm">Edit Bukaan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }}
                        else{?>
                            <div class="alert alert-primary">
                                No Applicant has entered application yet!
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
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/fontawesome/js/all.js"></script>
</html>