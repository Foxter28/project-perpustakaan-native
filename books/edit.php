<?php
require '../config/database.php';
$id = $_GET['id'];

$buku = mysqli_query($conn, "SELECT * FROM books WHERE id=$id");
$row = mysqli_fetch_assoc($buku);

$kategori = mysqli_query($conn, "SELECT * FROM categories");

if (isset($_POST['update'])) {
    mysqli_query($conn, "
        UPDATE books SET
        category_id='$_POST[category_id]',
        judul='$_POST[judul]',
        penulis='$_POST[penulis]',
        tahun_terbit='$_POST[tahun_terbit]',
        stok='$_POST[stok]'
        WHERE id=$id
    ");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
</head>
<body>

<h2>Edit Buku</h2>

<form method="POST">
<select name="category_id">
<?php while($k=mysqli_fetch_assoc($kategori)){ ?>
<option value="<?= $k['id'] ?>" <?= $row['category_id']==$k['id']?'selected':'' ?>>
    <?= $k['nama_kategori'] ?>
</option>
<?php } ?>
</select><br><br>

<input type="text" name="judul" value="<?= $row['judul'] ?>"><br><br>
<input type="text" name="penulis" value="<?= $row['penulis'] ?>"><br><br>
<input type="number" name="tahun_terbit" value="<?= $row['tahun_terbit'] ?>"><br><br>
<input type="number" name="stok" value="<?= $row['stok'] ?>"><br><br>

<button type="submit" name="update">Update</button>
</form>

<a href="index.php">Kembali</a>

</body>
</html>
