<?php

// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "db_kas_rt";

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mendapatkan semua data warga
$query = "SELECT * FROM warga";
$result = $conn->query($query);


while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['id']}</td>"; // Ganti id menjadi users_id jika memang users_id yang dimaksud
    echo "<td>{$row['nik']}</td>";
    echo "<td>{$row['nama']}</td>";
    echo "<td>{$row['jenis_kelamin']}</td>";
    echo "<td>{$row['no_hp']}</td>";
    echo "<td>{$row['alamat']}</td>";
    echo "<td>{$row['no_rumah']}</td>";
    echo "<td>{$row['status']}</td>";
    echo "<td>
                            <a href='../scripts/php/ubah_warga.php?id={$row['id']}' class='btn btn-primary'>Ubah</a>
                            <a href='javascript:void(0);' onclick='konfirmasiHapus({$row['id']})' class='btn btn-danger'>Hapus</a>
                        </td>";
    echo "</tr>";
}

// Tutup koneksi
$conn->close();

?>