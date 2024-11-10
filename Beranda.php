
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Responsif</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include "navbar.php" ?>

    <!-- Main Content -->
      <!-- Tombol dan Kolom Pencarian -->
      <section class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="search_word.php" method="GET" class="d-flex">
                    <input type="text" class="form-control me-2" name="query" placeholder="Cari kata..." required>
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
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
