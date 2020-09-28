<?php
	include 'koneksi.php';
	session_start();
	unset($_SESSION['company']);
	session_destroy();
	echo "<script>alert('You already logged out!');</script>";
	echo "<script>location='login.php';</script>";
?>