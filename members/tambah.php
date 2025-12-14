<?php
require '../config/database.php';
require '../layout/header.php';

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $no_hp = $_POST['no_hp'];

    mysqli_query($conn, "
        INSERT INTO members (nama_member, kelas, no_hp) 
        VALUES ('$nama','$kelas','$no_hp')
    ");
    header("Location: index.php");
    exit;
}
?>

<div class="container">
<h2>Tambah Anggota</h2>
<form method="POST">
    <div class="mb-3">
        <input type="text" name="nama" class="form-control" placeholder="Nama Anggota" required>
    </div>
    <div class="mb-3">
        <input type="text" name="kelas" class="form-control" placeholder="Kelas">
    </div>
    <div class="mb-3">
        <input type="text" name="no_hp" class="form-control" placeholder="No HP">
    </div>
    <button class="btn btn-primary" name="simpan">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>
</div>

<?php require '../layout/footer.php'; ?>
