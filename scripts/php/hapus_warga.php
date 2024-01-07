<?php
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

// Ambil ID Warga
if (isset($_GET['id'])) {
    $id_warga = $_GET['id'];

    // Hapus data iuran terkait
    $deleteIuranQuery = "DELETE FROM iuran WHERE warga_id = ?";
    $stmtDeleteIuran = $conn->prepare($deleteIuranQuery);
    $stmtDeleteIuran->bind_param("i", $id_warga);
    $stmtDeleteIuran->execute();
    $stmtDeleteIuran->close();

    // Hapus data warga
    $deleteWargaQuery = "DELETE FROM warga WHERE id = ?";
    $stmtDeleteWarga = $conn->prepare($deleteWargaQuery);
    $stmtDeleteWarga->bind_param("i", $id_warga);

    if ($stmtDeleteWarga->execute()) {
        // Jika berhasil, arahkan ke halaman data warga
        header("Location: ../../pages/data_warga.php");
    } else {
        echo "Error: " . $stmtDeleteWarga->error;
    }

    // Tutup statement
    $stmtDeleteWarga->close();
} else {
    echo "ID Warga tidak diberikan.";
}

// Tutup koneksi
$conn->close();
?>
