<!--local navbar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="dashboardcom.php">
            <img src="../assets/img/logo/logo%20putih.png">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link scroll-link" href="dashboardcom.php">
                        <i class='fas fa-arrow-left'></i>
                        Kembali Ke Dashboard
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link scroll-link" href="#footer">Butuh Bantuan?</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <?php echo $_SESSION['company']['company_name']; ?>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="myprofilecom.php">My Profile</a>
                        <a class="dropdown-item" onclick="return confirm('Yakin Logout?')" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>