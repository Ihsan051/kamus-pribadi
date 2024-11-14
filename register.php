<?php
include "database/koneksi.php";

if (isset($_POST['name'])) {
    $username = $_POST['name'];
    $email    = $_POST['email'];
    $telepon  = $_POST['phone'];
    $alamat   = $_POST['alamat'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $password = $_POST['password'];
    $passwordhash = password_hash($password, PASSWORD_DEFAULT);

    // Validate phone number
    if (!is_numeric($telepon)) {
        die("Error: Nomor telepon harus berupa angka.");
    }

    // Use prepared statements to prevent SQL injection
    $query = $conn->prepare("INSERT INTO user (nama_lengkap, email, telepon, alamat, tanggal_lahir, jenis_kelamin, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $query->bind_param("sssssss", $username, $email, $telepon,$alamat, $tanggal_lahir, $jenis_kelamin, $passwordhash);

    if ($query->execute()) {
        echo "<script>
                alert('Pendaftaran Berhasil, silahkan Login');
                window.location.href = 'login.php';
              </script>";
    } else {
        echo "Pendaftaran gagal: " . $conn->error;
    }
}
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
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Form Registrasi -->
    <section class="d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-8 col-lg-6">
            <h3 class="text-center mb-4">Register</h3>
            <div class="card p-4">
                <form action="register.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Masukkan nomor telepon" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class ="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Daftar</button>
                </form>
            </div>
            <p class="d-flex justify-content-center align-items-center ">Sudah punya akun? <a href="login.php">Login</a></p>
        </div>
    </section>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>