<?php

// Konfigurasi database
$host = "localhost"; // Ganti dengan host database Anda
$database = "db_kas_rt"; // Ganti dengan nama database Anda
$username = "root"; // Ganti dengan nama pengguna database Anda
$password = ""; // Ganti dengan kata sandi database Anda

// Membuat koneksi menggunakan PDO
try {
    $koneksi = new PDO("mysql:host=$host;dbname=$database", $username, $password);

    // Set mode error untuk PDO menjadi exception
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    #echo "Koneksi berhasil";
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>
