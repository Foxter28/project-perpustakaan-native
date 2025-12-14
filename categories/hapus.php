<?php
require '../config/database.php';
require '../layout/header.php';

if(isset($_GET['id'])){
    $id = intval($_GET['id']); // pastikan ID aman
    mysqli_query($conn, "DELETE FROM categories WHERE id=$id");
}

header("Location: index.php");
exit;
