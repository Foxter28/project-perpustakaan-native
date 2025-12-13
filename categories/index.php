<?php
require '../config/database.php';
require '../layout/header.php';

if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO categories VALUES (NULL,'$_POST[nama_kategori]')");
    header("Location: index.php");
}
?>

<h3>Data Kategori</h3>

<form method="POST" class="mb-3">
    <div class="input-group">
        <input type="text" name="nama_kategori" class="form-control" placeholder="Nama kategori" required>
        <button class="btn btn-primary" name="simpan">Tambah</button>
    </div>
</form>

<table class="table table-bordered">
<tr>
    <th>No</th>
    <th>Nama Kategori</th>
    <th>Aksi</th>
</tr>

<?php
$no=1;
$data=mysqli_query($conn,"SELECT * FROM categories");
while($row=mysqli_fetch_assoc($data)){
?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $row['nama_kategori'] ?></td>
    <td>
        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>

<?php require '../layout/footer.php'; ?>
    