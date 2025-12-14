<?php
session_start();
require 'config/database.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    if(mysqli_num_rows($result) > 0){
        $_SESSION['username'] = $username;
        header("Location: books/index.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card p-4 shadow">
                <h3 class="text-center mb-3">Login</h3>
                <?php if(isset($error)){ ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php } ?>
                <form method="POST">
                    <div class="mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <button class="btn btn-primary w-100" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
