<?php
require '../config/database.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM categories WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama = $_POST['nama_kategori'];
    mysqli_query($conn, "UPDATE categories SET nama_kategori='$nama' WHERE id=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Kategori</title>
</head>
<body>

<h2>Edit Kategori</h2>

<form method="POST">
    <input type="text" name="nama_kategori" value="<?= $row['nama_kategori'] ?>" required_]()_
