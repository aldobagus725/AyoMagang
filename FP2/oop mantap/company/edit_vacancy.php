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

require '../classes/vacancies.php';
require '../classes/company.php';
$vacancys = new vacancies();
$company = new company();
$vacancy_id = $_GET['id'];
$id_company = $_SESSION['company']['company_id'];
//$vacancies_id = $_SESSION['vacancies']['vacancies_id'];

$company_id= $vacancys->getters($vacancy_id,"company_id");
$company_name= $vacancys->getters($vacancy_id,"company_name");
$vacancy_title= $vacancys->getters($vacancy_id,"vacancy_title");
$company_address= $vacancys->getters($vacancy_id,"company_address");
$company_speciality= $vacancys->getters($vacancy_id,"company_speciality");
$phone= $vacancys->getters($vacancy_id,"phone");
$intern_policies= $vacancys->getters($vacancy_id,"intern_policies");
$author= $vacancys->getters($vacancy_id,"author");
$siup = $company->getters($id_company,"siup");

?>
<html>
    <head>
        <title>Edit Vacancy</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/ayomagang.css">
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
        <link rel="stylesheet" href="../assets/css/animate.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>#utama{background-color:white;}</style>
    </head>
    <body>
    <?php include('local_navbar.php'); ?>
    <div class="container-fluid" id="companyapplication">
        <div class="container">
            <div class="row align-items-center text-center" style="padding-top:40px;">
                <div class="col"><h2>Edit Lowongan Perusahaan</h2><hr></div>
            </div>
            <div class="row align-items-top justfiy-content-start" style="padding-top:30px;padding-bottom:40px;">
                <div class="col-sm-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-hover">
                                    <tr>
                                        <th>ID Lowongan</th>
                                        <td><?php echo $vacancy_id; ?></td>
                                    </tr>
                                    <tr>
                                        <th>ID Perusahaan</th>
                                        <td><?php echo $id_company; ?></td>
                                    </tr>
                                    <tr>
                                        <th>SIUP</th>
                                        <td><?php echo $siup; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Perusahaan</th>
                                        <td><?php echo $company_name; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td><?php echo $company_address; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Judul Lowongan</th>
                                        <td><?php echo $vacancy_title; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Author</th>
                                        <td><?php echo $author; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Bidang Perusahaan</th>
                                        <td><?php echo $company_speciality; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Syarat Magang</th>
                                        <td><?php echo $intern_policies; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="card-footer text-right">
                                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#editVacancy">Edit Lowongan</a>
                                <!-- modal for edit profile company-->
                                <div class="modal fade" id="editVacancy">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="post">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Lowongan Perusahaan</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text">ID Lowongan</span></div>
                                                        <input type="text" name="vacancy_id" class="form-control" value="<?php echo $vacancy_id; ?>" readonly>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text">ID Perusahaan</span></div>
                                                        <input type="text" name="id_company" class="form-control" value="<?php echo $id_company; ?>" readonly>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text">Nama Perusahaan</span></div>
                                                        <input type="text" name="company_name" class="form-control" value="<?php echo $company_name; ?>" readonly>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text">Alamat</span></div>
                                                        <input type="text" name="company_address" class="form-control" value="<?php echo $company_address; ?>" readonly>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text">Telepon</span></div>
                                                        <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>" readonly>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text">Judul Lowongan</span></div>
                                                        <input type="text" name="vacancy_title" class="form-control" value="<?php echo $vacancy_title; ?>">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text">Author</span></div>
                                                        <input type="text" name="author" class="form-control" value="<?php echo $author; ?>">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text">Bidang Perusahaan</span></div>
                                                        <input type="text" name="company_speciality" class="form-control" value="<?php echo $company_speciality; ?>" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text">Syarat Magang</span></div>
                                                        <input type="text" name="intern_policies" class="form-control" value="<?php echo $intern_policies; ?>" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text">SIUP</span></div>
                                                        <input type="text" name="siup" class="form-control" value="<?php echo $siup; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" name="editvacancymodal" value="Update Data!" class="btn btn-primary">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('../footer.php'); ?>
    </body>
    <?php
    if(isset($_POST['editvacancymodal'])){
        $vacancy_id = $_POST['vacancy_id'];
        $id_company = $_POST['id_company'];
        $company_name = $_POST['company_name'];
        $company_address = $_POST['company_address'];
        $phone= $_POST['phone'];
        $vacancy_title = $_POST['vacancy_title'];
        $author = $_POST['author'];
        $company_speciality = $_POST['company_speciality'];
        $intern_policies = $_POST['intern_policies'];
        $siup = $_POST['siup'];
        $editva = $vacancys->editvacancy($vacancy_id,$id_company,$company_name,$company_address,$phone,$vacancy_title,$author,$company_speciality,$intern_policies,$siup);
        if ($editva==1){
            echo "<script>alert('Selamat! Data anda telah berubah!');location = 'dashboardcom.php';</script>";
        }elseif ($editva==2){
            echo "<script>alert('Format Anda Salah!');location = 'dashhboardcom.php';</script>";
        }
    }
    ?>
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</html>