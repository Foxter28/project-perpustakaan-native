<?php
require '../config/database.php';

if(isset($_GET['id'])){
    $id = intval($_GET['id']); // pastikan ID aman
    mysqli_query($conn, "DELETE FROM members WHERE id=$id");
}

header("Location: index.php");
exit;
