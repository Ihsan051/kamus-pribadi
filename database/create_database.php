<?php
// server connection//
$host = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password);
$drop = "DROP DATABASE IF EXISTS KAMUS_PRIBADI";

$conn->query($drop);
$sql = "CREATE DATABASE KAMUS_PRIBADI";
if($conn->query($sql) === TRUE){
    echo "Database berhasil dibuat";
}else{
    echo "pembuatan database error:" . $conn->error;
}

//memanggil database//
$database = "KAMUS_PRIBADI";
mysqli_select_db($conn, $database);

// create table//
$conn->query("CREATE TABLE `user`(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nama_lengkap char(50) NOT NULL,
    email varchar(50) NOT NULL,
    telepon varchar (13) NOT NULL,
    password varchar (100) NOT NULL
) ");






?>