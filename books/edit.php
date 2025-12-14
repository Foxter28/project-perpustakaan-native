<?php
require '../config/database.php';
require '../layout/header.php';

$id = intval($_GET['id']); // pastikan ID aman
$buku = mysqli_query($conn, "SELECT * FROM books WHERE id=$id");
$row = mysqli_fetch_assoc($buku);

$kategori = mysqli_query($conn, "SELECT * FROM categories");

if(isset($_POST['update'])){
    $kategori_id = $_POST['kategori_id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun_terbit'];
    $stok = $_POST['stok'];

    mysqli_query($conn, "
        UPDATE books SET
        kategori_id='$kategori_id',
        judul='$judul',
        penulis='$penulis',
        tahun_terbit='$tahun',
        stok='$stok'
        WHERE id=$id
    ");
    header("Location: index.php");
    exit;
}
?>

<div class="container">
<h2>Edit Buku</h2>
<form method="POST">
    <div class="mb-3">
        <label>Kategori</label>
        <select name="kategori_id" class="form-control" required>
            <?php while($k = mysqli_fetch_assoc($kategori)){ ?>
            <option value="<?= $k['id'] ?>" <?= $row['kategori_id']==$k['id']?'selected':'' ?>>
                <?= htmlspecialchars($k['nama_kategori']) ?>
            </option>
            <?php } ?>
        </select>
    </div>

    <div class="mb-3">
        <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($row['judul']) ?>" placeholder="Judul Buku" required>
    </div>

    <div class="mb-3">
        <input type="text" name="penulis" class="form-control" value="<?= htmlspecialchars($row['penulis']) ?>" placeholder="Penulis">
    </div>

    <div class="mb-3">
        <input type="number" name="tahun_terbit" class="form-control" value="<?= htmlspecialchars($row['tahun_terbit']) ?>" placeholder="Tahun Terbit">
    </div>

    <div class="mb-3">
        <input type="number" name="stok" class="form-control" value="<?= htmlspecialchars($row['stok']) ?>" placeholder="Stok">
    </div>

    <button class="btn btn-primary" name="update">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>
</div>

<?php require '../layout/footer.php'; ?>
