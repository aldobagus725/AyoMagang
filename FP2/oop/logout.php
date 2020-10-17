<?php
session_start();
session_destroy();
echo "<script>alert('You already logged out!');</script>";
echo "<script>location='login.php';</script>";
die;
?>
