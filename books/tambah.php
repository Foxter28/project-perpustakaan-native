<?php
require '../config/database.php';
$kategori = mysqli_query($conn, "SELECT * FROM categories");

if (isset($_POST['simpan'])) {
    mysqli_query($conn, "
        INSERT INTO books VALUES (
            NULL,
            '$_POST[category_id]',
            '$_POST[judul]',
            '$_POST[penulis]',
            '$_POST[tahun_terbit]',
            '$_POST[stok]'
        )
    ");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
</head>
<body>

<h2>Tambah Buku</h2>

<form method="POST">
    <select name="category_id" required>
        <option value="">-- Pilih Kategori --</option>
        <?php while($k=mysqli_fetch_assoc($kategori)){ ?>
            <option value="<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></option>
        <?php } ?>
    </select><br><br>

    <input type="text" name="judul" placeholder="Judul" required><br><br>
    <input type="text" name="penulis" placeholder="Penulis" required><br><br>
    <input type="number" name="tahun_terbit" placeholder="Tahun" required><br><br>
    <input type="number" name="stok" placeholder="Stok" required><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>

<a href="index.php">Kembali</a>

</body>
</html>
