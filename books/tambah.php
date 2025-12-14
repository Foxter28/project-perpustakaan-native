<?php
require '../config/database.php';
require '../layout/header.php';

$kategori = mysqli_query($conn, "SELECT * FROM categories");
$members = mysqli_query($conn, "SELECT * FROM members");

if(isset($_POST['simpan'])){
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun'];
    $stok = $_POST['stok'];
    $kategori_id = $_POST['kategori_id'];
    $peminjam_id = $_POST['peminjam_id'] ?: NULL;

    mysqli_query($conn, "INSERT INTO books (judul, penulis, tahun_terbit, stok, kategori_id, peminjam_id) 
                         VALUES ('$judul','$penulis','$tahun','$stok','$kategori_id','$peminjam_id')");
    header("Location: index.php");
    exit;
}
?>
<div class="container">
<h2>Tambah Buku</h2>
<form method="POST">
    <div class="mb-3"><input type="text" name="judul" class="form-control" placeholder="Judul Buku" required></div>
    <div class="mb-3"><input type="text" name="penulis" class="form-control" placeholder="Penulis"></div>
    <div class="mb-3"><input type="number" name="tahun" class="form-control" placeholder="Tahun Terbit"></div>
    <div class="mb-3"><input type="number" name="stok" class="form-control" placeholder="Stok" value="0"></div>
    <div class="mb-3">
        <select name="kategori_id" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            <?php while($k = mysqli_fetch_assoc($kategori)){ ?>
            <option value="<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <select name="peminjam_id" class="form-control">
            <option value="">-- Pilih Peminjam (Opsional) --</option>
            <?php while($m = mysqli_fetch_assoc($members)){ ?>
            <option value="<?= $m['id'] ?>"><?= $m['nama_member'] ?></option>
            <?php } ?>
        </select>
    </div>
    <button class="btn btn-primary" name="simpan">Simpan</button>
</form>
</div>
<?php require '../layout/footer.php'; ?>
