<?php 
include "database/koneksi.php";

// Ambil query pencarian dari form
$query = isset($_GET['query']) ? $_GET['query'] : '';

// Siapkan SQL untuk pencarian
$sql = "SELECT id, word, definition, example, image_path FROM kamus WHERE word LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = "%" . $query . "%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Kata - Kamus Pribadi</title>
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
    </style>
</head>
<body>
    <?php include "navbar.php"; ?>
    <section class="container my-5">
        <h1 class="header-title">Hasil Pencarian untuk: "<?php echo htmlspecialchars($query); ?>"</h1>
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
                echo "<div class='alert alert-warning'>Tidak ada hasil ditemukan untuk kata: \"" . htmlspecialchars($query) . "\"</div>";
            }
            $stmt->close();
            $conn->close();
            ?>
        </div>
    </section>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>