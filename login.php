<?php
// Start the session to manage user login state
session_start();

// Include database connection file
require_once 'db_connection.php'; // Ensure you have a file for DB connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form dengan sanitasi
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password']; // Password tidak disanitasi

    // Query untuk memeriksa pengguna
    $sql = "SELECT * FROM user WHERE email = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Cek apakah pengguna ditemukan
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            // Verifikasi password
            if (password_verify($password, $row['password'])) {
                // Login berhasil
                $_SESSION['user_email'] = $email; // Simpan email di session
                header("Location: beranda.php");
                exit(); // Pastikan untuk menghentikan script setelah redirect
            } else {
                $error_message = "Password salah!";
            }
        } else {
            $error_message = "Username tidak ditemukan!";
        }

        // Tutup statement
        $stmt->close();
    } else {
        $error_message = "Terjadi kesalahan dalam query.";
    }

    // Tutup koneksi
    $conn->close();
}

// Tampilkan pesan kesalahan jika ada
if (isset($error_message)) {
    echo "<p style='color: red;'>$error_message</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tambahkan stylesheet dan script jika perlu -->
</head>
<body>
    <!-- Form Login -->
    <form action="" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        
        <button type="submit">Login</button>
    </form>
</body>
</html>