<?php
    include '../koneksi.php';
    if(!isset($_GET["code"])){
        exit("Can't find page");
    }

    $code = $_GET["code"];

    $getEmailQuery = mysqli_query($koneksi, "SELECT email FROM resetpasswords where code='$code'");

    if(mysqli_num_rows($getEmailQuery) == 0){
        exit("Can't find page");
    }

    if(isset($_POST["password"])){
        $pw = $_POST["password"];
        $pw = md5($pw);

        $row = mysqli_fetch_array($getEmailQuery);
        $email = $row["email"];

        $query = mysqli_query($koneksi, "UPDATE student SET password='$pw' WHERE email='$email'");

        if($query){
            $query = mysqli_query($koneksi, "DELETE FROM resetpasswords WHERE code='$code'");
            exit("Password berhasil diubah!");
        }else{
            exit("Something went wrong!");
        }
    }
?>
<form method="POST">
    <input type="password" name="password" placeholder="Password Baru">
    <br>
    <input type="submit" name="submit" value="Rubah password">
</form>
