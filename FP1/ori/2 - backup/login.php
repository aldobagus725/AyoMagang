<?php
	session_start();
    include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Ayo Magang | Login</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<body>
		<?php include 'menu.php'; ?>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-md-4 offset-md-4">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Login</h3>
						</div>
						<div class="card-body">
							<form method="POST" class="form-horizontal">
								<div class="form-group">
									<label class="control-label">ID</label>
									<input type="text" class="form-control" name="username" required="" placeholder="Masukkan Email or Username...">
								</div>
								<div class="form-group">
									<label class="control-label">Password</label>
									<input type="password" class="form-control" name="password" required="" placeholder="Masukkan Password...">
								</div>
								<div class="form-group">
									<button class="btn btn-primary" name="login">Login</button>
								</div>
							</form>
							<?php
								if(isset($_POST['login'])){
									$username = $_POST['username'];
									$password = $_POST['password'];
									//Mengambil data email dan password pada tabel "company"
									//Login berdasarkan username dan email
									$query = $koneksi->query("SELECT * FROM company WHERE 
										(email    = '$username' OR username = '$username' ) AND 
										 password = '$password'");
									//Menghitung data(akun)
									$data = $query->num_rows;
									//Jika akun ada yang cocok
									if($data == 1){
										$akun = $query->fetch_assoc(); 
										$_SESSION['company'] = $akun;
										echo "<div class='alert alert-info'>Login Successful!</div>";
										echo "<script>location='index.php';</script>";
									}
									//Jika akun tidak ada yang cocok
									else{
										echo "<div class='alert alert-danger'>You failed to login, please try again!</div>";
										echo "<meta http-equiv='refresh' content='1; url=login.php'>"; 
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
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script></body>
</html>