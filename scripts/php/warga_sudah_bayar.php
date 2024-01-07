<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_kas_rt";
$conn = new mysqli($host, $username, $password, $database);
// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
// Query untuk mendapatkan data warga yang belum membayar iuran
$query = "SELECT warga.*, iuran.*
          FROM warga
          LEFT JOIN iuran ON warga.id = iuran.warga_id
          WHERE iuran.keterangan = 'Dibayar'";
$result = $conn->query($query);
// Tampilkan hasil dalam tabel
if ($result->num_rows > 0) {
    echo '<div class="table-responsive"> 
                <table class="table-bordered">';
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID Warga</th>";
    echo "<th>NIK</th>";
    echo "<th>Nama</th>";
    echo "<th>Jenis Kelamin</th>";
    echo "<th>No HP</th>";
    echo "<th>Alamat</th>";
    echo "<th>No Rumah</th>";
    echo "<th>Status</th>";
    echo "<th>Tanggal Iuran</th>";
    echo "<th>Nominal</th>";
    echo "<th>Keterangan</th>";
    echo "<th>Jenis Iuran</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['nik']}</td>";
        echo "<td>{$row['nama']}</td>";
        echo "<td>{$row['jenis_kelamin']}</td>";
        echo "<td>{$row['no_hp']}</td>";
        echo "<td>{$row['alamat']}</td>";
        echo "<td>{$row['no_rumah']}</td>";
        echo "<td>{$row['status']}</td>";
        echo "<td>{$row['tanggal']}</td>";
        echo "<td>{$row['nominal']}</td>";
        echo "<td>{$row['keterangan']}</td>";
        echo "<td>{$row['jenis_iuran']}</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
} else {
    echo "<p class='mt-4'>Semua warga belum membayar iuran.</p>";
}
// Tutup koneksi
$conn->close();
?>