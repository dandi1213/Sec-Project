<?php
$servername = "localhost"; // Ganti dengan server yang sesuai
$username = "root";        // Ganti dengan username database Anda
$password = "Dandiganteng08102003";            // Ganti dengan password database Anda
$dbname = "sec";           // Nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
