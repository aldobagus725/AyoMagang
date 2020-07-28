<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include 'koneksi.php'
    ?>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Admin</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	<div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1>Super Admin</h1>  
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2 col-sm-offset-1"></div>
                    <div class="col-sm-10 col-sm-offset-5 show-forms">
                    	<span class="show-login-form active">Login</span>
                    </div>
                </div>
                <div class="row login-form">
                    <div class="col-sm-2 col-sm-offset-1"></div>
                    <div class="col-sm-4 col-sm-offset-1">
						<form role="form" action="" method="post" class="l-form">
	                    	<div class="form-group">
	                    		<label class="sr-only" for="l-form-username">Username</label>
	                        	<input type="text" name="l-form-username" placeholder="Username..." class="l-form-username form-control" id="l-form-username">
	                        </div>
	                        <div class="form-group">
	                        	<label class="sr-only" for="l-form-password">Password</label>
	                        	<input type="password" name="l-form-password" placeholder="Password..." class="l-form-password form-control" id="l-form-password">
	                        </div>
				            <button type="submit" class="btn" name="loginsadmin">Sign in!</button>
				    	</form>
                    </div>
                </div>
                <?php
                    if(isset($_POST['loginsadmin'])){
                    $username = $_POST['l-form-username'];
                    $password = $_POST['l-form-password'];
                    //Mengambil data email_pelanggan dan password_pelanggan pada tabel "pelanggan"
                    //Login berdasarkan username dan email
                    $query = $koneksi->query("SELECT * FROM superadmin WHERE 
                        (email    = '$username' OR username = '$username' ) AND 
                         password = '$password'");
                    //Menghitung data(akun)
                    $data = $query->num_rows;
                    //Jika akun ada yang cocok
                    if($data == 1){
                        $akun = $query->fetch_assoc(); 
                        $_SESSION['superadmin'] = $akun;
                        echo "<div class='alert alert-info'>Login Berhasil!</div>";
                        echo "<script>location='index.php';</script>";
                    }
                    //Jika akun tidak ada yang cocok
                    else{
                        echo "<div class='alert alert-danger'>Login Gagal!</div>";
                        echo "<meta http-equiv='refresh' content='1; url=login.php'>"; 
                    }
                }
            ?>           
                    
        	</div>
        </div>

        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        				<p>&copy;Ayo Magang<br/>
                            <a href="/ayomagang/index.php"><img src="/ayomagang/assets/img/logo.png"></a>
                        </p>
        			</div>
        			
        		</div>
        	</div>
        </footer>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>