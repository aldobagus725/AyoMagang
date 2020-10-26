<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/media-queries.css">
  <link rel="shortcut icon" href="assets/ico/favicon.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

  <?php

  if (isset($_SESSION['company'])) {
  ?>
    <title><?php echo $_SESSION['company']['username']; ?></title>
</head>

<body>
  <!-- NavBar -->
  <nav class="navbar navbar-dark fixed-top navbar-expand-md navbar-no-bg">
    <div class="container">
      <a class="navbar-brand" href="index.php">Ayo Magang</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link scroll-link" href="#top-content">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link scroll-link" href="#about-us">Daftar Bukaan Magang Akademik</a>
          </li>
          <li class="nav-item">
            <a class="nav-link scroll-link" href="#portfolio">Kerjasama</a>
          </li>
          <li class="nav-item">
            <a class="nav-link scroll-link" href="#testimonials">My Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<?php
  } elseif (isset($_SESSION['student'])) {
?>
  <title><?php echo $_SESSION['student']['fullname']; ?></title>
  </head>

  <body>
    <!-- NavBar -->
    <nav class="navbar navbar-dark fixed-top navbar-expand-md navbar-no-bg">
      <div class="container">
        <a class="navbar-brand" href="index.php">Ayo Magang</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link scroll-link" href="#top-content">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link scroll-link" href="#about-us">Daftar Aplikasi Kamu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link scroll-link" href="#portfolio">Kerjasama</a>
            </li>
            <li class="nav-item">
              <a class="nav-link scroll-link" href="#testimonials">My Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  <?php
  } else {
    die;
  }
  ?>