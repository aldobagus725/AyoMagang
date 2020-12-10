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
    include('db_chat.php');
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
        <link type="text/css" href='https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css' rel='stylesheet'>
        <link type="text/css" href='https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css' rel='stylesheet'>
        <link type="text/css" href='https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/Start/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
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
            .chat_message_area{
                position: relative;
                width: 100%;
                height: auto;
                background-color: #FFF;
                border: 1px solid #CCC;
                border-radius: 3px;
            }
            .image_upload{
                position: absolute;
                top:3px;
                right:3px;
            }
            .image_upload > form > input{display: none;}
            .image_upload img{width: 24px;cursor: pointer;}
            .form-rounded {border-radius: 50rem;}
            .btn-rounded {
                color: #fff;
                background-color: #007bff;
                border-radius: 50rem;
            }
            .btn-rounded-success {
                color: #fff;
                background-color: #28a745;
                border-radius: 50rem;
            }
            .btn-rounded-danger {
                color: #fff;
                background-color: #dc3545;
                border-radius: 35rem;
            }
            .btn-rounded-info {
                color: #fff;
                background-color: #17a2b8;
                border-radius: 50rem;
            }
            .btn-rounded-light {
                color: #343a40;
                background-color: #f8f9fa;
                border-radius: 50rem;
            }
            .btn-rounded-dark {
                color: #fff;
                background-color: #343a40;
                border-radius: 50rem;
            }
            .btn-rounded-warning {
                color: #fff;
                background-color: #ffc107;
                border-radius: 50rem;
            }
            .btn-rounded-secondary {
                color: #fff;
                background-color: #868e96;
                border-radius: 50rem;
            }
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
                        <a href="open_vacancy.php" class="btn btn-success" type="submit" style="font-size:20px;font-weight:bold;">Buka KP / PKL</a>
                        <?php }?>
                        <br>
                        <br>
                        <p style="font-size:16px; font-weight:bold; color:white;">Butuh Bantuan? Bisa langsung kontak admin!:</p>
                        <div id="user_details"></div>
                        <div id="user_model_details"></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="display">0</div>
<button class="trigger" id="trigger" onclick="trigger()">SUBMIT</button>
        
<!--        VACANCY-->
        <div class="container-fluid" id="company-vacancy">
            <div class="container">
            <div class="round"><p clas="values"><php echo $totalviews;?></p></div></div>
                <?php 
                    $checker_siup = $company->getters($id_company,"siup");
                    $checker_address = $company->getters($id_company,"address");
                    $checker_phone = $company->getters($id_company,"phone");
                    if ($checker_siup==NULL){
                        echo "
                        <div class='alert alert-primary alert-dismissible fade show' role='alert'>
                            Silakan Lengkapi Data Diri Anda: <strong>SIUP</strong>&nbsp;<a href='myprofilecom.php'><i>Lengkapi Detail</i></a>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        ";
                    }
                    if ($checker_address==NULL){
                        echo "
                        <div class='alert alert-primary alert-dismissible fade show' role='alert'>
                            Silakan Lengkapi Data Diri Anda: <strong>Alamat Anda</strong>&nbsp;<a href='myprofilecom.php'><i>Lengkapi Detail</i></a>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        ";
                    }
                    if ($checker_phone==NULL){
                        echo "
                        <div class='alert alert-primary alert-dismissible fade show' role='alert'>
                            Silakan Lengkapi Data Diri Anda: <strong>Nomor Telepon Anda</strong>&nbsp;<a href='myprofilecom.php'><i>Lengkapi Detail</i></a>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        ";
                    }
                ?>
                <div class="row align-items-center text-center" style="padding-top:40px;">
                    <div class="col"><h1>List Bukaan Perusahaan</h1><hr></div>
                </div>
                <div class="row align-items-center text-left justify-content-end" style="padding-top:40px;padding-bottom:40px;">
                    <div class="col">
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
                                       
                                        <a href="appdetail.php?&id=<?php echo $data['vacancies_id']; ?>" class="btn btn-primary btn-sm" button class="trigger" id="trigger" onclick="trigger()">Kunjungi</a>
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
                    <div class="col">
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
                                        <a href="detailpengajuan.php?&id=<?php echo $data['vacancies_id']; ?>" class="btn btn-primary btn-sm">Lihat Pengajuan</a>
                                       
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
    <script src="../assets/js/chat_scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
</html>