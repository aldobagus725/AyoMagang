<?php
	session_start();
	include'koneksi.php';

	if(!isset($_SESSION['company'])){
        echo "<script>alert('Silahkan login terlebih dahulu!');</script>";
        echo "<script>location='login.php';</script>";
    }

	$query = $koneksi->query("SELECT * FROM company WHERE company_id = '$_GET[id]'");
	$data  = $query->fetch_assoc(); 

	// Mengambil id url
	$valid_url = $data['company_id'];
	// Mengambil id user
	$user_login = $_SESSION['company']['company_id'];
	// Jika id url dengan id user tidak sesuai
	if($valid_url !== $user_login){
		echo "<script>alert('Data does not match!')</script>";
        echo "<script>location='index.php'</script>";
        exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Ayo Magang | Buka Lowongan </title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<body>
		<?php include 'menu.php'; ?>		
		<br>
		<div class="container">
			<div class="row">
				<div class="col-sm-8 offset-sm-2">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Form Bukaan Lowongan Magang Akademik</h3>
						</div>
						<div class="card-body">
							<form method="POST" class="form-horizontal">
								<div class="form-group">
									<label class="control-label">Nama Perusahaan</label>
									<input type="text" class="form-control" name="company_name" required="" value="<?php echo $data['company_name']; ?>" readonly>
								</div>
								<div class="form-group">
									<input type="hidden" class="form-control" name="company_id" required="" value="<?php echo $_SESSION['company']['company_id']; ?>" readonly>
								</div>
								<div class="form-group">
									<label class="control-label">Author</label>
									<input type="text" class="form-control" name="author" required="" value="">
								</div>
								<div class="form-group">
									<label class="control-label">Alamat</label>
									<textarea class="form-control" name="company_address" rows="2" required="" value="" readonly=""><?php echo $data['address']; ?></textarea>		
								</div>
								<div class="form-group">
									<label class="control-label">Telepon</label>
									<input type="text" class="form-control" name="phone" required="" value="<?php echo $data['phone']; ?>" readonly>		
								</div>
								<div class="form-group">
									<label class="control-label">Bidang Perusahaan</label>
									<input type="text" class="form-control" name="company_speciality" required="" value="">
								</div>
								<div class="form-group">
									<label class="control-label">Syarat Magang</label>
									<textarea class="form-control" name="intern_policies" rows="2" required="" value=""></textarea>		
								</div>
								<div class="form-group">
									<button class="btn btn-primary" name="buat">Buat</button>
								</div>
							</form>
							<?php
								if(isset($_POST['buat'])){
									//Mengambil data dan menyimpan divariabel
									$company_id = $_POST['company_id'];
									$company_name = $_POST['company_name'];
									$author = $_POST['author'];
									$company_address = $_POST['company_address'];
									$phone = $_POST['phone'];
									$company_speciality = $_POST['company_speciality'];
									$intern_policies = $_POST['intern_policies'];	
								    $koneksi->query("INSERT INTO vacancies (company_id,
																            company_name,
																            author,
                                                                            company_address,
									                                        address,
									                                        phone,
									                                        company_speciality,
									                                        intern_policies)
									                                    VALUES ('$company_id',
									                                    		'$company_name',
									                                    		'$author',
									                                            '$company_address',
									                                            '$phone',
									                                        	'$company_speciality',
									                                        	'$intern_policies')");
										echo "<script>alert('Selamat, pembuatan buka lowongan berhasil!');</script>";
                                        echo "<script>location='index.php';</script>";
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script></body>
</html>