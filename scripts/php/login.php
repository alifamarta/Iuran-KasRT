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
        // Mendapatkan data user dari hasil query
        $user_data = $result->fetch_assoc();

        // Cek peran (role) user
        if ($user_data["role"] == 1) {
            // Jika role adalah 1 (admin), arahkan ke halaman admin
            session_start();
            $_SESSION["username"] = $username;
            header("Location: pages/index.php");
            exit(); // Pastikan untuk keluar dari skrip setelah mengarahkan pengguna
        } else {
            // Jika role adalah 2 (user), arahkan ke halaman user
            session_start();
            $_SESSION["username"] = $username;
            header("Location: pages/user.php");
            exit(); // Pastikan untuk keluar dari skrip setelah mengarahkan pengguna
        }
    } else {
        // Login gagal
        echo "<script>";
        echo "alert('Login gagal. Periksa kembali username dan password Anda.');";
        echo "window.location.href='./index.php';";
        echo "</script>";
    }

    // Tutup koneksi dan statement
    $stmt->close();
    $conn->close();
}
?>
