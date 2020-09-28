<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="#">Ayo Magang</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="container">
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			    <li class="nav-item active">
			    	<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
			    </li>
                <li class="nav-item">
			    	<a class="nav-link" href="index.php">Students</a>
			    </li>
                <li class="nav-item">
			    	<a class="nav-link" href="index.php">Companies</a>
			    </li>
                <li class="nav-item">
			    	<a class="nav-link" href="/ayomagang/superadmin/datasets/application.php">Application</a>
			    </li>
                <li class="nav-item">
			    	<a class="nav-link" href="index.php">Vacancies</a>
			    </li>
			</ul>
			<!-- Jika sudah login -->
			<?php if(isset($_SESSION['superadmin'])) : ?>
			<ul class="navbar-nav">
			    <li class="nav-item">
			        <a class="nav-link" href="index.php"><?php echo $_SESSION['superadmin']['fullname']; ?></a>
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