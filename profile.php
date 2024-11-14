<?php
// Start the session to access session variables
session_start();

// Include database connection
require_once 'database/koneksi.php';

// Check if user is logged in
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

// Get user data from the database
$email = $_SESSION['user_email'];
$sql = "SELECT * FROM user WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Fetch user data
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
} else {
    echo "User data not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .rounded-circle {
            border: 3px solid #007bff; /* Warna border untuk gambar profil */
        }
    </style>
</head>
<body>
    <!-- Header -->
    <?php include "navbar.php"; ?>

    <!-- Profil Pengguna -->
    <section class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-body text-center">
                        <br>
                        <!-- Foto Profil -->
                        <img src="https://via.placeholder.com/150" class="rounded-circle mb-3" alt="Foto Profil" width="150" height="150">
                        
                        <!-- Identitas Pengguna -->
                        <h3 class="card-title"><?php echo htmlspecialchars($user['nama_lengkap']); ?></h3>
                        <p class="text-muted"><?php echo htmlspecialchars($user['posisi'] ?? 'Pekerjaan belum diatur'); ?></p>
                        
                        <!-- Informasi Kontak -->
                        <ul class="list-group list-group-flush text-start">
                            <li class="list-group-item"><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></li>
                            <li class="list-group-item"><strong>Telepon:</strong> <?php echo htmlspecialchars($user['telepon']); ?></li>
                            <li class="list-group-item"><strong>Alamat:</strong> <?php echo htmlspecialchars($user['alamat'] ?? 'Alamat belum diatur'); ?></li>
                            <li class="list-group-item"><strong>Tanggal Lahir:</strong> <?php echo htmlspecialchars($user['tanggal_lahir'] ?? 'Tanggal lahir belum diatur'); ?></li>
                            <li class="list-group-item"><strong>Jenis Kelamin:</strong> <?php echo htmlspecialchars($user['jenis_kelamin'] ?? 'Jenis kelamin belum diatur'); ?></li>
                        </ul>

                        <div class="d-flex justify-content-between mt-4">
                            <!-- Tombol Kembali -->
                            <a href="beranda.php" class="btn btn-secondary">Kembali</a>
                            <!-- Tombol Edit Profil -->
                            <a href="edit_profil.php" class="btn btn-primary">Edit Profil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
