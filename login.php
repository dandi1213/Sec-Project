<?php
// Cek apakah pengguna sudah login
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Jika sudah login, arahkan ke halaman data mahasiswa
    header("Location: data_mahasiswa.php");
    exit;
}

// Cek apakah form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Definisikan username dan password yang valid
    $valid_username = "Dandi";
    $valid_password = "1234";

    // Ambil data dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifikasi username dan password
    if ($username === $valid_username && $password === $valid_password) {
        // Set session untuk menandakan bahwa pengguna telah login
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // Arahkan pengguna ke halaman data mahasiswa
        header("Location: index.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Data Mahasiswa</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <h1>Login</h1>

    <!-- Form login -->
    <form method="POST" action="login.php">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>

        <?php if (isset($error)): ?>
            <p style="color: red;"><?= $error; ?></p>
        <?php endif; ?>
    </form>

</body>

</html>