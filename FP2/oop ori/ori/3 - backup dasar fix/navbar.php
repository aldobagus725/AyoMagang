<?php
  include '../koneksi.php';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/ayomagang/index.php">Ayo Magang</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="magang.php">Magang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="perushaan.php">Perusahaan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
    </ul>
    <!-- Jika Sudah Login -->
    <?php if(isset($_SESSION['company'])) : ?>
    <form class="form-inline my-2 my-lg-0">
      <a href="logout.php" onclick="return confirm('Yakin Logout?')" class="btn btn-danger" role="button">Logout</a>
    </form>
    <?php else : ?>
    <form class="form-inline my-2 my-lg-0">
      <a href="../login.php" class="btn btn-success" role="button">Login</a>
    </form>
    <?php endif ?>
  </div>
</nav>