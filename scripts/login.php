<?php

 include 'koneksi.php';

// Periksa apakah formulir dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Kumpulkan data formulir
    $username = $_POST['username'];
    $password = $_POST['password'];

// Validasi dan sanitasi data (lakukan validasi sesuai kebutuhan)

// Contoh: Masukkan data ke database
    $conn = mysqli_connect("localhost", "root", "", "db_kas_rt");

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

// Gunakan prepared statements untuk mencegah SQL injection
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
// Bind parameter ke prepared statement
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);

// Eksekusi statement
        if (mysqli_stmt_execute($stmt)) {
// Ambil hasil query
            $result = mysqli_stmt_get_result($stmt);

// Periksa apakah pengguna ditemukan
            if ($row = mysqli_fetch_assoc($result)) {
// Pengguna ditemukan, lakukan tindakan sesuai (misalnya, redirect ke halaman sukses)
                header("Location: pages/index.php");
                exit();
            } else {
// Pengguna tidak ditemukan, tampilkan pesan kesalahan
                echo "Username atau password salah.";
            }
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

// Tutup prepared statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

// Tutup koneksi database jika digunakan
    mysqli_close($conn);
} else {
// Jika formulir tidak dikirimkan, redirect ke halaman formulir atau tampilkan pesan kesalahan
//echo "Formulir tidak dikirimkan.";
}
?>