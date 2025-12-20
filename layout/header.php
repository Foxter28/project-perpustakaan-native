<?php
session_start();
if(!isset($_SESSION['username']) && basename($_SERVER['PHP_SELF']) != 'index.php'){
    header("Location: ../index.php");
    exit;
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="../books/index.php">Perpustakaan</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="../books/index.php">Buku</a></li>
        <li class="nav-item"><a class="nav-link" href="../categories/index.php">Kategori</a></li>
        <li class="nav-item"><a class="nav-link" href="../members/index.php">Member</a></li>
      </ul>
      <span class="navbar-text text-white me-3">Hai, <?= $_SESSION['username'] ?></span>
      <a href="../logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
  </div>
</nav>
