<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = ""; // replace with your MySQL password
$dbname = "kamus_pribadi";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Drop the database if it exists
$sql = "DROP DATABASE IF EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database dropped successfully<br>";
} else {
    echo "Error dropping database: " . $conn->error . "<br>";
}

// Create the database again
$sql = "CREATE DATABASE $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Connect to the newly created database
$conn->select_db($dbname);

// SQL to create 'user' table
$user_table = "CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_lengkap VARCHAR(40) NOT NULL,
    email VARCHAR(40) NOT NULL UNIQUE,
    telepon VARCHAR(20),
    alamat VARCHAR(255),
    tanggal_lahir DATE,
    jenis_kelamin ENUM('Laki-laki', 'Perempuan') DEFAULT NULL,
    posisi VARCHAR(50) DEFAULT NULL,
    password VARCHAR(255) NOT NULL
)";

// Create 'user' table
if ($conn->query($user_table) === TRUE) {
    echo "User table created successfully<br>";
} else {
    echo "Error creating user table: " . $conn->error . "<br>";
}

// SQL to create 'kamus' table
$kamus_table = "CREATE TABLE kamus (
    id INT AUTO_INCREMENT PRIMARY KEY,
    word VARCHAR(255) NOT NULL,
    definition TEXT NOT NULL,
    example TEXT NOT NULL,
    image_path VARCHAR(255) DEFAULT NULL
)";
// Create 'kamus' table
if ($conn->query($kamus_table) === TRUE) {
    echo "Kamus table created successfully<br>";
} else {
    echo "Error creating kamus table: " . $conn->error;
}

// Close connection
$conn->close();
?>
