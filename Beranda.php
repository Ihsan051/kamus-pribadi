<?php 
include "database/koneksi.php";
// Start the session to access session variables
session_start();

// Include database connection
require_once 'database/koneksi.php';

// Check if user is logged in
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}
// Ambil data
$sql = "SELECT id, word, definition, example, image_path FROM kamus";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamus Pribadi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .data-item {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .header-title {
            margin-bottom: 30px;
            text-align: center;
            color: #343a40;
        }
        .btn-success {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php include "navbar.php"; ?>
    <!-- Main Content -->
    <section class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="pencarian_kata.php" method="GET" class="d-flex mb-4">
                    <input type="text" class="form-control me-2" name="query" placeholder="Cari kata..." required>
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>

                <h1 class="header-title">Kamus Pribadi</h1>
                <div id="data-container" class="text-center">
                    <?php
                    if ($result->num_rows > 0) {
                        // Tampilkan data
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='data-item'>";
                            echo "<h2>ID: " . $row["id"] . "</h2>";
                            echo "<p><strong>Kata:</strong> " . $row["word"] . "</p>";
                            echo "<p><strong>Definisi:</strong> " . $row["definition"] . "</p>";
                            echo "<p><strong>Contoh:</strong> " . $row["example"] . "</p>";
                            echo "<img src='" . $row["image_path"] . "' alt='" . $row["word"] . "'>";
                            echo "</div>";
                        }
                    } else {
                        echo "<div class='alert alert-warning'>0 hasil</div>";
                    }
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Tombol Tambah Data -->
    <section class="container my-5 text-center">
        <a href="inputdata.php" class="btn btn-success btn-lg">Tambah Data Baru</a>
    </section>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>