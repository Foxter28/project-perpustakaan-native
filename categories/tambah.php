<?php
require '../config/database.php';
require '../layout/header.php';

// Proses simpan
if(isset($_POST['simpan'])){
    $nama_kategori = $_POST['nama_kategori'];

    mysqli_query($conn, "INSERT INTO categories (nama_kategori) VALUES ('$nama_kategori')");
    header("Location: index.php");
    exit;
}
?>
<div class="container">
<h2>Tambah Kategori</h2>
<form method="POST">
    <div class="mb-3">
        <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" required>
    </div>
    <button class="btn btn-primary" name="simpan">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>
</div>
<?php require '../layout/footer.php'; ?>
