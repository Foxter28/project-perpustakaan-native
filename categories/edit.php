<?php
require '../config/database.php';
require '../layout/header.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM categories WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){
    $nama = $_POST['nama_kategori'];
    mysqli_query($conn, "UPDATE categories SET nama_kategori='$nama' WHERE id=$id");
    header("Location: index.php");
    exit;
}
?>

<div class="container">
<h2>Edit Kategori</h2>
<form method="POST">
    <div class="mb-3">
        <input type="text" name="nama_kategori" class="form-control" value="<?= htmlspecialchars($row['nama_kategori']) ?>" required>
    </div>
    <button class="btn btn-primary" name="update">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>
</div>

<?php require '../layout/footer.php'; ?>
