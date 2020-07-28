<?php
	session_start();
	include'../koneksi.php';
?>
<!-- Required meta tags -->
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo $_SESSION['student']['fullname']; ?></title>
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
			                <a class="nav-link scroll-link" href="#about-us">Daftar Aplikasi Kamu</a>
			            </li>
			            <li class="nav-item">
			                <a class="nav-link scroll-link" href="#portfolio">Kerjasama</a>
			            </li>
			            <li class="nav-item">
			                <a class="nav-link scroll-link" href="#testimonials">My Profile</a>
			            </li>
                        <li class="nav-item">
			                <a class="nav-link" href="logout.php">Logout</a>
			            </li>
			        </ul>
			    </div>
		    </div>
		</nav>
        <!-- Home -->
        <div class="top-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 text">
                        <h1 class="wow fadeInLeftBig">Halo <?php echo $_SESSION['student']['fullname']; ?>!</h1>
                        <div class="description wow fadeInLeftBig">
                            <p>Yuk Langsung Cari Magang Akademikmu!</p>
                        </div>
                        <div class="top-big-link wow fadeInUp">
                        	<input class="form-control mr-sm-2" type="text" placeholder="Nama Jurusan, Bidang Studi, contoh : Sistem Informasi">
                            <br/>
                            <a href="applist.php"><button class="btn btn-success" type="submit">Cari</button></a>
                        </div>
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
	            	<div class="col about-us-box wow fadeInLeft">
	                    <div class="about-us-box-text">
                            <center>
                                <h1>Daftar Aplikasi Kamu</h1>
                                <hr>
                                <table class="table table-borderless table-hover table-dark">
                                <tr>
                                    <th>ID Aplikasi</th>
                                    <th>ID Lowongan</th>
                                    <th>ID Kamu</th>
                                    <th>ID Perusahaan</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Alamat Perusahaan</th>
                                    <th>Email Perusahaan</th>
                                    <th>Nama Kamu</th>
                                    <th>Status Lowongan Kamu</th>
                                </tr>
                                <?php
                                $id_student = $_SESSION['student']['student_id'];
                                $query = mysqli_query($koneksi,"SELECT * FROM application where student_id = $id_student");
                                if(mysqli_num_rows($query)>0){
                                    while($data = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?php echo $data["application_id"];?></td>
                                    <td><?php echo $data["vacancies_id"];?></td>
                                    <td><?php echo $data["student_id"];?></td>
                                    <td><?php echo $data["company_id"];?></td>
                                    <td><?php echo $data["company_name"];?></td>
                                    <td><?php echo $data["company_address"];?></td>
                                    <td><?php echo $data["company_email"];?></td>
                                    <td><?php echo $data["student_name"];?></td>
                                    <td><?php echo $data["status"];?></td>
                                </tr>
                                    <?php }} ?>
                            </table>
                            </center>
                            <br>
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
	                    <h2>Kerjasama kami</h2>
	                    <div class="divider-1 wow fadeInUp"><span></span></div>
	                    <p>Kita telah bekerja sama dengan lebih dari 50 perusahaan yang siap menerima kalian sesuai jurusan kalian</p>
	                </div>
	            </div>
	            <div class="row">
                	<div class="col-md-4 portfolio-box wow fadeInUp">
	                	<div class="portfolio-box-image">
	                		<img src="assets/img/portfolio/1.jpg" alt="" data-at2x="assets/img/portfolio/1.jpg">
	                	</div>
                		<h3><a href="#">Perusahaan A</a> <i class="fas fa-angle-right"></i></h3>
                		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                    </div>
                    <div class="col-md-4 portfolio-box wow fadeInDown">
	                	<div class="portfolio-box-image">
	                		<img src="assets/img/portfolio/2.jpg" alt="" data-at2x="assets/img/portfolio/2.jpg">
	                	</div>
                		<h3><a href="#">Perusahaan B</a> <i class="fas fa-angle-right"></i></h3>
                		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                    </div>
                    <div class="col-md-4 portfolio-box wow fadeInUp">
	                	<div class="portfolio-box-image">
	                		<img src="assets/img/portfolio/3.jpg" alt="" data-at2x="assets/img/portfolio/3.jpg">
	                	</div>
                		<h3><a href="#">Perusahaan C</a> <i class="fas fa-angle-right"></i></h3>
                		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                    </div>
                    <div class="col-md-4 portfolio-box wow fadeInUp">
	                	<div class="portfolio-box-image">
	                		<img src="assets/img/portfolio/3.jpg" alt="" data-at2x="assets/img/portfolio/3.jpg">
	                	</div>
                		<h3><a href="#">Perusahaan D</a> <i class="fas fa-angle-right"></i></h3>
                		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                    </div>
                    <div class="col-md-4 portfolio-box wow fadeInUp">
	                	<div class="portfolio-box-image">
	                		<img src="assets/img/portfolio/3.jpg" alt="" data-at2x="assets/img/portfolio/3.jpg">
	                	</div>
                		<h3><a href="#">Perusahaan E</a> <i class="fas fa-angle-right"></i></h3>
                		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                    </div>
                    <div class="col-md-4 portfolio-box wow fadeInUp">
	                	<div class="portfolio-box-image">
	                		<img src="assets/img/portfolio/3.jpg" alt="" data-at2x="assets/img/portfolio/3.jpg">
	                	</div>
                		<h3><a href="#">Perusahaan F</a> <i class="fas fa-angle-right"></i></h3>
                		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                    </div>
	            </div>
	            <div class="row">
	            	<div class="col section-bottom-button wow fadeInUp">
                        <a class="btn btn-primary btn-link-3" href="#">Muat Lebih Banyak</a>
	            	</div>
	            </div>
	        </div>
        </div>
        <!-- Testimonials -->
        <div class="testimonials-container section-container section-container-image-bg">
        	<div class="container">
        		<div class="row">
        			<div class="col testimonials section-description wow fadeIn">
                        <h2 style="color: white;">Profileku</h2>
                    </div>
        		</div>
        		<div class="row">
        			<div class="col-md-10 offset-md-1 testimonial-list wow fadeInUp">
        				<div class="tab-content" id="myTabContent">
        					<div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
        						<div class="testimonial-image">
                					<img src="assets/img/testimonials/1.jpg" alt="testimonial-1" data-at2x="assets/img/testimonials/1.jpg">
                				</div>
                				<div class="testimonial-text">
                                    <center>
                                     <table class="table table-dark table-hover">
                                        <tr>
                                            <th>ID Kamu</th><td><?php echo $_SESSION['student']['student_id']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Fullname</th><td><?php echo $_SESSION['student']['fullname']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>NIS/NIM</th><td><?php echo $_SESSION['student']['student_number']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Institusi</th><td><?php echo $_SESSION['student']['institution_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th><td><?php echo $_SESSION['student']['address']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th><td><?php echo $_SESSION['student']['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Telepon</th><td><?php echo $_SESSION['student']['phone']; ?></td>
                                        </tr>
                                    </table>
                                        </center>
                                </div>
        					</div>
        				</div>
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