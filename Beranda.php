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
     <link rel="stylesheet" href="style.css">
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
<div class="container-fluid py-5">
    <div class="container text-center">
        <h3> Daftar Kamus</h3>

        <div class="row mt-5">
            <?php 
            if ($result->num_rows > 0) {
                // menampilkan data
            while ($row = $result->fetch_assoc()) { ?>
            <div class="col-sm-6 col-md-4">
                <div class="card" >
                    <img src="<?php  echo $row['image_path']; ?>" class="card-img-top" alt="...">
                    <div class="card-body bg-dark ">
                    <table class="table table-dark text-start table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col"> : <?php echo $row['id']; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Kata</th>
                                <td > : <?php echo $row['word']; ?></td>
                                <td colspan="4"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">Definisi</th>
                                <td colspan="4"> : <?php echo $row['definition']; ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">Contoh</th>
                                <td colspan="4"> : <?php echo $row['example']; ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <?php }
            }?>
    </div>
</div>

    <!-- Tombol Tambah Data -->
    <section class="container my-5 text-center">
        <a href="inputdata.php" class="btn btn-success btn-lg">Tambah Data Baru</a>
    </section>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>