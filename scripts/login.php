<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database (sesuaikan dengan informasi database Anda)
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "db_kas_rt";

    $conn = new mysqli($host, $username, $password, $database);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Ambil data dari form login
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query untuk memeriksa keberadaan user dengan username dan password tertentu
    $query = "SELECT * FROM users WHERE username=? AND password=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Periksa hasil query
    if ($result->num_rows > 0) {
        // Login berhasil
        // Simpan informasi login ke sesi atau sesuai kebutuhan aplikasi Anda
        session_start();
        $_SESSION["username"] = $username;

        // Redirect ke halaman setelah login
        header("Location: ../pages/index.php");
    } else {
        // Login gagal
        echo "<script>";
        echo "alert('Login gagal  Periksa kembali username dan password Anda.');";
        echo "window.location.href='../index.php';";
        echo "</script>";
    }


    // Tutup koneksi dan statement
    $stmt->close();
    $conn->close();
}
?>