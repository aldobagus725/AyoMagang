<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="/ayomagang/index.php">Ayo Magang</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="container">
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			    <li class="nav-item active">
			    	<a class="nav-link" href="/ayomagang/index.php">Home <span class="sr-only">(current)</span></a>
			    </li>
			    <!-- Jika sudah login -->
			    <?php if(isset($_SESSION['company'])) : ?>
			        <li class="nav-item dropdown">
					   	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    	Lowongan
					    </a>
					    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					        <a class="dropdown-item" href="buka-lowongan.php?id=<?php echo $_SESSION['company']['company_id'] ?>">Buka Lowongan</a>
					        <a class="dropdown-item" href="list-lowongan.php?id=<?php echo $_SESSION['company']['company_id'] ?>">Lihat Lowongan</a>
					    </div>
					</li>
<!--
					<li class="nav-item">
        				<a class="nav-link" href="#">Penerimaan</a>
     				</li>
        			<li class="nav-item">
        				<a class="nav-link" href="#">Hubungi Kami</a>
     				</li>
-->
			    <!-- Jika belum login -->
			    <?php else : ?>
					<!-- <li class="nav-item">
				    	<a class="nav-link" href="daftar.php">Daftar</a>
				    </li> -->
        			<li class="nav-item">
        				<a class="nav-link" href="register-company.php">Daftar</a>
     				</li>
				    <li class="nav-item">
				        <a class="nav-link" href="login.php">Login</a>
				    </li>
				<?php endif ?>
			</ul>

			<!-- Jika sudah login -->
			<?php if(isset($_SESSION['company'])) : ?>
			<ul class="navbar-nav">
			    <li class="nav-item">
			        <a class="nav-link" href="index.php"><?php echo $_SESSION['company']['company_name']; ?></a>
			    </li>
			    <li class="nav-item">
			        <a class="nav-link" href="logout.php">Logout</a>
			    </li>
			</ul>
			<?php endif ?>
			<!-- <form class="form-inline my-2 my-lg-0" action="pencarian.php" method="get">
				<input class="form-control mr-sm-2" type="search" name="keyword" placeholder="" aria-label="Search">
			    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form> -->
		</div>
	</div>
</nav>