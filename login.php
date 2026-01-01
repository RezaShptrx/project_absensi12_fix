<?php
session_start();
require_once "service/database.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {

        $data = $result->fetch_assoc();
        $_SESSION['username'] = $data['username'];
        $_SESSION['login'] = true;
        header("Location: index.php");
        exit;
    } else {

        echo 'Akun Tidak Ditemukan';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome Awal -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
    <!-- Font Awesome Akhir -->


    <!-- Font Googles Awal -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <!-- Font Googles Akhir -->


    <!-- CSS AWAL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/login.css">
    <!-- CSS AKHIR -->

    <title>SMKN 12 JAKARTA</title>
</head>

<body>

    <form class="container" action="login.php" method="POST">
        <div class="login-class shadow p-4">
            <h3>Login</h3>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="Masukan Username Anda" autocomplete="off">
                <i class="fa-solid fa-circle-user"></i>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Masukan Password Anda">
                <i class="fa-solid fa-lock"></i>
            </div>

            <button type="submit" class="btn" name="login">Login</button>
        </div>
    </form>


</body>
</html>