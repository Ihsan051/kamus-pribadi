<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kata ke Kamus Pribadi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include "navbar.php" ?>
    <!-- Form Kamus Pribadi -->
    <section class="d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-6">
            <h3 class="text-center mb-4">Tambah Kata ke Kamus Pribadi</h3>
            <div class="card p-4">
                <form action="add_word.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="word" class="form-label">Kata</label>
                        <input type="text" class="form-control" id="word" name="word" placeholder="Masukkan kata" required>
                    </div>
                    <div class="mb-3">
                        <label for="definition" class="form-label">Definisi</label>
                        <textarea class="form-control" id="definition" name="definition" rows="3" placeholder="Masukkan definisi kata" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="example" class="form-label">Contoh Penggunaan</label>
                        <textarea class="form-control" id="example" name="example" rows="2" placeholder="Masukkan contoh penggunaan kata" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar (opsional)</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>
                    <div class="d-flex justify-content-between">
                        <!-- Tombol Kembali -->
                        <a href="beranda.php" class="btn btn-secondary">Kembali</a>
                        <!-- Tombol Tambahkan Data -->
                        <button type="submit" class="btn btn-primary">Tambahkan ke Kamus</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
