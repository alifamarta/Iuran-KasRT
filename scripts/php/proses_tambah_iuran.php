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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $tanggal = $_POST["tanggal"];
    $warga_id = $_POST["warga_id"];
    $nominal = $_POST["nominal"];
    $keterangan = $_POST["keterangan"]; // sudah berupa 'Dibayar' atau 'Belum Dibayar'
    $jenis_iuran = $_POST["jenis_iuran"];

    // Tambahkan data iuran baru dengan menyertakan warga_id
    $insertQuery = "INSERT INTO iuran (tanggal, warga_id, nominal, keterangan, jenis_iuran) VALUES (?, ?, ?, ?, ?)";
    $stmtInsert = $conn->prepare($insertQuery);
    $stmtInsert->bind_param("sisss", $tanggal, $warga_id, $nominal, $keterangan, $jenis_iuran);


    if ($stmtInsert->execute()) {
        // Jika berhasil, arahkan ke halaman sukses atau sesuaikan dengan kebutuhan
        header("Location: ../pages/data_iuran_warga.php");
    } else {
        echo "Error: " . $stmtInsert->error;
    }

    // Tutup statement
    $stmtInsert->close();
}
