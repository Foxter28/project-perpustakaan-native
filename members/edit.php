<?php
require '../config/database.php';
require '../layout/header.php';

$id = intval($_GET['id']); // pastikan ID aman
$data = mysqli_query($conn, "SELECT * FROM members WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $no_hp = $_POST['no_hp'];

    mysqli_query($conn, "
        UPDATE members SET
        nama_member='$nama',
        kelas='$kelas',
        no_hp='$no_hp'
        WHERE id=$id
    ");
    header("Location: index.php");
    exit;
}
?>

<div class="container">
<h2>Edit Anggota</h2>
<form method="POST">
    <div class="mb-3">
        <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($row['nama_member']) ?>" placeholder="Nama Anggota" required>
    </div>
    <div class="mb-3">
        <input type="text" name="kelas" class="form-control" value="<?= htmlspecialchars($row['kelas']) ?>" placeholder="Kelas">
    </div>
    <div class="mb-3">
        <input type="text" name="no_hp" class="form-control" value="<?= htmlspecialchars($row['no_hp']) ?>" placeholder="No HP">
    </div>
    <button class="btn btn-primary" name="update">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>
</div>

<?php require '../layout/footer.php'; ?>
