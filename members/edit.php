<?php
require '../config/database.php';
$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM members WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    mysqli_query($conn, "
        UPDATE members SET
        nama='$_POST[nama]',
        kelas='$_POST[kelas]',
        no_hp='$_POST[no_hp]'
        WHERE id=$id
    ");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Anggota</title>
</head>
<body>

<h2>Edit Anggota</h2>

<form method="POST">
<input type="text" name="nama" value="<?= $row['nama'] ?>"><br><br>
<input type="text" name="kelas" value="<?= $row['kelas'] ?>"><br><br>
<input type="text" name="no_hp" value="<?= $row['no_hp'] ?>"><br><br>

<button type="submit" name="update">Update</button>
</form>

<a href="index.php">Kembali</a>

</body>
</html>
