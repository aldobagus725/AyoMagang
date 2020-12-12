<?php
    include '../koneksi.php';
    if(isset($_POST['visit'])){
        $vacancies_id = $_POST['vacancies_id'];
        $query = mysqli_query($koneksi, "update vacancies SET views = views + 1 WHERE vacancies_id = $vacancies_id");
        if ($query === TRUE){
            header("location:appdetail.php?&id=$vacancies_id");
        }else{
            echo "error!";
            echo $output = ' <a href="applist.php">Go Back Here!</a>';
        }
    }
?>