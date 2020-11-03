<?php
include("../koneksi.php");
mysqli_query($koneksi,"delete from vacancies where vacancies_id='$_GET[id]'");
header("location:dashboardcom.php");
?>