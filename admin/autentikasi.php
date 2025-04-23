<?php
session_start();
include 'config.php'; // Sesuaikan dengan file koneksi database kamu

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'");
    
    if (mysqli_num_rows($query) === 1) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['user_id'] = $data['id'];
        header("Location: ../crud/products.php");
        exit();
    } else {
        header("Location: index.php?error=1");
        exit();
    }
}
?>
