<head>
    <style>
        a:hover{transition: .3s;}
        li.nav-item{font-size: 18px;padding: 7px 7px 7px 7px;}
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-no-bg">
    <div class="container">
        <?php if(isset($_SESSION['student'])) {?>
            <a class="navbar-brand" href="dashboard.php"><img src="../assets/img/logo/logo%20putih.png"></a>
        <?php }else if(isset($_SESSION['company'])){?>
            <a class="navbar-brand" href="dashboard.php"><img src="../assets/img/logo/logo%20putih.png"></a>
        <?php }else if(isset($_SESSION['superadmin'])){?>
            <a class="navbar-brand" href="dashboard.php"><img src="../assets/img/logo/logo%20putih.png"></a>
        <?php }else{  ?>
            <a class="navbar-brand" href="index.php"><img src="assets/img/logo/logo%20putih.png"></a>
        <?php }?> 

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav navbar-nav ml-auto">
                <!--student primary navbar-->
                <?php if(isset($_SESSION['student'])){?>
                <li class="nav-item">
                    <a class="nav-link scroll-link" href="#student-home">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll-link" href="#student-application">Daftar Aplikasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll-link" href="#footer">Butuh Bantuan?</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <?php echo $_SESSION['student']['fullname']; ?>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="myprofile.php">My Profile</a>
                        <a class="dropdown-item" onclick="return confirm('Yakin Logout?')" href="logout.php">Logout</a>
                    </div>
                </li>
                <!--company primary navbar-->
                <?php }else if(isset($_SESSION['company'])){?>
                <li class="nav-item">
                    <a class="nav-link scroll-link" href="#company-home">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll-link" href="#company-vacancy">Daftar Bukaan Lowongan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll-link" href="#company-application">Daftar Aplikasi Masuk</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <?php echo $_SESSION['company']['company_name']; ?>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="myprofile.php">My Profile</a>
                        <a class="dropdown-item" onclick="return confirm('Yakin Logout?')" href="logout.php">Logout</a>
                    </div>
                </li>
                <?php }else{  ?>
                <li class="nav-item">
                    <a class="nav-link scroll-link" href="#home">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll-link" href="#collaboration">Kerjasama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll-link" href="#about">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll-link" href="#footer">Kontak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll-link" href="student/login.php">Login</a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll-link" href="company/login.php">Posting Magang</a>
                </li>
                <?php }?>              
            </ul>
        </div>
    </div>
</nav>