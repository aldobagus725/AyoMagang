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
	$query = $koneksi->query("SELECT * FROM vacancies JOIN company ON vacancies.company_id = company.company_id WHERE vacancies_id = '$_GET[id]'");
	$data  = $query->fetch_assoc();
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
                                        <td><i class='fas fa-clipboard-list'></i> Nama Pengaju KP &nbsp;</td>
                                        <td> : <?php echo $data["student_name"];?></td>
                                    </tr>
                                    <tr>
                                        <td><i class='fas fa-clipboard-list'></i> Alamat Pengajuan &nbsp;</td>
                                        <td> : <?php echo $data["student_address"];?></td>
                                    </tr>

                                </table>
                                <br>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="">Choose Status</option>
                                    <option value="Selamat Diterima">Accepted</option>
                                    <option value="Maaf Ditolak">Decline</option>
    
                                </select>
                            </div>
                            <button class="btn btn-success btn-sm" name="proses">status pengajuan</button>
                           <br>
                           
                           <?php
                                if(isset($_POST['proses'])){
                                    $status = $_POST['status'];
                                    $koneksi->query("UPDATE application SET status = '$status'
                                                                    WHERE application_id   = '$application_id'");
                                   
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