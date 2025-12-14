<?php
require '../config/database.php';
require '../layout/header.php';

$data = mysqli_query($conn, "
    SELECT b.id AS book_id, b.judul, b.penulis, b.tahun_terbit, b.stok,
           c.nama_kategori, m.nama_member
    FROM books b
    LEFT JOIN categories c ON b.kategori_id = c.id
    LEFT JOIN members m ON b.peminjam_id = m.id
");
?>
<div class="container">
<h2>Data Buku</h2>
<a href="tambah.php" class="btn btn-success mb-3">+ Tambah Buku</a>
<table class="table table-bordered table-striped">
<tr>
    <th>No</th>
    <th>Judul</th>
    <th>Kategori</th>
    <th>Penulis</th>
    <th>Tahun</th>
    <th>Stok</th>
    <th>Peminjam</th>
    <th>Aksi</th>
</tr>
<?php $no=1; while($row=mysqli_fetch_assoc($data)){ ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= htmlspecialchars($row['judul']) ?></td>
    <td><?= htmlspecialchars($row['nama_kategori']) ?></td>
    <td><?= htmlspecialchars($row['penulis']) ?></td>
    <td><?= htmlspecialchars($row['tahun_terbit']) ?></td>
    <td><?= htmlspecialchars($row['stok']) ?></td>
    <td><?= htmlspecialchars($row['nama_member'] ?? '-') ?></td>
    <td>
        <a href="edit.php?id=<?= $row['book_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="hapus.php?id=<?= $row['book_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>
</div>
<?php require '../layout/footer.php'; ?>
