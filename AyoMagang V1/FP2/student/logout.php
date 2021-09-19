<?php
	include '../koneksi.php';session_start();session_destroy();unset($_SESSION['student']);echo "<script>alert('Kamu telah keluar!');</script>";echo "<script>location='../index.php';</script>";
?>