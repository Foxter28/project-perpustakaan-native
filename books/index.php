<?php
require '../config/database.php';
require '../layout/header.php';

$data = mysqli_query($conn, "SELECT * FROM members");
?>

<!DOCTYPE html>
    <title>Data Buku</title>

<h2>Data Buku</h2>
<a href="tambah.php">+ Tambah Buku</a>
<br><br>

<table border="1" cellpadding="5">
<tr>
    <th>No</th>
    <th>Judul</th>
    <th>Kategori</th>
    <th>Penulis</th>
    <th>Tahun</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>

<?php $no=1; while($row=mysqli_fetch_assoc($data)){ ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $row['judul'] ?></td>
    <td><?= $row['nama_kategori'] ?></td>
    <td><?= $row['penulis'] ?></td>
    <td><?= $row['tahun_terbit'] ?></td>
    <td><?= $row['stok'] ?></td>
    <td>
        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
        <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>

<?php require '../layout/footer.php'; ?>