<?php
    include'../koneksi.php'; 
    if(!isset($_SESSION)){session_start();}
    if (empty($_SESSION)) {
        echo "<script>alert('Silahkan login terlebih dahulu!');</script>";
        echo "<script>location='login.php';</script>";
    } elseif (!isset($_SESSION['company'])) {
        echo "<script>alert('403 Forbidden');</script>";
        echo "<script>location='login.php';</script>";
        die;
    }
    require '../classes/company.php';
    $company = new company();
    require '../classes/student.php';
    $student = new student();
    $company_id = $_SESSION['company']['company_id'];
    $application_id = $_GET['id'];
	$query = $company->viewApplicationDetail($application_id,$company_id);
	$data  = $query->fetch_assoc();
    $student_id = $data['student_id'];
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
                        <?php
                            if($company->getters($company_id,"profile_picture")==NULL){
                        ?>
                                <img src="../assets/img/logo/logo_hitam_pas.png" width="30%;">
                        <?php
                            }else{
                        ?>
                                <img src="../company/profile_picture/<?php echo $company->getters($company_id,"profile_picture");?>" width="50%%;">
                        <?php
                            }
                        ?>
                        <br>
                        <h4><?php echo $data["vacancy_title"];?></h4>
                        <h5><?php echo $data["company_name"];?></h5>
                        <table>
                            <tr>
                                <td><i class='fas fa-map-marker-alt'></i> &nbsp;</td>
                                <td><?php echo $data["company_address"];?></td>
                            </tr>
                        </table> 
                    </div>
                    <div class="col-sm-3 text-right">
                   
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
                                <h4>Detail Pengajuan</h4>
                            </div>
                            <div class="card-body">
                                <table>
                                    <tr>
                                        <td><i class='fas fa-clipboard-list'></i> Nama Siswa / Mahasiswa KP &nbsp;</td>
                                        <td> : <?php echo $data["student_name"];?></td>
                                    </tr>
                                    <tr>
                                        <td><i class='fas fas fa-map-marker-alt'></i> Alamat Siswa / Mahasiswa Pengajuan &nbsp;</td>
                                        <td> : <?php echo $data["student_address"];?></td>
                                    </tr>
                                    <tr>
                                        <td><i class='fas fa-building'></i> Asal Sekolah / Kampus dari Siswa / Mahasiswa &nbsp;</td>
                                        <td> : <?php echo $student->getters($student_id,'institution_name');?></td>
                                    </tr>
                                    <tr>
                                        <td><i class='far fa-file-alt'></i> Berkas Pengajuan &nbsp;</td>
                                        <td> : <?php 
                                                if($data['file_pengajuan']==NULL){
                                                    echo "TIDAK TERSEDIA";
                                                }else{
                                            ?>
                                                <a href="../student/application/<?php echo $data['file_pengajuan'];?>" target="_blank" class="btn btn-primary btn-sm">Lihat Berkas</a>
                                            <?php } 
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="card-footer">
                                <div class="row text-center">
                                    <div class="col-sm-6 mx-auto">
                                        <form method="post">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <?php 
                                                        if($data["status"]==1){
                                                    ?>
                                                        <option selected value="1">Di Proses</option>
                                                        <option value="2">Terima</option>
                                                        <option value="3">Tolak</option>
                                                    <?php
                                                        }elseif($data["status"]==2){
                                                    ?>
                                                        <option value="1">Di Proses</option>
                                                        <option selected value="2">Terima</option>
                                                        <option value="3">Tolak</option>
                                                    <?php
                                                        }elseif($data["status"]==3){
                                                    ?>
                                                        <option value="1">Di Proses</option>
                                                        <option value="2">Terima</option>
                                                        <option selected value="3">Tolak</option>
                                                    <?php
                                                        }
                                                    ?>

                                                </select>
                                            </div>
                                            <input type="submit" name="proses" value="Ubah Status" class="btn btn-primary btn-sm">
                                        </form>
                                    </div>
                                </div>
                            </div>
                           <?php
                                if(isset($_POST['proses'])){
                                    $status = $_POST['status'];
                                    $koneksi->query("UPDATE application SET status = '$status' WHERE application_id   = '$application_id'");
                                    echo "<script>alert('Status berhasil diupdate!');location = 'dashboardcom.php'</script>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include ('../footer.php'); ?>
    </body>
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/fontawesome/js/all.min.js"></script>
</html>