<?php
session_start();

if (isset($_SESSION['company'])) {
    echo "<script>location='company/home.php';</script>";
    die;
} elseif (isset($_SESSION['student'])) {
    echo "<script>location='student/home.php';</script>";
    die;
} else {
    // echo "<script>alert('Silahkan login terlebih dahulu!');</script>";
}

require 'core/login.php';
$login = new login();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ayo Magang</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Ayo Magang</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <div class="container login-container">
        <div class="row">
            <div class="col-md-6 login-form-1">
                <h3>Student</h3>
                <form method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Your Email or Username *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Your Password *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" name="logstudent">
                    </div>
                    <div class="form-group">
                        <a href="#" class="ForgetPwd">Forget Password?</a>
                    </div>
                    <div class="form-group">
                        <p>Ingin menjadi sahabat magang ?</p>
                        <p>Klik di <a href="student/register-student.php" class="" style="text-decoration: none;"><b>Sini</b></a>
                            <p>
                    </div>
                </form>

                <?php
                if (isset($_POST['logstudent'])) {
                    $request = array(
                        'username' => $_POST['username'],
                        'password' => md5($_POST['password']),
                        'id' => 'student'
                    );

                    if ($login->login($request)) {
                        header("location: student/home.php");
                        die;
                    } else {
                        echo "<script>alert('Username atau Password Salah'); window.location = 'index.php';</script>";
                    }
                }
                ?>

            </div>
            <div class="col-md-6 login-form-2">
                <h3>Company</h3>
                <form method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Your Email or Username *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Your Password *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" name="logcompany">
                    </div>
                    <div class="form-group">
                        <a href="#" class="ForgetPwd" value="Login">Forget Password?</a>
                    </div>
                    <div class="form-group">
                        <p style="color: white;">Ingin mencari pemagang ?</p>
                        <p style="color: white;">Klik di <a href="company/register-company.php" class="" style="text-decoration: none; color: black;"><b>Sini</b></a>
                            <p>
                    </div>
                </form>

                <?php
                if (isset($_POST['logcompany'])) {
                    $request = array(
                        'username' => $_POST['username'],
                        'password' => md5($_POST['password']),
                        'id' => 'company'
                    );

                    if ($login->login($request)) {
                        header('location: company/home.php');
                        die;
                    } else {
                        echo "<script>alert('Username atau Password Salah'); window.location = 'login.php';</script>";
                    }
                }
                ?>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>