<!doctype html>
	<?php
    session_start();
    ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Admin</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300">
		<link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/media-queries.css">
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    </head>
    <body>
		<!-- NavBar -->
		<nav class="navbar navbar-dark fixed-top navbar-expand-md navbar-no-bg">
			<div class="container">
				<a class="navbar-brand" href="index.php">Ayo Magang</a>
			    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			        <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse" id="navbarNav">
			        <ul class="navbar-nav ml-auto">
			            <li class="nav-item">
			                <a class="nav-link scroll-link" href="#top-content">Beranda</a>
			            </li>
			            <li class="nav-item">
			                <a class="nav-link scroll-link" href="#about-us">Students</a>
			            </li>
			            <li class="nav-item">
			                <a class="nav-link scroll-link" href="#portfolio">Companies</a>
			            </li>
			            <li class="nav-item">
			                <a class="nav-link scroll-link" href="#testimonials">Vacancies</a>
			            </li>
                        <li class="nav-item">
			                <a class="nav-link scroll-link" href="#portofolio2">Application</a>
			            </li>
                        <li class="nav-item">
			                <a class="nav-link scroll-link" href="#testimonials">Cancelation Request</a>
			            </li>
                        <!-- Jika Sudah Login -->
                        <?php if(isset($_SESSION['superadmin'])) : ?>
                            <li class="nav-item">
                                 <a class="nav-link" onclick="return confirm('Yakin Logout?')" href="/ayomagang/superadmin/logout.php">Logout</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                 <a class="nav-link" href="/ayomagang/superadmin/login.php">Login</a>
                            </li>
                        <?php endif ?>
			        </ul>
			    </div>
		    </div>
		</nav>
        <!-- Home -->
        <div class="top-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 text">
                        <h1 class="wow fadeInLeftBig">Halo <?php echo $_SESSION['superadmin']['fullname']; ?>!</h1>
                        <hr>
                        <h1 class="wow fadeInRightBig">Admin Is Still Under Construction</h1>
                    </div>
                </div>
            </div>            
        </div>
        <!-- Services -->
        <div class="services-container section-container">
	        <div class="container">
	            <div class="row">
	                <div class="col services section-description wow fadeIn">
	                    <h2 style="color: white;">Kenapa Ayo Magang?</h2>
	                    <div class="divider-1 wow fadeInUp"><span></span></div>
	                </div>
	            </div>
	            <div class="row">
                	<div class="col-md-4 services-box wow fadeInUp">
                		<div class="row">
                			<div class="col-md-4">
			                	<div class="services-box-icon">
			                		<i class="fas fa-magic"></i>
			                	</div>
		                	</div>
	                		<div class="col-md-8">
	                    		<h3 style="color: white">Banyak Pilihan</h3>
	                    		<p style="color: white;">Banyak pilihan perusahaan yang siap menerima kamu untuk magang!</p>
	                    	</div>
	                    </div>
                    </div>
                    <div class="col-md-4 services-box wow fadeInDown">
	                	<div class="row">
                			<div class="col-md-4">
			                	<div class="services-box-icon">
			                		<i class="fas fa-cog"></i>
			                	</div>
		                	</div>
	                		<div class="col-md-8">
	                    		<h3 style="color: white;">Kustomisasi bebas</h3>
	                    		<p style="color: white;">Bebas untuk mengatur pencarian sesuai kebutuhanmu! Sistem kita juga membantu menyediakan preferensi sesuai profil kamu!</p>
	                    	</div>
	                    </div>
                    </div>
                    <div class="col-md-4 services-box wow fadeInUp">
	                	<div class="row">
                			<div class="col-md-4">
			                	<div class="services-box-icon">
			                		<i class="fab fa-google"></i>
			                	</div>
		                	</div>
	                		<div class="col-md-8">
	                    		<h3 style="color: white;">Marketing</h3>
	                    		<p style="color: white;">Buat anda yang mencari anak magang, selain jadi recruiter, anda juga bisa promosi dan ekspose lebih luas terhadap brand anda!</p>
	                    	</div>
	                    </div>
                    </div>
	            </div>
	        </div>
        </div>

        <!-- About us -->
        <div class="about-us-container section-container section-container-gray-bg">
	        <div class="container">
	            <div class="row">
