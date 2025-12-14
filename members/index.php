<?php
require '../config/database.php';
require '../layout/header.php';

$data = mysqli_query($conn, "SELECT * FROM members");
?>

<div class="container">
<h2>Data Anggota</h2>

<a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Anggota</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; while($row=mysqli_fetch_assoc($data)){ ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nama_member']) ?></td>
            <td><?= htmlspecialchars($row['kelas']) ?></td>
            <td><?= htmlspecialchars($row['no_hp']) ?></td>
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
