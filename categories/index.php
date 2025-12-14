<?php
require '../config/database.php';
require '../layout/header.php';

// Proses simpan kategori
if(isset($_POST['simpan'])){
    $nama_kategori = $_POST['nama_kategori'];
    mysqli_query($conn, "INSERT INTO categories (nama_kategori) VALUES ('$nama_kategori')");
    header("Location: index.php");
    exit;
}
?>

<div class="container">
<h2>Data Kategori</h2>

<form method="POST" class="mb-3">
    <div class="input-group">
        <input type="text" name="nama_kategori" class="form-control" placeholder="Nama kategori" required>
        <button class="btn btn-primary" name="simpan">Tambah</button>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $data = mysqli_query($conn, "SELECT * FROM categories");
        while($row = mysqli_fetch_assoc($data)){
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nama_kategori']) ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>

<?php require '../layout/footer.php'; ?>
