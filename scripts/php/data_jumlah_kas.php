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
    $tahun = $_POST["tahun"];

    // Query untuk mengambil data jumlah kas perbulan berdasarkan tahun
    $query = "SELECT MONTH(tanggal) as bulan, SUM(nominal) as total FROM iuran
              WHERE YEAR(tanggal) = ? AND keterangan = 'Belum Di Bayar'
              GROUP BY MONTH(tanggal)";

    // Gunakan prepared statement
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $tahun);
    $stmt->execute();

    // Dapatkan hasil query
    $result = $stmt->get_result();

    // Tampilkan hasil dalam tabel Bootstrap yang lebih kecil
    echo '<!DOCTYPE html>';
    echo '<html lang="en">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<title>Data Jumlah Kas</title>';
    echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">';
    echo '</head>';
    echo '<body>';
    echo '<div class="container mt-5">';
    echo '<h2 class="mb-4 text-center">Data Jumlah Kas</h2>';
    echo '<div class="table-responsive">';
    echo '<table class="table table-sm table-bordered table-hover text-center">';
    echo '<thead class="table-primary">';
    echo '<tr>';
    echo '<th scope="col">Bulan</th>';
    echo '<th scope="col">Total</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['bulan'] . '</td>';
        echo '<td>' . $row['total'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    echo '</div>';
    echo '<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>';
    echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>';
    echo '</body>';
    echo '</html>';

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
}
?>
