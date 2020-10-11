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
            #filter{
                background-color: rgb(0, 133, 216);
                width: 100%;
            }
        </style>
    </head>
    <body>
        <?php include ('local_navbar.php'); ?>
        <div class="container-fluid" id="filter">
            <div class="container">
                <div class="row align-items-center text-center" style="padding-top:15px;">
                    <div class="col-sm-4" style="padding-bottom:10px;">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class='fas fa-building'></i>  
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Perusahaan yang kamu cari">
                        </div>
                    </div>
                    <div class="col-sm-4" style="padding-bottom:10px;">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class='fas fa-map-marker-alt'></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Daerah, Lokasi">
                        </div>
                    </div>
                    <div class="col-sm-4" style="padding-bottom:10px;">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class='fas fa-user-alt'></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Spesialisasi Pekerjaan">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-end text-right" style="padding-top:10px;">
                    <div class="col-sm-3" style="padding-bottom:10px;">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Sort By</span>
                            </div>
                            <select name="sortby" class="custom-select">
                                <option value="new">Post Terbaru</option>
                                <option value="old">Post Terlama</option>
                                <option value="relevant">Relevansi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col" style="padding-bottom:10px;">
                        <div class="input-group text-right">
                            <a href="#" class="btn btn-success">Cari</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="student-application">
            <div class="container">
                <div class="row align-items-center text-center" style="padding-top:40px;">
                    <div class="col">
                        <h2>List Bukaan</h2>
                        <hr>
                    </div>
                </div>
                <div class="row align-items-center justfiy-content-start" style="padding-top:30px;padding-bottom:40px;">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-8">
                        <?php
                        $query = mysqli_query($koneksi,"SELECT * FROM vacancies");
                        if(mysqli_num_rows($query)>0){
                            while($data = mysqli_fetch_array($query)){
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <img src="../assets/img/partner/help.png" width="30%;"><br>
                                <h4><?php echo $data["vacancy_title"];?></h4>
                                <h6><?php echo $data["company_name"];?></h6>
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
                                        <a href="appdetail.php?&id=<?php echo $data['vacancies_id']; ?>" class="btn btn-primary">Kunjungi Bukaan</a>
                                        <a href="#" class="btn btn-danger">Laporkan Bukaan Ini</a>
                                    </div>
                                    <div class="col text-right">
                                        <a href="#"><i class='far fa-bookmark' style='font-size:30px;color:rgb(0, 133, 216)'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }}
                        else{?>
                            <div class="alert alert-primary">
                                Maaf ya! Belum ada bukaan nih! Sabar ya!
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