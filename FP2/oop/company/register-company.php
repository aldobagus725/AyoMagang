<?php
session_start();
require '../core/company.php';

if (empty($_SESSION)) {
	echo "<script>alert('Silahkan login terlebih dahulu!');</script>";
	echo "<script>location='../login.php';</script>";
} elseif (!isset($_SESSION['company'])) {
	echo "<script>alert('403 Forbidden');</script>";
	echo "<script>location='../login.php';</script>";
	die;
}

$company = new company();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Ayo Magang | Daftar Company </title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 offset-sm-2">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Pemagang sudah menunggumu, ayo segera bergabung</h3>
					</div>
					<div class="card-body">
						<form method="POST" class="form-horizontal">
							<div class="form-group">
								<label class="control-label">Nama Perusahaan</label>
								<input type="text" class="form-control" name="company_name" required="">
							</div>
							<div class="form-group">
								<label class="control-label">Username</label>
								<input type="text" class="form-control" name="username" required="">
							</div>
							<div class="form-group">
								<label class="control-label">SIUP</label>
								<input type="text" class="form-control" name="siup" required="">
							</div>
							<div class="form-group">
								<label class="control-label">Alamat</label>
								<textarea class="form-control" name="address" rows="2"></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Telepon</label>
								<input type="text" class="form-control" name="phone" required="">
							</div>
							<div class="form-group">
								<label class="control-label">Email</label>
								<input type="email" class="form-control" name="email" required="">
							</div>
							<div class="form-group">
								<label class="control-label">Password</label>
								<input type="text" class="form-control" name="password" required="">
							</div>
							<div class="form-group">
								<button class="btn btn-primary" name="daftar">Bergabung</button>
							</div>
						</form>

						<?php
						if (isset($_POST['daftar'])) {
							$request = array(
								'company_name' => $_POST['company_name'],
								'username' => $_POST['username'],
								'siup' => $_POST['siup'],
								'address' => $_POST['address'],
								'phone' => $_POST['phone'],
								'email' => $_POST['email'],
								'password' => md5($_POST['password'])
							);

							$exec = $company->register_company($request);

							if ($exec == 0) {
								echo "<script>alert('Silahkan Lengkapi Data Departemen'); window.location = 'register-company.php';</script>";
							} elseif ($exec == 2) {
								echo "<script>alert('Nomor Telepon Tidak Valid'); window.location = 'register-company.php';</script>";
							} elseif ($exec == 3) {
								echo "<script>alert('Email atau Username telah terdaftar!'); window.location = 'register-company.php';</script>";
							} else {
								echo "<script>alert('Selamat Pendaftaran Berhasil!'); window.location = '../login.php';</script>";
							}
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
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>