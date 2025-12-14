<?php
require '../config/database.php';
require '../layout/header.php';

$data = mysqli_query($conn, "SELECT * FROM members");
?>

<h3>Data Anggota</h3>

<a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Anggota</a>

<table class="table table-bordered">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>No HP</th>
    <th>Aksi</th>
</tr>

<?php $no=1; while($row=mysqli_fetch_assoc($data)){ ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= htmlspecialchars($row['nama_member']) ?></td>
    <td><?= $row['kelas'] ?></td>
    <td><?= $row['no_hp'] ?></td>
    <td>
        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
           onclick="return confirm('Hapus?')">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>

<?php require '../layout/footer.php'; ?>
