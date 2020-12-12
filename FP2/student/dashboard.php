<?php 
    if(!isset($_SESSION)){session_start();}
    if (empty($_SESSION)) {
        echo "<script>alert('Silahkan login terlebih dahulu!');</script>";
        echo "<script>location='login.php';</script>";
    } elseif (!isset($_SESSION['student'])) {
        echo "<script>alert('403 Forbidden');</script>";
        echo "<script>location='login.php';</script>";
        die;
    }
    require '../classes/student.php';
    include('db_chat.php');
    $student = new student();
    $id_student = $_SESSION['student']['student_id'];
    $daerah = array("Banda Aceh", "Langsa", "Lhokseumawe", "Badung", "Depok", "Bekasi", "Jakarta", "Makassar", "Kupang", "Gorontalo", "Merauke", "Gianyar", "Tangerang" );
    sort($daerah);
    //	Array berisi data spesialisasi.
    $spesialisasi = array("Perhotelan", "Kelistrikan", "Teknologi", "Kuliner", "Jurnalis", "Akuntansi", "Marketing",);
    sort($spesialisasi);
?>
<html>
    <head>
        <title><?php echo $student->getters($id_student,"fullname");?></title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/ayomagang.css">
        <link type="text/css" href='https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css' rel='stylesheet'>
        <link type="text/css" href='https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css' rel='stylesheet'>
        <link type="text/css" href='https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/Start/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
        <link rel="stylesheet" href="../assets/css/animate.css">
        <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            #student-home:before{
                background-image: url(../assets/img/backgrounds/student1.jpg);
                content: "";position: absolute;
                left: 0;right: 0;
                z-index: -1;display: block;
                filter: brightness(60%);
                background-repeat: no-repeat;background-size:contain;
                width: 100%;height: 60%;
            }
            #student-application{background-color:white;}
            .chat_message_area{
                position: relative;
                width: 100%;height: auto;
                background-color: #FFF;
                border: 1px solid #CCC;border-radius: 3px;
            }
            .image_upload{position: absolute;top:3px;right:3px;}
            .image_upload > form > input{display: none;}
            .image_upload img{width: 24px;cursor: pointer;}
            .form-rounded {border-radius: 50rem;}
            .btn-rounded {color: #fff;background-color: #007bff;border-radius: 50rem;}
            .btn-rounded-success {color: #fff;background-color: #28a745;border-radius: 50rem;}
            .btn-rounded-danger {color: #fff;background-color: #dc3545;border-radius: 35rem;}
            .btn-rounded-info {color: #fff;background-color: #17a2b8;border-radius: 50rem;}
            .btn-rounded-light {color: #343a40;background-color: #f8f9fa;border-radius: 50rem;}
            .btn-rounded-dark {color: #fff;background-color: #343a40;border-radius: 50rem;}
            .btn-rounded-warning {color: #fff;background-color: #ffc107;border-radius: 50rem;}
            .btn-rounded-secondary {color: #fff;background-color: #868e96;border-radius: 50rem;}
            #filter{background-color: rgb(0, 133, 216);width: 100%;}
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
                        <br/>
                        <a href="applist.php" class="btn btn-success" type="submit" style="font-size:20px;font-weight:bold;">Cari Lagi</a>
                        <?php }else{ ?>
                        <p style="font-size:24px; color:white;">Yuk Langsung Cari Magang Akademikmu!</p>
                        <br>
                        <br/>
                        <a href="applist.php" class="btn btn-success" type="submit" style="font-size:18px;font-weight:bold;">Cari</a>
                        <?php }?>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <form method="post">
        </form>
        <div class="container-fluid" id="student-application">
            <div class="container">
                <?php 
                    $checker_stdNumber = $student->getters($id_student,"student_number");
                    $checker_instName = $student->getters($id_student,"institution_name");
                    $checker_course = $student->getters($id_student,"course");
                    $checker_address = $student->getters($id_student,"address");
                    $checker_phone = $student->getters($id_student,"phone");
                    if ($checker_stdNumber==NULL){
                        echo "
                        <div class='alert alert-primary alert-dismissible fade show' role='alert'>
                            Silakan Lengkapi Data Diri Anda: <strong>NIM/NIS!</strong>&nbsp;<a href='myprofile.php'><i>Lengkapi Detail</i></a>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        ";
                    }
                    if ($checker_instName==NULL){
                        echo "
                        <div class='alert alert-primary alert-dismissible fade show' role='alert'>
                            Silakan Lengkapi Data Diri Anda: <strong>Nama Kampus / Institusi</strong>&nbsp;<a href='myprofile.php'><i>Lengkapi Detail</i></a>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        ";
                    }
                    if ($checker_course==NULL){
                        echo "
                        <div class='alert alert-primary alert-dismissible fade show' role='alert'>
                            Silakan Lengkapi Data Diri Anda: <strong>Jurusan / Bidang</strong>&nbsp;<a href='myprofile.php'><i>Lengkapi Detail</i></a>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        ";
                    }
                    if ($checker_address==NULL){
                        echo "
                        <div class='alert alert-primary alert-dismissible fade show' role='alert'>
                            Silakan Lengkapi Data Diri Anda: <strong>Alamat Anda</strong>&nbsp;<a href='myprofile.php'><i>Lengkapi Detail</i></a>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        ";
                    }
                    if ($checker_phone==NULL){
                        echo "
                        <div class='alert alert-primary alert-dismissible fade show' role='alert'>
                            Silakan Lengkapi Data Diri Anda: <strong>Nomor Telepon Anda</strong>&nbsp;<a href='myprofile.php'><i>Lengkapi Detail</i></a>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        ";
                    }
                ?>
                <div class="row align-items-center text-center" style="padding-top:40px;">
                    <div class="col"><h1>Aplikasi Kamu</h1><hr></div>
                </div>
                <div class="row align-items-center justify-content-end text-left" style="padding-top:40px;padding-bottom:40px;">
                    <div class="col">
                        <?php
                        $query = $student->viewApplication($id_student);
                        if(mysqli_num_rows($query)>0){
                            while($data = mysqli_fetch_array($query)){?>
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
                                        else if ($status==3){echo "Pengajuan Kamu ditolak! tunggu info lebih lanjutnya!";}
                                        else if ($status==4){echo "Pengajuan Pembatalan KP sedang diproses";}
                                    ;?>
                                </h6>
                            </div>
                            <div class="card-footer text-right">
                                <a href="appdetail.php?&id=<?php echo $data['vacancies_id']; ?>" class="btn btn-primary btn-sm">Kunjungi</a>
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cancelapp">Batalkan Pengajuan</a>
                                <!--modal for Cancel Application-->
                                <!--Here contains function for upload-->
                                <div class="modal fade" id="cancelapp">
                                     <div class="modal-dialog">
                                         <div class="modal-content">
                                             <form method="post" enctype="multipart/form-data">
                                                 <div class="modal-header">
                                                     <h4 class="modal-title">Form Pembatalan Pengajuan KP</h4>
                                                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                 </div>
                                                 <div class="modal-body">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Judul Form</span>
                                                        </div>
                                                        <input type="text" name="req_title" class="form-control" value="Form Pembatalan Pengajuan KP <?php echo $data["application_id"];?>" readonly>
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
                                                    <input type="submit" class="btn btn-primary btn" name="cancelApp" value="Ajukan Pembatalan">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                             </form>
                                                <?php
                                                    if(isset($_POST['cancelApp'])){
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
                                                                $reqSubmit = $student->CreateRequest($req_title,$req_detail,$status,$xx);
                                                                if ($reqSubmit == 1) {
                                                                    echo "<script>alert('Permintaan Pembatalan Sudah terkirim! Admin kami akan memproses!');location = 'dashboard.php';</script>";
                                                                } else {
                                                                    echo "<script>alert('Error! Coba Lagi');location = 'dashboard.php';</script>";
                                                                }
                                                            }else{
                                                                echo "<script>alert('Ukuran file terlalu besar');location = 'dashboard.php';</script>";
                                                            }
                                                        }
                                                    }
                                                ?>
                                         </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php }}
                        else{?>
                            <div class="alert alert-info text-center">Pengajuan Magang Akademikmu belum ada nih! Yuk <a href="applist.php">Gas Ajukan!</a></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container" style="padding: 20px 0px;">
                <div class="row">
                    <div class="col text-center">
                        <p style="font-size:22px; font-weight:bold; color:black;">Butuh Bantuan? Bisa langsung kontak admin!:</p>
                        <div id="user_details"></div>
                        <div id="user_model_details"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php include ('../footer.php'); ?>
    </body>
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/chat_scripts.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/fontawesome/js/all.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
</html>