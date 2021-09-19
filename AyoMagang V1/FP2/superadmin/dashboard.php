<?php 
    if(!isset($_SESSION)){session_start();}
    else{
        if(!isset($_SESSION['superadmin'])){
            echo "<script>alert('Silahkan login terlebih dahulu!');</script>";
            echo "<script>location='login.php';</script>";
        }
    }
    require "../classes/superadmin.php";
    include "../koneksi.php";
    $superadmin = new superadmin();
    $id = $_SESSION['superadmin']["superadmin_id"];
    $username = $superadmin->getters($id,"username");
    $fullname = $superadmin->getters($id,"fullname");
    $email = $superadmin->getters($id,"email");
//statistic variable
    $total_student = $superadmin->countStudent();
    $studentLastEntry = $superadmin->lastEntryStudent();
    $total_company = $superadmin->countCompany();
    $companyLastEntry = $superadmin->lastEntryCompany();
    $total_vacancy = $superadmin->countVacancy();
    $vacancyLastEntry = $superadmin->lastEntryVacancy();
    $total_application = $superadmin->countApplication();
    $applicationLastEntry = $superadmin->lastEntryApplication();
    $total_user = $superadmin->countUsers($total_student,$total_company);
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
    </head>
    <body class="wow fadeIn">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
            <a class="navbar-brand" href="dashboard.php"><img src="../assets/img/logo/logo%20putih.png" width="100%;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <span class="badge badge-pill badge-primary count" style="float:right;margin-bottom:-10px;"></span>
                            <i class='far fa-bell'></i>
                        </a>
                        <ul class="dropdown-menu"></ul>
                    </li>
                    <li class="nav-item"><a class="nav-link scroll-link" href="#footer">Butuh Bantuan?</a></li>
                    <li class="nav-item"><a class="nav-link scroll-link" onclick="return confirm('Yakin Logout?')" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row align-items-top">
                <div class="col-sm-2" id="homemade-navbar1">
                    <div class="nav flex-column nav-pills nav-justified" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">Dashboard</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                        <a class="nav-link" id="v-pills-student-tab" data-toggle="pill" href="#v-pills-student" role="tab" aria-controls="v-pills-student" aria-selected="false">Students</a>
                        <a class="nav-link" id="v-pills-company-tab" data-toggle="pill" href="#v-pills-company" role="tab" aria-controls="v-pills-company" aria-selected="false">Companies</a>
                        <a class="nav-link" id="v-pills-vacancy-tab" data-toggle="pill" href="#v-pills-vacancy" role="tab" aria-controls="v-pills-vacancy" aria-selected="false">Vacancies</a>
                        <a class="nav-link" id="v-pills-application-tab" data-toggle="pill" href="#v-pills-application" role="tab" aria-controls="v-pills-application" aria-selected="false">Applications</a>
                        <a class="nav-link" id="v-pills-request-tab" data-toggle="pill" href="#v-pills-request" role="tab" aria-controls="v-pills-request" aria-selected="false">Requests</a>
                        <a class="nav-link" id="v-pills-chats-tab" data-toggle="pill" href="#v-pills-chats" role="tab" aria-controls="v-pills-chats" aria-selected="false">Live Chat</a>
                    </div>
                </div>
                <div class="col-sm-10" id="homemade-navbar2">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
                            <div class="row shadow-sm" style="background-color: #f8f8f8;">
                                <div class="col text-left" style="padding-top:20px;padding-bottom:20px;">
                                    <h3>Welcome back <i><?php echo $fullname;?></i>!</h3>
                                    <h5>Let's pickup what we missed!</h5>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col" style="padding-top:20px;padding-bottom:20px;">
                                    <div class="jumbotron shadow">
                                        <h5><i class='fas fa-graduation-cap'></i> &nbsp;<i class='fas fa-building'></i> &nbsp;Total User: <?php echo $total_user;?></h5><hr>
                                    </div>
                                </div>
                                <div class="col" style="padding-top:20px;padding-bottom:20px;">
                                    <div class="jumbotron shadow bg-primary" style="color:white;">
                                        <h5><i class='fas fa-graduation-cap'></i> &nbsp;Total Student terdaftar: <?php echo $total_student;?></h5><hr>
                                        <h6 style="font-style:italic;">Daftar Baru at : <?php echo $studentLastEntry; ?></h6>
                                    </div>
                                </div>
                                <div class="col" style="padding-top:20px;padding-bottom:20px;">
                                    <div class="jumbotron shadow bg-info" style="color:white;">
                                        <h5><i class='fas fa-building'></i> &nbsp;Total Company terdaftar: <?php echo $total_company;?></h5><hr>
                                        <h6 style="font-style:italic;">Daftar Baru at : <?php echo $companyLastEntry;?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col" style="padding-top:20px;padding-bottom:20px;">
                                    <div class="jumbotron shadow bg-secondary" style="color:white;">
                                        <h5><i class='fas fa-info-circle'></i> &nbsp;Total Bukaan Magang: <?php echo $total_vacancy;?></h5><hr>
                                        <h6 style="font-style:italic;">Entry Bukaan Terakhir: <?php echo $vacancyLastEntry;?></h6>
                                    </div>
                                </div>
                                <div class="col" style="padding-top:20px;padding-bottom:20px;">
                                    <div class="jumbotron shadow bg-success" style="color:white;">
                                        <h5><i class='far fa-file-alt'></i> &nbsp;Total Ajuan KP/PKL Siswa: <?php echo $total_application;?></h5><hr>
                                        <h6 style="font-style:italic;">Entry Aplikasi Terakhir: <?php echo $applicationLastEntry; ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <div class="container" style="padding-top:20px;padding-bottom:20px;">
                                <div class="row">
                                    <div class="col text-left"><h4>Profile</h4><hr></div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-sm-8">
                                        <div class="card shadow-sm">
                                            <div class="card-body">
                                                <table class="table table-hover">
                                                    <tr><th>ID Kamu</th><td><?php echo $id;?></td></tr>
                                                    <tr><th>Fullname</th><td><?php echo $fullname;?></td></tr>
                                                    <tr><th>Username</th><td><?php echo $username;?></td></tr>
                                                    <tr><th>Email</th><td><?php echo $email;?></td></tr>
                                                </table>
                                                <br>
                                                <a href="#" class="btn btn-success">Edit Info ini</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-student" role="tabpanel" aria-labelledby="v-pills-student-tab">
                            <div class="container" style="padding-top:20px;padding-bottom:20px;">
                                <div class="row"><div class="col text-left"><h4>Student</h4><hr></div></div>
                                <div class="row">
                                    <div class="col">
                                        <div class="table-responsive shadow-sm">
                                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size:14px;">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>No</th>
                                                        <th>ID Siswa</th>
                                                        <th>Nama Lengkap</th>
                                                        <th>Username</th>
                                                        <th>Institusi Pendidikan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $nomor = 1;
                                                        $query_view = $superadmin->viewStudent();
                                                        while ($dataapp = $query_view->fetch_assoc()){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $nomor++;?></td>
                                                        <td><?php echo $dataapp['student_id']; ?></td>
                                                        <td><?php echo $dataapp['fullname']; ?></td>
                                                        <td><?php echo $dataapp['username']; ?></td>
                                                        <td><?php echo $dataapp['institution_name']; ?></td>
                                                        <td colspan="2" class="text-center">
                                                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewStudent<?php echo $nomor;?>"><i class='far fa-list-alt'></i>&nbsp;Detail</a>
                                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editStudent<?php echo $nomor;?>"><i class='far fa-edit'></i>&nbsp;Edit</a> 
                                                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteStudent<?php echo $nomor;?>"><i class='far fa-trash-alt'></i>&nbsp;Delete</a>
                                                            <!-- =================== STUDENT MODAL ===================-->
                                                            <!--modal for view student-->
                                                            <div class="modal fade" id="viewStudent<?php echo $nomor;?>">
                                                                 <div class="modal-dialog">
                                                                     <div class="modal-content">
                                                                         <div class="modal-header">
                                                                             <h4 class="modal-title">Rincian Student</h4>
                                                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                         </div>
                                                                         <div class="modal-body">
                                                                             <?php
                                                                                $id_user = $dataapp['student_id'];
                                                                                $query = $superadmin->viewStudentDetail($id_user);
                                                                                while ($data = $query->fetch_assoc()){ 
                                                                              ?>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">ID Student</span></div>
                                                                                <input type="text" name="student_id" class="form-control" value="<?php echo $data['student_id'];?>" readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Username</span></div>
                                                                                <input type="text" name="username" class="form-control" value="<?php echo $data['username'];?>" readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">NIS/NIM</span></div>
                                                                                <input type="text" name="student_number" class="form-control" value="<?php echo $data['student_number'];?>" readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Nama Lengkap</span></div>
                                                                                <input type="text" name="fullname" class="form-control" value="<?php echo $data['fullname'];?>" required readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Nama Sekolah / Kampus</span></div>
                                                                                <input type="text" name="institution_name" class="form-control" value="<?php echo $data['institution_name'];?>" required readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Bidang / Jurusan</span></div>
                                                                                <input type="text" name="course" class="form-control" value="<?php echo $data['course'];?>" required readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Alamat</span></div>
                                                                                <input type="text" name="address" class="form-control" value="<?php echo $data['address'];?>" required readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Telepon</span></div>
                                                                                <input type="text" name="phone" class="form-control" value="<?php echo $data['phone'];?>" required readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Email</span></div>
                                                                                <input type="email" name="email" class="form-control" value="<?php echo $data['email'];?>" required readonly>
                                                                            </div>
                                                                         </div>
                                                                         <div class="modal-footer">
                                                                             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                         </div>
                                                                         <?php } ?>
                                                                     </div>
                                                                 </div>
                                                            </div>
                                                            <!--modal for edit student-->
                                                            <div class="modal fade" id="editStudent<?php echo $nomor;?>">
                                                                 <div class="modal-dialog">
                                                                     <div class="modal-content">
                                                                         <form method="post">
                                                                             <div class="modal-header">
                                                                                 <h4 class="modal-title">Edit Student</h4>
                                                                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                             </div>
                                                                             <div class="modal-body">
                                                                                <?php
                                                                                    $id_user = $dataapp['student_id'];
                                                                                    $query = $superadmin->viewStudentDetail($id_user);
                                                                                    while ($data = $query->fetch_assoc()){ 
                                                                                ?>
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend"><span class="input-group-text">ID Student</span></div>
                                                                                    <input type="text" name="student_id" class="form-control" value="<?php echo $data['student_id'];?>" required readonly>
                                                                                </div>
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend"><span class="input-group-text">Username</span></div>
                                                                                    <input type="text" name="username" class="form-control" value="<?php echo $data['username'];?>" required>
                                                                                </div>
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend"><span class="input-group-text">NIS/NIM</span></div>
                                                                                    <input type="text" name="student_number" class="form-control" value="<?php echo $data['student_number'];?>" required>
                                                                                </div>
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend"><span class="input-group-text">Nama Lengkap</span></div>
                                                                                    <input type="text" name="fullname" class="form-control" value="<?php echo $data['fullname'];?>" required>
                                                                                </div>
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend"><span class="input-group-text">Nama Sekolah / Kampus</span></div>
                                                                                    <input type="text" name="institution_name" class="form-control" value="<?php echo $data['institution_name'];?>" required>
                                                                                </div>
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend"><span class="input-group-text">Bidang / Jurusan</span></div>
                                                                                    <input type="text" name="course_display" class="form-control" value="<?php echo $data['course'];?>(ubah)" required readonly>
                                                                                    <?php
                                                                                        $spesialisasi = array("Perhotelan", "Kelistrikan", "Teknologi", "Kuliner", "Jurnalis", "Akuntansi", "Marketing",);sort($spesialisasi);
                                                                                    ?>
                                                                                    <select name="course" class="custom-select" required>
                                                                                    <?php
                                                                                        for($i=0;$i<count($spesialisasi);$i++){
                                                                                            echo "<option value=\"$spesialisasi[$i]\">$spesialisasi[$i]</option>";
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                                </div>
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend"><span class="input-group-text">Alamat</span></div>
                                                                                    <input type="text" name="address" class="form-control" value="<?php echo $data['address'];?>" required>
                                                                                </div>
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend"><span class="input-group-text">Telepon</span></div>
                                                                                    <input type="text" name="phone" class="form-control" value="<?php echo $data['phone'];?>" required>
                                                                                </div>
                                                                                <div class="input-group mb-3">
                                                                                    <div class="input-group-prepend"><span class="input-group-text">Email</span></div>
                                                                                    <input type="email" name="email" class="form-control" value="<?php echo $data['email'];?>" required >
                                                                                </div>
                                                                         </div>
                                                                         <div class="modal-footer">
                                                                            <input type="submit" name="update-student" value="Update Data!" class="btn btn-primary"> 
                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                         </div>
                                                                         </form>
                                                                         <?php } ?>
                                                                     </div>
                                                                 </div>
                                                            </div>
                                                            <!--modal for delete student-->
                                                            <div class="modal fade" id="deleteStudent<?php echo $nomor;?>">
                                                                 <div class="modal-dialog">
                                                                     <div class="modal-content">
                                                                         <div class="modal-header">
                                                                             <h4 class="modal-title">Hapus Student</h4>
                                                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                         </div>
                                                                         <div class="modal-body">
                                                                             <h4 align="center">
                                                                                 <?php $id_user = $dataapp['student_id'];?>
                                                                                 Apakah anda yakin ingin menghapus User dengan ID <?php echo $id_user;?>
                                                                                 <strong><span class="grt"></span></strong>?
                                                                             </h4>
                                                                         </div>
                                                                         <div class="modal-footer">
                                                                             <form method="post">
                                                                                 <input type="hidden" name="student_id" value="<?php echo $id_user;?>">
                                                                                 <input type="submit" name="delete-student" value="Hapus"! class="btn btn-danger">
                                                                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                             </form>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-company" role="tabpanel" aria-labelledby="v-pills-company-tab">
                            <div class="container" style="padding-top:20px;padding-bottom:20px;">
                                <div class="row">
                                    <div class="col text-left">
                                        <h4>Company</h4>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="table-responsive shadow-sm">
                                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size:14px;">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>No</th>
                                                        <th>ID Perusahaan</th>
                                                        <th>Nama Perusahaan</th>
                                                        <th>Username</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $query_view = $superadmin->viewCompany();
                                                        $nomor = 1;
                                                        while ($dataapp = $query_view->fetch_assoc()){ 
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $nomor++; ?></td>
                                                        <td><?php echo $dataapp['company_id']; ?></td>
                                                        <td><?php echo $dataapp['company_name']; ?></td>
                                                        <td><?php echo $dataapp['username']; ?></td>
                                                        <td colspan="2" class="text-center">
                                                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewCompany<?php echo $nomor;?>"><i class='far fa-list-alt'></i>&nbsp;Detail</a>
                                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editCompany<?php echo $nomor;?>"><i class='far fa-edit'></i>&nbsp;Edit</a>  
                                                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteCompany<?php echo $nomor;?>"><i class='far fa-trash-alt'></i>&nbsp;Delete</a>
                                                            <!-- =================== COMPANY ===================-->
                                                            <!--modal for view COMPANY-->
                                                            <div class="modal fade" id="viewCompany<?php echo $nomor;?>">
                                                                 <div class="modal-dialog">
                                                                     <div class="modal-content">
                                                                         <div class="modal-header">
                                                                             <h4 class="modal-title">Rincian Company</h4>
                                                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                         </div>
                                                                         <div class="modal-body">
                                                                             <?php
                                                                                $id_user = $dataapp['company_id'];
                                                                                $query = $superadmin->viewCompanyDetail($id_user);
                                                                                while ($data = $query->fetch_assoc()){ 
                                                                              ?>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">ID Company</span></div>
                                                                                <input type="text" name="company_id" class="form-control" value="<?php echo $data['company_id'];?>" readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Username</span></div>
                                                                                <input type="text" name="username" class="form-control" value="<?php echo $data['username'];?>" readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">SIUP</span></div>
                                                                                <input type="text" name="SIUP" class="form-control" value="<?php echo $data['siup'];?>" readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Nama Perusahaan</span></div>
                                                                                <input type="text" name="company_name" class="form-control" value="<?php echo $data['company_name'];?>" required readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Alamat</span></div>
                                                                                <input type="text" name="address" class="form-control" value="<?php echo $data['address'];?>" required readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Telepon</span></div>
                                                                                <input type="text" name="phone" class="form-control" value="<?php echo $data['phone'];?>" required readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Email</span></div>
                                                                                <input type="text" name="email" class="form-control" value="<?php echo $data['email'];?>" required readonly>
                                                                            </div>
                                                                         </div>
                                                                         <div class="modal-footer">
                                                                             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                         </div>
                                                                         <?php } ?>
                                                                     </div>
                                                                 </div>
                                                            </div>
                                                            <!--modal for edit company-->
                                                            <div class="modal fade" id="editCompany<?php echo $nomor;?>">
                                                                 <div class="modal-dialog">
                                                                     <form method="post">
                                                                     <div class="modal-content">
                                                                         <div class="modal-header">
                                                                             <h4 class="modal-title">Edit Company</h4>
                                                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                         </div>
                                                                         <div class="modal-body">
                                                                             <?php
                                                                                $id_user = $dataapp['company_id'];
                                                                                $query = $superadmin->viewCompanyDetail($id_user);
                                                                                while ($data = $query->fetch_assoc()){ 
                                                                              ?>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">ID Company</span></div>
                                                                                <input type="text" name="company_id" class="form-control" value="<?php echo $data['company_id'];?>" required readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Username</span></div>
                                                                                <input type="text" name="username" class="form-control" value="<?php echo $data['username'];?>" required>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">SIUP</span></div>
                                                                                <input type="text" name="siup" class="form-control" value="<?php echo $data['siup'];?>" required>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Nama Perusahaan</span></div>
                                                                                <input type="text" name="company_name" class="form-control" value="<?php echo $data['company_name'];?>" required>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Alamat</span></div>
                                                                                <input type="text" name="address" class="form-control" value="<?php echo $data['address'];?>" required>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Telepon</span></div>
                                                                                <input type="text" name="phone" class="form-control" value="<?php echo $data['phone'];?>" required >
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Email</span></div>
                                                                                <input type="text" name="email" class="form-control" value="<?php echo $data['email'];?>" required >
                                                                            </div>
                                                                         </div>
                                                                         <div class="modal-footer">
                                                                             <input type="submit" name="update-company" value="Update Data!" class="btn btn-primary">
                                                                             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                         </div>
                                                                         <?php } ?>
                                                                     </div>
                                                                     </form>
                                                                 </div>
                                                            </div>
                                                            <!--modal for delete company-->
                                                            <div class="modal fade" id="deleteCompany<?php echo $nomor;?>">
                                                                 <div class="modal-dialog">
                                                                     <div class="modal-content">
                                                                         <div class="modal-header">
                                                                             <h4 class="modal-title">Hapus Company</h4>
                                                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                         </div>
                                                                         <div class="modal-body">
                                                                             <h4 align="center">
                                                                                 <?php $id_user = $dataapp['company_id'];?>
                                                                                 Apakah anda yakin ingin menghapus User dengan ID <?php echo $id_user;?>
                                                                                 <strong><span class="grt"></span></strong>?
                                                                             </h4>
                                                                         </div>
                                                                         <div class="modal-footer">
                                                                             <form method="post">
                                                                                 <input type="hidden" name="company_id" value="<?php echo $id_user;?>">
                                                                                 <input type="submit" name="delete-company" value="Hapus"! class="btn btn-danger">
                                                                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                             </form>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-vacancy" role="tabpanel" aria-labelledby="v-pills-vacancy-tab">
                            <div class="container" style="padding-top:20px;padding-bottom:20px;">
                                <div class="row">
                                    <div class="col text-left">
                                        <h4>Vacancy</h4>
                                        <hr>
                                    </div>                               
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="table-responsive shadow-sm">
                                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size:14px;">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>ID Lowongan</th>
                                                        <th>Nama Perusahaan</th>
                                                        <th>Bidang Perusahaan</th>
                                                        <th>Author</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $query_view = $superadmin->viewVacancy();
                                                        $nomor = 1;
                                                        while ($dataapp = $query_view->fetch_assoc()){ 
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $nomor++; ?></td>
                                                        <td><?php echo $dataapp['vacancies_id']; ?></td>
                                                        <td><?php echo $dataapp['company_name']; ?></td>
                                                        <td><?php echo $dataapp['company_speciality']; ?></td>
                                                        <td><?php echo $dataapp['author']; ?></td>
                                                        <td colspan="2" class="text-center">
                                                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewVacancy<?php echo $nomor;?>"><i class='far fa-list-alt'></i>&nbsp;Detail</a>
                                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editVacancy<?php echo $nomor;?>"><i class='far fa-edit'></i>&nbsp;Edit</a> 
                                                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteVacancy<?php echo $nomor;?>"><i class='far fa-trash-alt'></i>&nbsp;Delete</a>
                                                            <!-- =================== VACANCY ===================-->
                                                            <!--modal for view Vacancy-->
                                                            <div class="modal fade" id="viewVacancy<?php echo $nomor;?>">
                                                                 <div class="modal-dialog">
                                                                     <div class="modal-content">
                                                                         <div class="modal-header">
                                                                             <h4 class="modal-title">Rincian Vacancy</h4>
                                                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                         </div>
                                                                         <div class="modal-body">
                                                                             <?php
                                                                                $id_user = $dataapp['vacancies_id'];
                                                                                $query = $superadmin->viewVacancyDetail($id_user);
                                                                                while ($data = $query->fetch_assoc()){ 
                                                                              ?>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">ID Bukaan</span></div>
                                                                                <input type="text" name="vacancies_id" class="form-control" value="<?php echo $data['vacancies_id'];?>" readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">ID Perusahaan</span></div>
                                                                                <input type="text" name="company_id" class="form-control" value="<?php echo $data['company_id'];?>" readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Nama Perusahaan</span></div>
                                                                                <input type="text" name="company_name" class="form-control" value="<?php echo $data['company_name'];?>" required readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Judul Bukaan</span></div>
                                                                                <input type="text" name="vacancy_title" class="form-control" value="<?php echo $data['vacancy_title'];?>" required readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Alamat</span></div>
                                                                                <input type="text" name="company_address" class="form-control" value="<?php echo $data['company_address'];?>" required readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Bidang / Job Desc</span></div>
                                                                                <input type="text" name="company_speciality" class="form-control" value="<?php echo $data['company_speciality'];?>" required readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Telepon</span></div>
                                                                                <input type="text" name="phone" class="form-control" value="<?php echo $data['phone'];?>" required readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Syarat Magang</span></div>
                                                                                <input type="text" name="intern_policies" class="form-control" value="<?php echo $data['intern_policies'];?>" required readonly>
                                                                            </div>
                                                                             <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Author Bukaan</span></div>
                                                                                <input type="text" name="author" class="form-control" value="<?php echo $data['author'];?>" required readonly>
                                                                            </div>
                                                                         </div>
                                                                         <div class="modal-footer">
                                                                             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                         </div>
                                                                         <?php } ?>
                                                                     </div>
                                                                </div>
                                                            </div>
                                                            <!--modal for edit Vacancy-->
                                                            <div class="modal fade" id="editVacancy<?php echo $nomor;?>">
                                                                 <div class="modal-dialog">
                                                                     <form method="post">
                                                                     <div class="modal-content">
                                                                         <div class="modal-header">
                                                                             <h4 class="modal-title">Edit Vacancy</h4>
                                                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                         </div>
                                                                         <div class="modal-body">
                                                                             <?php
                                                                                $id_user = $dataapp['vacancies_id'];
                                                                                $query = $superadmin->viewVacancyDetail($id_user);
                                                                                while ($data = $query->fetch_assoc()){ 
                                                                              ?>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">ID Bukaan</span></div>
                                                                                <input type="text" name="vacancies_id" class="form-control" value="<?php echo $data['vacancies_id'];?>" required readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">ID Perusahaan</span></div>
                                                                                <input type="text" name="company_id" class="form-control" value="<?php echo $data['company_id'];?>" required>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Nama Perusahaan</span></div>
                                                                                <input type="text" name="company_name" class="form-control" value="<?php echo $data['company_name'];?>" required>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Judul Bukaan</span></div>
                                                                                <input type="text" name="vacancy_title" class="form-control" value="<?php echo $data['vacancy_title'];?>" required>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Alamat</span></div>
                                                                                <input type="text" name="company_address" class="form-control" value="<?php echo $data['company_address'];?>" required>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Bidang / Job Desc</span></div>
                                                                                <input type="text" name="company_speciality" class="form-control" value="<?php echo $data['company_speciality'];?>" required>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Telepon</span></div>
                                                                                <input type="text" name="phone" class="form-control" value="<?php echo $data['phone'];?>" required>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Syarat Magang</span></div>
                                                                                <input type="text" name="intern_policies" class="form-control" value="<?php echo $data['intern_policies'];?>" required >
                                                                            </div>
                                                                             <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Author Bukaan</span></div>
                                                                                <input type="text" name="author" class="form-control" value="<?php echo $data['author'];?>" required>
                                                                            </div>
                                                                         </div>
                                                                         <div class="modal-footer">
                                                                             <input type="submit" name="update-vacancy" value="Update Data!" class="btn btn-primary">
                                                                             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                         </div>
                                                                         <?php } ?>
                                                                     </div>
                                                                     </form>
                                                                 </div>
                                                            </div>
                                                            <!--modal for delete Vacancy-->
                                                            <div class="modal fade" id="deleteVacancy<?php echo $nomor;?>">
                                                                 <div class="modal-dialog">
                                                                     <div class="modal-content">
                                                                         <div class="modal-header">
                                                                             <h4 class="modal-title">Hapus Vacancy</h4>
                                                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                         </div>
                                                                         <div class="modal-body">
                                                                             <h4 align="center">
                                                                                 <?php $id = $dataapp['vacancies_id'];?>
                                                                                 Apakah anda yakin ingin menghapus Bukaan Magang dengan ID <?php echo $id;?>
                                                                                 <strong><span class="grt"></span></strong>?
                                                                             </h4>
                                                                         </div>
                                                                         <div class="modal-footer">
                                                                             <form method="post">
                                                                                 <input type="hidden" name="company_id" value="<?php echo $id;?>">
                                                                                 <input type="submit" name="delete-vacancy" value="Hapus"! class="btn btn-danger">
                                                                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                             </form>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-application" role="tabpanel" aria-labelledby="v-pills-application-tab">
                            <div class="container" style="padding-top:20px;padding-bottom:20px;">
                                <div class="row">
                                    <div class="col text-left">
                                        <h4>Application</h4>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="table-responsive shadow-sm">
                                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size:14px;">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>ID Aplikasi</th>
                                                        <th>Nama Perusahaan</th>
                                                        <th>Nama Siswa</th>
                                                        <th>Status Lowongan</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $query_view = $superadmin->viewApplication();
                                                        $nomor = 1;
                                                        while ($dataapp = $query_view->fetch_assoc()){ 
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $nomor++; ?></td>
                                                        <td><?php echo $dataapp["application_id"];?></td>
                                                        <td><?php echo $dataapp["company_name"];?></td>
                                                        <td><?php echo $dataapp["student_name"];?></td>
                                                        <td>
                                                            <?php 
                                                                $status = $dataapp["status"];
                                                                if ($status ==1){echo "Processing";}
                                                                else if ($status==2){echo "Accepted";}
                                                                else{echo "Rejected!";}
                                                            ?>
                                                        </td>
                                                        <td colspan="2" class="text-center">
                                                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewApplication<?php echo $nomor;?>"><i class='far fa-list-alt'></i>&nbsp;Detail</a>
                                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editApplication<?php echo $nomor;?>"><i class='far fa-edit'></i>&nbsp;Edit</a>  
                                                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteApplication<?php echo $nomor;?>"><i class='far fa-trash-alt'></i>&nbsp;Delete</a>
                                                            <!-- =================== Application ===================-->
                                                            <!--modal for view Application-->
                                                            <div class="modal fade" id="viewApplication<?php echo $nomor;?>">
                                                                 <div class="modal-dialog">
                                                                     <div class="modal-content">
                                                                         <div class="modal-header">
                                                                             <h4 class="modal-title">Rincian Application</h4>
                                                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                         </div>
                                                                         <div class="modal-body">
                                                                             <?php
                                                                                $id_user = $dataapp['application_id'];
                                                                                $query = $superadmin->viewApplicationDetail($id_user);
                                                                                while ($data = $query->fetch_assoc()){ 
                                                                              ?>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">ID Pengajuan Magang</span></div>
                                                                                <input type="text" name="application_id" class="form-control" value="<?php echo $data['application_id'];?>" readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">ID Student</span></div>
                                                                                <input type="text" name="student_id" class="form-control" value="<?php echo $data['student_id'];?>" readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">ID Perusahaan</span></div>
                                                                                <input type="text" name="company_id" class="form-control" value="<?php echo $data['company_id'];?>" readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">ID Bukaan Magang</span></div>
                                                                                <input type="text" name="vacancies_id" class="form-control" value="<?php echo $data['vacancies_id'];?>" readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Nama Perusahaan</span></div>
                                                                                <input type="text" name="company_name" class="form-control" value="<?php echo $data['company_name'];?>" required readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Judul Bukaan</span></div>
                                                                                <input type="text" name="vacancy_title" class="form-control" value="<?php echo $data['vacancy_title'];?>" required readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Alamat</span></div>
                                                                                <input type="text" name="company_address" class="form-control" value="<?php echo $data['company_address'];?>" required readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Email Perusahaan</span></div>
                                                                                <input type="text" name="company_email" class="form-control" value="<?php echo $data['company_email'];?>" required readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Nama Student</span></div>
                                                                                <input type="text" name="student_name" class="form-control" value="<?php echo $data['student_name'];?>" required readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Alamat Student</span></div>
                                                                                <input type="text" name="student_address" class="form-control" value="<?php echo $data['student_address'];?>" required readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Status Aplikasi</span></div>
                                                                                <input type="text" name="status" class="form-control" value="<?php echo $data['status'];?>" required readonly>
                                                                            </div>
                                                                              <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">Berkas Pengajuan</span>
                                                                                </div>
                                                                                  <?php
                                                                                    if($data['file_pengajuan']==NULL){
                                                                                        echo '<input type="text" class="form-control" value="TIDAK TERSEDIA" required readonly>';
                                                                                    }else{
                                                                                  ?>
                                                                                        <a href="../student/application/<?php echo $data['file_pengajuan'];?>" target="_blank" class="btn btn-primary btn-sm">Lihat Surat</a>
                                                                                <?php } ?>
                                                                            </div>             
                                                                             <br>
                                                                            <p class="text-left">
                                                                                Status aplikasi:<br>
                                                                                <i>1 = Processing</i><br>
                                                                                <i>2 = Accepted</i><br>
                                                                                <i>3 = Rejected</i><br>
                                                                            </p> 
                                                                         </div>
                                                                         <div class="modal-footer">
                                                                             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                         </div>
                                                                         <?php } ?>
                                                                     </div>
                                                                 </div>
                                                            </div>
                                                            <!--modal for edit Application-->
                                                            <div class="modal fade" id="editApplication<?php echo $nomor;?>">
                                                                 <div class="modal-dialog">
                                                                     <form method="post">
                                                                     <div class="modal-content">
                                                                         <div class="modal-header">
                                                                             <h4 class="modal-title">Edit Application</h4>
                                                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                         </div>
                                                                         <div class="modal-body">
                                                                             <?php
                                                                                $id_user = $dataapp['application_id'];
                                                                                $query = $superadmin->viewApplicationDetail($id_user);
                                                                                while ($data = $query->fetch_assoc()){
                                                                              ?>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">ID Pengajuan Magang</span></div>
                                                                                <input type="text" name="application_id" class="form-control" value="<?php echo $data['application_id'];?>" readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">ID Student</span></div>
                                                                                <input type="text" name="student_id" class="form-control" value="<?php echo $data['student_id'];?>" readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">ID Perusahaan</span></div>
                                                                                <input type="text" name="company_id" class="form-control" value="<?php echo $data['company_id'];?>" readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">ID Bukaan Magang</span></div>
                                                                                <input type="text" name="vacancies_id" class="form-control" value="<?php echo $data['vacancies_id'];?>" readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Nama Perusahaan</span></div>
                                                                                <input type="text" name="company_name" class="form-control" value="<?php echo $data['company_name'];?>" required>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Judul Bukaan</span></div>
                                                                                <input type="text" name="vacancy_title" class="form-control" value="<?php echo $data['vacancy_title'];?>" required>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Alamat</span></div>
                                                                                <input type="text" name="company_address" class="form-control" value="<?php echo $data['company_address'];?>" required>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Email Perusahaan</span></div>
                                                                                <input type="text" name="company_email" class="form-control" value="<?php echo $data['company_email'];?>" required>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Nama Student</span></div>
                                                                                <input type="text" name="student_name" class="form-control" value="<?php echo $data['student_name'];?>" required>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Alamat Student</span></div>
                                                                                <input type="text" name="student_address" class="form-control" value="<?php echo $data['student_address'];?>" required>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Status Aplikasi</span></div>
                                                                                <input type="text" name="status" class="form-control" value="<?php echo $data['status'];?>" required>
                                                                            </div>
                                                                             <br>
                                                                            <p class="text-left">
                                                                                Status aplikasi:<br>
                                                                                <i>1 = Processing</i><br>
                                                                                <i>2 = Accepted</i><br>
                                                                                <i>3 = Rejected</i><br>
                                                                            </p> 
                                                                         </div>
                                                                         <div class="modal-footer">
                                                                             <input type="submit" name="update-application" value="Update Data!" class="btn btn-primary">
                                                                             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                         </div>
                                                                        <?php } ?>
                                                                     </div>
                                                                     </form>
                                                                 </div>
                                                            </div>
                                                            <!--modal for delete Application-->
                                                            <div class="modal fade" id="deleteApplication<?php echo $nomor;?>">
                                                                 <div class="modal-dialog">
                                                                     <div class="modal-content">
                                                                         <div class="modal-header">
                                                                             <h4 class="modal-title">Hapus Application</h4>
                                                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                         </div>
                                                                         <div class="modal-body">
                                                                             <h4 align="center">
                                                                                 <?php $id = $dataapp['application_id'];?>
                                                                                 Apakah anda yakin ingin menghapus Pengajuan Magang dengan ID <?php echo $id;?>
                                                                                 <strong><span class="grt"></span></strong>?
                                                                             </h4>
                                                                         </div>
                                                                         <div class="modal-footer">
                                                                             <form method="post">
                                                                                 <input type="hidden" name="application_id" value="<?php echo $id;?>">
                                                                                 <input type="submit" name="delete-application" value="Hapus"! class="btn btn-danger">
                                                                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            </form>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-request" role="tabpanel" aria-labelledby="v-pills-request-tab">
                            <div class="container" style="padding-top:20px;padding-bottom:20px;">
                                <div class="row">
                                    <div class="col text-left">
                                        <h4>Request</h4>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-sm-8">
                                        <div class="card shadow-sm">
                                            <div class="card-body">
                                                <div class="table-responsive shadow-sm">
                                                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size:14px;">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Judul Request</th>
                                                                <th>Detail Request</th>
                                                                <th>Status</th>
                                                                <th>Surat Pernyataan</th>
                                                                <th class="text-center">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!--Here contains function for see upload-->
                                                            <?php
                                                                $query_view = $superadmin->viewRequest();
                                                                $nomor = 1;
                                                                while ($dataapp = $query_view->fetch_assoc()){ 
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $nomor++; ?></td>
                                                                <td><?php echo $dataapp["req_title"];?></td>
                                                                <td><?php echo $dataapp["req_detail"];?></td>
                                                                <td><?php echo $dataapp["status"];?></td>
                                                                <td><?php
                                                                        if($dataapp['formal_letter']==NULL){
                                                                            echo "N/A";
                                                                        }else{
                                                                    ?>
                                                                    <a href="../student/request/<?php echo $dataapp['formal_letter'];?>" target="_blank">Lihat Surat</a>
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewReq<?php echo $nomor;?>"><i class='far fa-list-alt'></i>&nbsp;Detail</a>
                                                            <!--modal for view Detail-->
                                                            <div class="modal fade" id="viewReq<?php echo $nomor;?>">
                                                                 <div class="modal-dialog">
                                                                     <div class="modal-content">
                                                                         <div class="modal-header">
                                                                             <h4 class="modal-title">Rincian Request</h4>
                                                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                         </div>
                                                                         <div class="modal-body">
                                                                             <?php
                                                                                $id = $dataapp['req_id'];
                                                                                $query = $superadmin->viewRequestDetail($id);
                                                                                while ($data = $query->fetch_assoc()){ 
                                                                              ?>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">ID Request</span></div>
                                                                                <input type="text" name="req_id" class="form-control" value="<?php echo $data['req_id'];?>" readonly>
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend"><span class="input-group-text">Judul Request</span></div>
                                                                                <input type="text" name="req_title" class="form-control" value="<?php echo $data['req_title'];?>" readonly>
                                                                            </div>
                                                                             <br>
                                                                                <div class="card">
                                                                                    <div class="card-header"><h4>Rincian Request</h4></div>
                                                                                    <div class="card-body">
                                                                                        <p class="card-text"><?php echo $data['req_detail'];?></p>
                                                                                    </div>
                                                                                </div>
                                                                         </div>
                                                                         <div class="modal-footer">
                                                                             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                         </div>
                                                                         <?php } ?>
                                                                     </div>
                                                                 </div>
                                                            </div>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-chats" role="tabpanel" aria-labelledby="v-pills-chats-tab">
                            <div class="row shadow-sm" style="background-color: #f8f8f8;">
                                <div class="col text-left" style="padding-top:20px;padding-bottom:20px;">
                                    <h3>Live Chat Session</h3>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col" style="padding-top:20px;padding-bottom:20px;">
                                    <a href="chat_student/chat_dashboard.php" target="_blank">
                                        <div class="jumbotron shadow bg-primary" style="color:white;">
                                            <h5><i class='fas fa-graduation-cap'></i> &nbsp;Live Chat Dengan Student</h5><hr>
                                            <h6 style="font-style:italic;">Daftar Baru at : <?php echo $studentLastEntry; ?></h6>
                                        </div>
                                    </a>
                                </div>
                                <div class="col" style="padding-top:20px;padding-bottom:20px;">
                                    <a href="chat_company/chat_dashboard.php" target="_blank">
                                        <div class="jumbotron shadow bg-info" style="color:white;">
                                            <h5><i class='fas fa-building'></i> &nbsp;Live Chat Dengan Company</h5><hr>
                                            <h6 style="font-style:italic;">Daftar Baru at : <?php echo $companyLastEntry;?></h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include ('../footer.php');?>
    </body>
    <?php
        if(isset($_POST['update-student'])){
            $student_id = $_POST['student_id'];
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $student_number = $_POST['student_number'];
            $institution_name = $_POST['institution_name'];
            $course = $_POST['course'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $update_student = $superadmin->editStudent($student_id,$fullname,$username,$student_number,$institution_name,$course,$address,$phone,$email);
            if ($update_student==1){echo "<script>alert('Data Student Berhasil di ubah!');location = 'dashboard.php';</script>";}
            elseif ($update_student==2){echo "<script>alert('Format Nomor Telepon Salah!');location = 'dashboard.php';</script>";}
            else{echo "<script>alert('Error!Silakan coba lagi!');location = 'dashboard.php';</script>";}
        }
        else if(isset($_POST['delete-student'])){
            $student_id = $_POST['student_id'];
            $delete_student = $superadmin->deleteStudent($student_id);
            if ($delete_student==1){echo "<script>alert('Data Student Berhasil di hapus!');location = 'dashboard.php';</script>";}
            else{echo "<script>alert('Error!Silakan coba lagi!');location = 'dashboard.php';</script>";}
        }
        else if(isset($_POST['update-company'])){
            $company_id = $_POST['company_id'];
            $company_name = $_POST['company_name'];
            $username = $_POST['username'];
            $siup = $_POST['siup'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $update_company = $superadmin->editCompany($company_id,$company_name,$username,$siup,$address,$phone,$email);
            if ($update_company==1){echo "<script>alert('Data Company Berhasil di ubah!');location = 'dashboard.php';</script>";}
            elseif ($update_company==2){echo "<script>alert('Format Nomor Telepon Salah!');location = 'dashboard.php';</script>";}
            else{echo "<script>alert('Error!Silakan coba lagi!');location = 'dashboard.php';</script>";}
        }
        else if(isset($_POST['delete-company'])){
            $company_id = $_POST['company_id'];
            $delete_company = $superadmin->deleteCompany($company_id);
            if ($delete_company==1){echo "<script>alert('Data Company Berhasil di hapus!');location = 'dashboard.php';</script>";}
            else{echo "<script>alert('Error!Silakan coba lagi!');location = 'dashboard.php';</script>";}
        }
        else if(isset($_POST['update-vacancy'])){
            $vacancies_id = $_POST['vacancies_id'];
            $company_id = $_POST['company_id'];
            $company_name = $_POST['company_name'];
            $vacancy_title = $_POST['vacancy_title'];
            $company_address = $_POST['company_address'];
            $phone = $_POST['phone'];
            $intern_policies = $_POST['intern_policies'];
            $author = $_POST['author'];
            $update_vacancy = $superadmin->editVacancy($vacancies_id,$company_id,$company_name,$vacancy_title,$company_address,$phone,$intern_policies,$author);
            if ($update_vacancy==1){echo "<script>alert('Data Vacancy Berhasil di ubah!');location = 'dashboard.php';</script>";}
            elseif ($update_vacancy==2){echo "<script>alert('Format Nomor Telepon Salah!');location = 'dashboard.php';</script>";}
            else{echo "<script>alert('Error!Silakan coba lagi!');location = 'dashboard.php';</script>";}
        }
        else if(isset($_POST['delete-vacancy'])){
            $vacancies_id = $_POST['vacancies_id'];
            $delete_vacancy = $superadmin->deleteVacancy($vacancies_id);
            if ($delete_vacancy==1){echo "<script>alert('Data Vacancy Berhasil di hapus!');location = 'dashboard.php';</script>";}
            else{echo "<script>alert('Error!Silakan coba lagi!');location = 'dashboard.php';</script>";}
        }
        else if(isset($_POST['update-application'])){
            $application_id = $_POST['application_id'];
            $vacancies_id = $_POST['vacancies_id'];
            $company_id = $_POST['company_id'];
            $company_name = $_POST['company_name'];
            $vacancy_title = $_POST['vacancy_title'];
            $company_address = $_POST['company_address'];
            $company_email = $_POST['company_email'];
            $student_name = $_POST['student_name'];
            $student_address = $_POST['student_address'];
            $status = $_POST['status'];
            $update_application = $superadmin->editApplication($application_id,$student_id,$company_id,$vacancies_id,$company_name,$vacancy_title,$company_address,$company_email,$student_name,$student_address,$status);
            if ($update_application==1){echo "<script>alert('Data Application Berhasil di ubah!');location = 'dashboard.php';</script>";}
            else{echo "<script>alert('Error!Silakan coba lagi!');location = 'dashboard.php';</script>";}
        }
        else if(isset($_POST['delete-application'])){
            $application_id = $_POST['application_id'];
            $delete_app = $superadmin->deleteApplication($application_id);
            if ($delete_app==1){echo "<script>alert('Data Application Berhasil di hapus!');location = 'dashboard.php';</script>";}
            else{echo "<script>alert('Error!Silakan coba lagi!');location = 'dashboard.php';</script>";}
        }
    ?>
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/fontawesome/js/all.min.js"></script>
    <script>jQuery(document).ready(function() { new WOW().init(); });</script>
    <script>
        $(document).ready(function(){
            function load_unseen_notification(view = ''){
                $.ajax({
                    url:"fetch.php",
                    method:"POST",
                    data:{view:view},
                    dataType:"json",
                    success:function(data){
                        $('.dropdown-menu').html(data.notification);
                        if(data.unseen_notification > 0){
                            $('.count').html(data.unseen_notification);
                        }
                    }
                });
            }
            load_unseen_notification();
        $(document).on('click', '.dropdown-toggle', function(){
            $('.count').html('');
            load_unseen_notification('yes');
        });
            setInterval(function(){ 
                load_unseen_notification();; 
            }, 5000);
        });
</script>
</html>