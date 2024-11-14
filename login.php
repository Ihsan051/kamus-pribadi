<?php
// Start the session to manage user login state
session_start();

// Include database connection file (make sure the path is correct)
require_once 'database/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize the email input
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password']; // Password not sanitized to allow for secure hash comparison

    // Query to check the user
    $sql = "SELECT * FROM user WHERE email = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the user is found
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            // Verify password
            if (password_verify($password, $row['password'])) {
                // Login successful
                $_SESSION['user_email'] = $email; // Store email in session
                header("Location: beranda.php");
                exit(); // Ensure to stop the script after redirect
            } else {
                $error_message = "Password salah!";
            }
        } else {
            $error_message = "Username tidak ditemukan!";
        }

        // Close statement
        $stmt->close();
    } else {
        $error_message = "Terjadi kesalahan dalam query.";
    }

    // Close connection
    $conn->close();
}

// Display error message if any
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <section class="d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-4">
            <h3 class="text-center mb-4">Login</h3>
            <div class="card p-4">
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Username</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                <p class="text-center mt-3">Belum punya akun? <a href="register.php">Daftar disini</a></p>
            </div>
        </div>
    </section>
</body>
</html>

