<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <?php include "navbar.php" ?>

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
                        <h3 class="card-title">Nama Pengguna</h3>
                        <p class="text-muted">Posisi / Pekerjaan</p>
                        
                        <!-- Informasi Kontak -->
                        <ul class="list-group list-group-flush text-start">
                            <li class="list-group-item"><strong>Email:</strong> pengguna@email.com</li>
                            <li class="list-group-item"><strong>Telepon:</strong> +62 123 4567 890</li>
                            <li class="list-group-item"><strong>Alamat:</strong> Jl. Contoh No. 123, Jakarta</li>
                            <li class="list-group-item"><strong>Tanggal Lahir:</strong> 1 Januari 2000</li>
                            <li class="list-group-item"><strong>Jenis Kelamin:</strong> Laki-Laki / Perempuan</li>
                        </ul>

                        <div class="d-flex justify-content-between">
                            <!-- Tombol Kembali -->
                            <a href="beranda.php" class="btn btn-secondary">Kembali</a>
                            <!-- Tombol Edit Profil -->
                            <a href="#" class="btn btn-primary ">Edit Profil</a>
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
