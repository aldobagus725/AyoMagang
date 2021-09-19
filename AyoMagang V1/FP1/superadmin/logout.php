<?php
	include '../koneksi.php';
	session_start();
	unset($_SESSION['superadmin']);
    session_destroy();
	echo "<script>alert('Kamu telah keluar!');</script>";
	echo "<script>location='login.php';</script>";
?>