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

$id = $_SESSION['company']['company_id'];
$query = $company->list_lowongan($id);
$data  = $query->fetch_assoc();

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
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 offset-sm-2">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Ayo buat lowongan magang akademik, dan temukan calon tenaga ahlimu</h3>
					</div>
					<div class="card-body">
						<form method="POST" class="form-horizontal">
							<div class="form-group">
								<label class="control-label">Nama Perusahaan</label>
								<input type="text" class="form-control" name="company_name" required value="<?php echo $data['company_name']; ?>" readonly>
							</div>
							<div class="form-group">
								<label class="control-label">Author</label>
								<input type="text" class="form-control" name="author" required>
							</div>
							<div class="form-group">
								<label class="control-label">Alamat</label>
								<textarea class="form-control" name="company_address" rows="2" required readonly><?php echo $data['address']; ?></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Telepon</label>
								<input type="text" class="form-control" name="phone" required value="<?php echo $data['phone']; ?>" readonly>
							</div>
							<div class="form-group">
								<label class="control-label">Bidang Perusahaan</label>
								<input type="text" class="form-control" name="company_speciality">
							</div>
							<div class="form-group">
								<label class="control-label">Syarat Magang</label>
								<textarea class="form-control" name="intern_policies" rows="2" required></textarea>
							</div>
							<div class="form-group">
								<button class="btn btn-primary" name="buat">Buat</button>
							</div>
						</form>
						<?php
						if (isset($_POST['buat'])) {
							//Mengambil data dan menyimpan divariabel

							$request = array(
								'company_id' => $_SESSION['company']['company_id'],
								'company_name' => $data['company_name'],
								'author' => $_POST['author'],
								'company_address' => $data['address'],
								'phone' => $data['phone'],
								'company_speciality' => $_POST['company_speciality'],
								'intern_policies' => $_POST['intern_policies']
							);

							$exec = $company->buka_lowongan($request);

							if ($exec == 1) {
								echo "<script>alert('Selamat, pembuatan buka lowongan berhasil!'); window.location = 'home.php';</script>";
							} else {
								echo "<script>alert('Silahkan Lengkapi Data Departemen'); window.location = 'buka_lowongan.php';</script>";
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