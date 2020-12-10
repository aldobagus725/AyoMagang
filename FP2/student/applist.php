<?php 
    include"../koneksi.php";
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
    $student = new student();
    $student_id = $_SESSION['student']["student_id"];
    $course = $student->getters($student_id,"course");
    //	Array berisi data daerah.
    $daerah = array("Banda Aceh", "Langsa", "Lhokseumawe", "Badung", "Depok", "Bekasi", "Jakarta", "Makassar", "Kupang", "Gorontalo", "Merauke", "Gianyar", "Tangerang" );
    sort($daerah);
    //	Array berisi data spesialisasi.
    $spesialisasi = array("Perhotelan", "Kelistrikan", "Teknologi", "Kuliner", "Jurnalis", "Akuntansi", "Marketing",);
    sort($spesialisasi);
?>
<html>
    <head>
        <title>Cari Magang</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/ayomagang.css">
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
        <link rel="stylesheet" href="../assets/css/animate.css">
        <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>#filter{background-color: rgb(0, 133, 216);width: 100%;}</style>
    </head>
    <body>
        <?php include ('local_navbar.php'); ?>
        <div class="container-fluid" id="filter">
            <div class="container">
                <div class="row align-items-center text-center" style="padding-top:15px;">
                    <div class="col-sm-4" style="padding-bottom:10px;">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class='fas fa-building'></i>  </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Perusahaan yang kamu cari">
                        </div>
                    </div>
                    <div class="col-sm-4" style="padding-bottom:10px;">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class='fas fa-map-marker-alt'></i> &nbsp; Daerah</span>
                            </div>
                            <select name="daerah" class="custom-select" required>
                                <?php
                                    for($i=0;$i<count($daerah);$i++){
                                        echo "<option value=\"$daerah[$i]\">$daerah[$i]</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4" style="padding-bottom:10px;">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class='fas fa-user-alt'></i> &nbsp; Bidang</span>
                            </div>
                            <select name="daerah" class="custom-select" required>
                                <?php
                                    for($i=0;$i<count($spesialisasi);$i++){
                                        echo "<option value=\"$spesialisasi[$i]\">$spesialisasi[$i]</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-end text-right" style="padding-top:10px;">
                    <div class="col-sm-3" style="padding-bottom:10px;">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Sort By</span></div>
                            <select name="sortby" class="custom-select">
                                <option value="new">Post Terbaru</option>
                                <option value="old">Post Terlama</option>
                                <option value="relevant">Relevansi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col" style="padding-bottom:10px;">
                        <div class="input-group text-right"><a href="#" class="btn btn-success">Cari</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="student-application">
            <div class="container">
                <div class="row align-items-center text-center" style="padding-top:40px;">
                    <div class="col"><h2>List Bukaan</h2><hr></div>
                </div>
                <!--recommended vacancy-->
                <div class="row align-items-center justfiy-content-start" style="padding-top:30px;padding-bottom:40px;">
                    <div class="col alert-warning rounded shadow-sm">
                        <br>
                        <h5>KP / PKL yang direkomendasikan sesuai jurusan kamu</h5>
                        <br>
                        <?php
                        $querySug = $student->viewRecommendedInternshipList($course);
                        if(mysqli_num_rows($querySug)>0){
                            while($dataSug = mysqli_fetch_array($querySug)){
                                $v_id = $dataSug['vacancies_id'];
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <img src="../assets/img/logo/logo_hitam_pas.png" width="30%;"><br>
                                <h4><?php echo $dataSug["vacancy_title"];?></h4>
                                <h6><?php echo $dataSug["company_name"];?></h6>
                            </div>
                            <div class="card-body">
                                <table>
                                    <tr>
                                        <td><i class='fas fa-map-marker-alt'></i> &nbsp;</td>
                                        <td><?php echo $dataSug["company_address"];?></td>
                                    </tr>
                                    <tr>
                                        <td><i class='fas fa-user-alt'></i> &nbsp;</td>
                                        <td><?php echo $dataSug["company_speciality"];?></td>
                                    </tr>
                                </table> 
                            </div>
                            <div class="card-footer">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <?php
                                            $check = mysqli_query($koneksi,"select * from application where student_id = '$student_id' AND vacancies_id = '$v_id'");
                                            $checkRow = mysqli_num_rows($check);
                                            if ($checkRow > 0) {
                                            ?>
                                        <h6>Kamu sudah Melakukan Pengajuan disini!</h6>
                                        <a href="appdetail.php?&id=<?php echo $data['vacancies_id']; ?>" class="btn btn-primary btn-sm">Kunjungi</a>
                                        <?php } else { ?>
                                        <a href="appdetail.php?&id=<?php echo $data['vacancies_id']; ?>" class="btn btn-primary btn-sm">Kunjungi</a>
                                        <a href="apply.php?&id=<?php echo $data['vacancies_id']; ?>" class="btn btn-success btn-sm">Ajukan Magang</a>
                                        <a href="#" class="btn btn-danger btn-sm">Laporkan</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <?php }}
                        else{?>
                            <div class="alert alert-primary">Maaf ya! Rekomendasi yang ok belum ada!</div>
                        <?php } ?>
                    </div>
                </div>
                <!--                list of all vacancy-->
                <div class="row align-items-center justfiy-content-start" style="padding-top:30px;padding-bottom:40px;">
                    <div class="col">
                        <?php
                        $query = $student->viewInternshipList();
                        if(mysqli_num_rows($query)>0){
                            while($data = mysqli_fetch_array($query)){
                                $v_id = $data['vacancies_id'];
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <img src="../assets/img/logo/logo_hitam_pas.png" width="30%;"><br>
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
                                        <?php
                                            $check = mysqli_query($koneksi,"select * from application where student_id = '$student_id' AND vacancies_id = '$v_id'");
                                            $checkRow = mysqli_num_rows($check);
                                            if ($checkRow > 0) {
                                            ?>
                                        <h6>Kamu sudah Melakukan Pengajuan disini!</h6>
                                        <a href="appdetail.php?&id=<?php echo $data['vacancies_id']; ?>" class="btn btn-primary btn-sm">Kunjungi</a>
                                        <?php } else { ?>
                                        <a href="appdetail.php?&id=<?php echo $data['vacancies_id']; ?>" class="btn btn-primary btn-sm">Kunjungi</a>
                                        <a href="apply.php?&id=<?php echo $data['vacancies_id']; ?>" class="btn btn-success btn-sm">Ajukan Magang</a>
                                        <a href="#" class="btn btn-danger btn-sm">Laporkan</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <?php }}
                        else{?>
                            <div class="alert alert-primary">Maaf ya! Belum ada bukaan nih! Sabar ya!</div>
                        <?php } ?>
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