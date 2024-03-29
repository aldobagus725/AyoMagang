<?php
	session_start();
	include'koneksi.php';

	if(!isset($_SESSION['company'])){
        echo "<script>alert('Silahkan login terlebih dahulu!');</script>";
        echo "<script>location='login.php';</script>";
    }

	$query = $koneksi->query("SELECT * FROM open_app JOIN company ON open_app.id_perusahaan = company.id_perusahaan WHERE id_openapp = '$_GET[id]'");
	$data  = $query->fetch_assoc(); 

	// Mengambil id url
	$valid_url = $data['id_perusahaan'];
	// Mengambil id user
	$user_login = $_SESSION['company']['id_perusahaan'];
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
		<title>Ayo Magang | Detail Lowongan </title>

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
							<h3 class="card-title">Ayo buat lowongan kerja, dan temukan calon tenaga ahlimu</h3>
						</div>
						<div class="card-body">
							<form method="POST" class="form-horizontal">
								<div class="form-group">
									<label class="control-label">Nama Perusahaan</label>
									<input type="text" class="form-control" name="nama" required="" value="<?php echo $data['nama_perusahaan']; ?>" readonly>
								</div>
								<div class="form-group">
									<label class="control-label">Author</label>
									<input type="text" class="form-control" name="author" required="" value="<?php echo $data['author']; ?>" readonly>
								</div>
								<div class="form-group">
									<label class="control-label">Alamat</label>
									<textarea class="form-control" name="alamat" rows="2" required="" value="" readonly=""><?php echo $data['alamat']; ?></textarea>		
								</div>
								<div class="form-group">
									<label class="control-label">Telepon</label>
									<input type="text" class="form-control" name="telepon" required="" value="<?php echo $data['telepon']; ?>" readonly>		
								</div>
								<div class="form-group">
									<label class="control-label">Bidang Perusahaan</label>
									<input type="text" class="form-control" name="bidang" required="" value="<?php echo $data['bidang_perusahaan']; ?>" readonly>
								</div>
								<div class="form-group">
									<label class="control-label">Syarat Magang</label>
									<textarea class="form-control" name="syarat" rows="2" required="" value="" readonly=""><?php echo $data['syarat_magang']; ?></textarea>		
								</div>
								<div class="form-group">
									<a href="index.php" class="btn btn-primary"> Kembali</a>
								</div>
							</form>
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