<?php
$host = "localhost"; // Nama host
$user = "root"; // Username database (default di XAMPP adalah "root")
$password = ""; // Password database (default di XAMPP kosong)
$database = "bendi_car"; // Nama database Anda

// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $user, $password, $database);

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
