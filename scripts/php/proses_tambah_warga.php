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

// Tangkap data dari formulir
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$no_rumah = $_POST['no_rumah'];
$status = $_POST['status'];

// Query untuk menambahkan data warga ke database
$query = "INSERT INTO warga (nik, nama, jenis_kelamin, no_hp, alamat, no_rumah, status) 
          VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($query);
$stmt->bind_param("sssssss", $nik, $nama, $jenis_kelamin, $no_hp, $alamat, $no_rumah, $status);

// Eksekusi query
if ($stmt->execute()) {
    // Jika berhasil, arahkan ke halaman sukses atau sesuaikan dengan kebutuhan
    header("Location: ../../pages/data_warga.php");
} else {
    // Jika terjadi kesalahan, tampilkan pesan kesalahan atau sesuaikan dengan kebutuhan
    echo "Error: " . $stmt->error;
}

// Tutup statement dan koneksi
$stmt->close();
$conn->close();

?>
