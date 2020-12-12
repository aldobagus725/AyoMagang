<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ayo Magang</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container text-center">
        <br>
        <?php
            include "../koneksi.php";
            $token=$_GET['t'];
            $sql_cek=mysqli_query($koneksi,"SELECT * FROM company WHERE token='".$token."' and aktif='0'");
            $jml_data=mysqli_num_rows($sql_cek);
            if($jml_data>0){
                //update data company aktif
                $query = mysqli_query($koneksi,"UPDATE company SET aktif='1' WHERE token='".$token."' and aktif='0'");
                if($query){
                    $query = mysqli_query($koneksi, "UPDATE company SET token = NULL WHERE token='$token'");
                    echo '<div class="alert alert-success">Akun anda sudah aktif, silahkan <a href="login.php">Login</a></div>';
                }
            }else{echo '<div class="alert alert-warning">Invalid Token!</div>';}
        ?>
    </div>
    </body>
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</html>