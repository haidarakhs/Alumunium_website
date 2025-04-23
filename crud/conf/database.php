<?php
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$dbname = "db_alumunium"; 

// Buat koneksi
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Cek koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
