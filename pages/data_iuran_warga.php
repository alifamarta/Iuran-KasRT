<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Iuran</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>

<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Data Iuran Warga</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Warga ID</th>
                <th>Nominal</th>
                <th>Keterangan</th>
                <th>Jenis Iuran</th>
            </tr>
            </thead>
            <tbody>
            <?php

            // Koneksi ke database
            $host = "localhost";
            $username = "root"; // Ganti dengan username database Anda
            $password = ""; // Ganti dengan password database Anda
            $database = "db_kas_rt"; // Ganti dengan nama database Anda

            $conn = new mysqli($host, $username, $password, $database);

            // Periksa koneksi
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            // Query untuk mendapatkan semua data dari tabel
            $query = "SELECT * FROM iuran"; // Ganti nama_tabel dengan nama tabel Anda
            $result = $conn->query($query);

            // Tampilkan data dalam tabel HTML
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['tanggal']}</td>";
                echo "<td>{$row['warga_id']}</td>";
                echo "<td>{$row['nominal']}</td>";
                echo "<td>{$row['keterangan']}</td>";
                echo "<td>{$row['jenis_iuran']}</td>";
                echo "</tr>";
            }

            // Tutup koneksi
            $conn->close();

            ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</body>

</html>
