<?php 
    // Establish database connection 
    include("../koneksi.php");

    // code user Email availablity
    if(!empty($_POST["email"])) {
        $email= $_POST["email"];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {
            echo "error :you did not enter a valid email.";
        }else {
//            $check = mysqli_query($koneksi, "select * from student where email = '$email' or username = '$username'");
            $check = mysqli_query($koneksi, "select * from company where email = '$email'");
            $checkRow = mysqli_num_rows($check);
            if($checkRow >0){
                echo "<span style='color:#red'>Email already exists!</span>";
                echo "<script>$('#submit').prop('disabled',true);</script>";
            } else{
                echo "<span style='color:#27D644;font-weight:bold;'>Email is available!</span>";
                echo "<script>$('#submit').prop('disabled',false);</script>";
            }
        }
    }
    // code user ID No availablity
    if(!empty($_POST["username"])) {
        $username= $_POST["username"];
        $check = mysqli_query($koneksi, "select * from company where username = '$username'");
        $checkRow = mysqli_num_rows($check);
        if($checkRow >0){
            echo "<span style='color:red;'>Username already exist!</span>";
            echo "<script>$('#submit').prop('disabled',true);</script>";
        } else{
            echo "<span style='color:#27D644;font-weight:bold;'>Username is available!</span>";
            echo "<script>$('#submit').prop('disabled',false);</script>";
        }
    }
?>