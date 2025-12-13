<?php
require '../config/database.php';

if (isset($_POST['simpan'])) {
    mysqli_query($conn, "
        INSERT INTO members VALUES (
            NULL,
            '$_POST[nama]',
            '$_POST[kelas]',
            '$_POST[no_hp]'
        )
    ");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Anggota</title>
</head>
<body>

<h2>Tambah Anggota</h2>

<form method="POST">
<input type="text" name="nama" placeholder="Nama" required><br><br>
<input type="text" name="kelas" placeholder="Kelas"><br><br>
<input type="text" name="no_hp" placeholder="No HP"><br><br>

<button type="submit" name="simpan">Simpan</button>
</form>

<a href="index.php">Kembali</a>

</body>
</html>
