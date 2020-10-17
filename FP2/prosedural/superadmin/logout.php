<?php
	include '../koneksi.php';
	session_start();
	unset($_SESSION['superadmin']);
	echo "<script>alert('Kamu telah keluar!');</script>";
	echo "<script>location='../index.php';</script>";
?>