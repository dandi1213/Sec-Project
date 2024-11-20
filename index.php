<?php
// Cek apakah pengguna sudah login
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Jika belum login, arahkan ke halaman login
    header("Location: login.php");
    exit;
}

// Koneksi ke database dan mengambil data mahasiswa
$servername = "localhost";
$username = "root";
$password = "Dandiganteng08102003";
$dbname = "sec";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT Nama, Nim, Kelas, Alamat, No_Telepon FROM sql_injection";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Data Mahasiswa</h1>

<table>
    <tr>
        <th>Nama</th>
        <th>Nim</th>
        <th>Kelas</th>
        <th>Alamat</th>
        <th>No_Telepon</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['Nama']) . "</td>
                    <td>" . htmlspecialchars($row['Nim']) . "</td>
                    <td>" . htmlspecialchars($row['Kelas']) . "</td>
                    <td>" . htmlspecialchars($row['Alamat']) . "</td>
                    <td>" . htmlspecialchars($row['No_Telepon']) . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Tidak ada data mahasiswa</td></tr>";
    }

    // Menutup koneksi
    $conn->close();
    ?>
</table>

<!-- Logout button -->
<form method="POST" action="logout.php">
    <button type="submit">Logout</button>
</form>

</body>
</html>
