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
    require '../classes/company.php';
    $student = new student();
    $student_id = $_SESSION['student']["student_id"];
    $company = new company();
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
                <form method="post">
                <div class="row align-items-center text-center" style="padding-top:15px;">
                    <div class="col-sm-12" style="padding-bottom:10px;">
                        <h3 style="color:white;">Cari Berdasarkan:</h3>
                            <?php   
                                $keyword="";
                                if (isset($_POST['keyword'])) {
                                    $keyword=$_POST['keyword'];
                                }
                            ?>
                    </div>
                </div>
                <div class="row align-items-center text-center" style="padding-top:15px;">
                    <div class="col-sm-12" style="padding-bottom:10px;">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i>&nbsp;Kata Kunci</span>
                            </div>
                                <input type="text" name="keyword" class="form-control" value="<?php echo $keyword;?>" placeholder="Lokasi, Bidang, Judul Bukaan">
                        </div>
                    </div>
                </div>
                    <?php
                        $company_address="";
                        $vacancy_title="";
                        $company_speciality="";
                        if (isset($_POST['filter_column'])){
                            if ($_POST['filter_column']=="company_address"){$company_address="selected";}
                            elseif ($_POST['filter_column']=="vacancy_title"){$vacancy_title="selected";}
                            else{$company_speciality="selected";}
                        }
                    ?>
                <div class="row align-items-center text-center" style="padding-top:15px;">
                    <div class="col-sm-6" style="padding-bottom:10px;">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-check"></i>&nbsp;Cari Berdasarkan</span>
                            </div>
                            <select class="form-control" name="filter_column" required>
                                <option value="company_address" <?php echo $company_address;?>>Lokasi</option>
                                <option value="vacancy_title" <?php echo $vacancy_title;?>>Judul</option>
                                <option value="company_speciality" <?php echo $company_speciality;?>>Jurusan</option>
                            </select>
                        </div>
                    </div>
                    <?php
                        $new="";
                        $old="";
                        if (isset($_POST['sort_by'])){
                            if ($_POST['sort_by']=="old"){$old="selected";}
                            else{$new="selected";}
                        }
                    ?>
                    <div class="col-sm-6" style="padding-bottom:10px;">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-check"></i>&nbsp;Sortir Berdasarkan</span>
                            </div>
                            <select class="form-control" name="sort_by" required>
                                <option value="new" <?php echo $new;?>>Post Terbaru</option>
                                <option value="old" <?php echo $old;?>>Post Terlama</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center text-center" style="padding-top:15px;">
                    <div class="col-sm-12" style="padding-bottom:10px;">
                        <input type="submit" name="submit" class="btn btn-success btn-block" value="Cari">
                    </div>
                </div>
                </form>
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
                                <?php if($company->getters($dataSug["company_id"],"profile_picture")==NULL){ ?>
                                <img src="../assets/img/logo/logo_hitam_pas.png" width="30%;">
                                <?php }else{ ?>
                                <img src="../company/profile_picture/<?php echo $company->getters($dataSug["company_id"],"profile_picture");?>" width="20%;">
                                <?php } ?>
                                <br>
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
                                        <a href="appdetail.php?&id=<?php echo $dataSug['vacancies_id']; ?>" class="btn btn-primary btn-sm">Kunjungi</a>
                                        <?php } else { ?>
                                        <a href="appdetail.php?&id=<?php echo $dataSug['vacancies_id']; ?>" class="btn btn-primary btn-sm">Kunjungi</a>
                                        <a href="apply.php?&id=<?php echo $dataSug['vacancies_id']; ?>" class="btn btn-success btn-sm">Ajukan Magang</a>
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
                <?php
                if (isset($_POST['keyword'])){
                    $keyword=trim($_POST['keyword']);
                    $filter_column="";
                    if($_POST['sort_by']=="new"){
                        if ($_POST['filter_column']=="company_address"){$filter_column="company_address";}
                        else if($_POST['filter_column']=="company_speciality"){$filter_column="company_speciality";}
                        else {$filter_column="vacancy_title";}
                        $sql="SELECT * FROM vacancies WHERE $filter_column LIKE '%".$keyword."%' ORDER BY create_time desc";
                    }
                    else{
                        if ($_POST['filter_column']=="company_address"){$filter_column="company_address";}
                        else if($_POST['filter_column']=="company_speciality"){$filter_column="company_speciality";}
                        else {$filter_column="vacancy_title";}
                        $sql="SELECT * FROM vacancies WHERE $filter_column LIKE '%".$keyword."%' ORDER BY create_time asc";
                    }
                }else {
                    $sql="select * from vacancies order by create_time desc";
                }
                ?>
                <!--list of all & searched vacancy-->
                <div class="row align-items-center justfiy-content-start" style="padding-top:30px;padding-bottom:40px;">
                    <div class="col">
                        <?php
                        $query=mysqli_query($koneksi,$sql);
//                        $query = $student->viewInternshipList();
                        if(mysqli_num_rows($query)>0){
                            while($data = mysqli_fetch_array($query)){
                                $v_id = $data['vacancies_id'];
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <?php
                                    if($company->getters($data["company_id"],"profile_picture")==NULL){
                                ?>
                                        <img src="../assets/img/logo/logo_hitam_pas.png" width="30%;">
                                <?php
                                    }else{
                                ?>
                                        <img src="../company/profile_picture/<?php echo $company->getters($data["company_id"],"profile_picture");?>" width="20%;">
                                <?php
                                    }
                                ?>
                                <br>
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
                                        <div class="row">
                                            <div class="col-sm-1">
                                                <form method="post" action="page_counter.php">
                                                    <input type="hidden" name="vacancies_id" value="<?php echo $data['vacancies_id'];?>">
                                                    <input type="submit" name="visit" class="btn btn-primary btn-sm" value="Kunjungi">
                                                </form>
                                            </div>
                                            <div class="col">
                                                <a href="apply.php?&id=<?php echo $data['vacancies_id']; ?>" class="btn btn-success btn-sm">Ajukan Magang</a>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <?php }}
                        else{?>
                            <div class="alert alert-primary">Maaf ya! Bukaan yang kamu cari tidak ada, atau belum ada bukaan! Sabar ya!</div>
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