<!--	            	<div class="col-12 col-lg-7 about-us-box wow fadeInLeft">-->
                    <div class="col about-us-box wow fadeInLeft">
	                    <div class="about-us-box-text">
                            <center>
                                <h1>Students</h1>
                                <br>
                                <h3>Student List</h3>
                                <table class="table table-borderless table-hover table-dark">
                                <tr>
                                    <th>Application ID</th>
                                    <th>Residence ID</th>
                                    <th>Application Date</th>
                                    <th>Required Month</th>
                                    <th>Required Year</th>
                                    <th>Status</th>
                                    <th>Payment (Ringgit)</th>
                                    <th>Payment Status</th>
                                </tr>
                                <tr>
                                    <td>{{ $app->applicationID}}</td>
                                    <td>{{ $app->residenceID}}</td>
                                    <td>{{ $app->applicationDate}}</td>
                                    <td>{{ $app->requiredMonth}}</td>
                                    <td>{{ $app->requiredYear}}</td>
                                    <td>{{ $app->status}}</td>
                                    <td>{{ $app->payment}}</td>
                                    <td>{{ $app->payment_status}}</td>
                                </tr>
                            </table>
                            </center>
	                    </div>
	                </div>
	            </div>
	        </div>
        </div>
        <!-- Portfolio -->
        <div class="portfolio-container section-container">
	        <div class="container">
	            <div class="row">
	                <div class="col portfolio section-description wow fadeIn">
	                    <h2>Companies</h2>
                            <center>
                                <h3>Companies List</h3>
                                <table class="table table-borderless table-hover table-dark">
                                <tr>
                                    <th>Application ID</th>
                                    <th>Residence ID</th>
                                    <th>Application Date</th>
                                    <th>Required Month</th>
                                    <th>Required Year</th>
                                    <th>Status</th>
                                    <th>Payment (Ringgit)</th>
                                    <th>Payment Status</th>
                                </tr>
                                <tr>
                                    <td>{{ $app->applicationID}}</td>
                                    <td>{{ $app->residenceID}}</td>
                                    <td>{{ $app->applicationDate}}</td>
                                    <td>{{ $app->requiredMonth}}</td>
                                    <td>{{ $app->requiredYear}}</td>
                                    <td>{{ $app->status}}</td>
                                    <td>{{ $app->payment}}</td>
                                    <td>{{ $app->payment_status}}</td>
                                </tr>
                            </table>
                            </center>
	                </div>
	            </div>
	        </div>
        </div>
        <!-- Testimonials -->
        <div class="testimonials-container section-container section-container-image-bg">
        	<div class="container">
        		<div class="row">
        			<div class="col testimonials section-description wow fadeIn">
                        <h2 style="color: white;">Vacancies</h2>
                    </div>
        		</div>
        		<div class="row">
        			<div class="col-md-10 offset-md-1 testimonial-list wow fadeInUp">
        				<center>
                                <h3>Vacancies List</h3>
                                <table class="table table-borderless table-hover table-dark">
                                <tr>
                                    <th>Application ID</th>
                                    <th>Residence ID</th>
                                    <th>Application Date</th>
                                    <th>Required Month</th>
                                    <th>Required Year</th>
                                    <th>Status</th>
                                    <th>Payment (Ringgit)</th>
                                    <th>Payment Status</th>
                                </tr>
                                <tr>
                                    <td>{{ $app->applicationID}}</td>
                                    <td>{{ $app->residenceID}}</td>
                                    <td>{{ $app->applicationDate}}</td>
                                    <td>{{ $app->requiredMonth}}</td>
                                    <td>{{ $app->requiredYear}}</td>
                                    <td>{{ $app->status}}</td>
                                    <td>{{ $app->payment}}</td>
                                    <td>{{ $app->payment_status}}</td>
                                </tr>
                            </table>
                        </center>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- Portfolio -->
        <div class="portfolio-container section-container">
	        <div class="container">
	            <div class="row">
	                <div class="col portfolio2 section-description wow fadeIn">
	                    <h2>Companies</h2>
                            <center>
                                <h3>Companies List</h3>
                                <table class="table table-borderless table-hover table-dark">
                                <tr>
                                    <th>Application ID</th>
                                    <th>Residence ID</th>
                                    <th>Application Date</th>
                                    <th>Required Month</th>
                                    <th>Required Year</th>
                                    <th>Status</th>
                                    <th>Payment (Ringgit)</th>
                                    <th>Payment Status</th>
                                </tr>
                                <tr>
                                    <td>{{ $app->applicationID}}</td>
                                    <td>{{ $app->residenceID}}</td>
                                    <td>{{ $app->applicationDate}}</td>
                                    <td>{{ $app->requiredMonth}}</td>
                                    <td>{{ $app->requiredYear}}</td>
                                    <td>{{ $app->status}}</td>
                                    <td>{{ $app->payment}}</td>
                                    <td>{{ $app->payment_status}}</td>
                                </tr>
                            </table>
                            </center>
	                </div>
	            </div>
	        </div>
        </div>
        <!-- Footer -->
        <footer>
	        <div class="container">
	        	<div class="row"> 
                    <div class="col-sm-3 offset-md-1 footer-bottom"></div>
                </div>
                <div class="row">
                    <div class="col-sm-3 offset-md-1 footer-bottom"></div>
                </div>
<!--
                <div class="row">
                    <div class="col offset-md-1 footer-bottom">
                    	<a href="#"><i class="fab fa-facebook-f"></i></a>
						<a href="#"><i class="fab fa-twitter"></i></a>
						<a href="#"><i class="fab fa-instagram"></i></a>
						<a href="#"><i class="fab fa-pinterest"></i></a>
                        <br>
                        <a class="scroll-link" href="#top-content"><i class="fas fa-chevron-up"></i></a>
                    </div>
                </div>
-->
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-5 footer-bottom">
        				<div class="footer-border"></div>
        				<p>&copy;Ayo Magang<br/>
                            <img src="/ayomagang/assets/img/logo.png">
                        </p>
        			</div>
                </div>
	        </div>
        </footer>
        <!-- Javascript -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <script src="assets/js/jquery-migrate-3.0.0.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/waypoints.min.js"></script>
        <script src="assets/js/scripts.js"></script>
    </body>
</html>