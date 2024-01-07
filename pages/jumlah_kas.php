<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jumlah Kas Warga</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/home.css">
    <link rel="stylesheet" href="../styles/sidebar.css">
    <style>
        /* Tambahkan gaya CSS khusus jika diperlukan */
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }
    </style>
</head>

<body>
<!-- Tampilan menu sidebar -->
<div id="sidebar" class="sidebar">
    <a href="index.php" style="color: white;"><img src="../media/mini_logo_iuran.png" width="20" style="vertical-align:middle;"> App Iuran Kas RT</a>
    <hr class="divider">
    <a href="javascript:void(0)" class="close" onclick="closeNav()">&#9776;</a>
    <a href="index.php">Home</a>
    <a href="data_warga.php" class="active">Data Warga</a>
    <a href="tambah_warga.php">Tambah Data Warga</a>
    <a href="tambah_iuran.php">Tambah Iuran Warga</a>
    <a href="warga_sudah_bayar.php">Data Sudah Membayar</a>
    <a href="warga_belum_bayar.php">Data Belum Membayar</a>
    <a href="jumlah_kas.php">Jumlah Kas</a>
</div>
<!-- Tampilan navbar dengan tombol burger -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #118eea;">
    <div class="nav-content">
        <button class="sidebar-toggle" onclick="openNav()">&#9776;</button>
        <a href="#" class="navbar-brand">Aplikasi Iuran Kas RT</a>
    </div>
</nav>
<div class="container mt-5 table-responsive">
    <h2 class="mb-4">Jumlah Kas Warga </h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nama Warga</th>
            <th>NIK</th>
            <th>Tanggal</th>
            <th>Jumlah Kas</th>
        </tr>
        </thead>
        <tbody>
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


        $query = "SELECT warga.id AS warga_id, warga.nama, warga.nik, iuran.tanggal, iuran.nominal 
                          FROM warga 
                          INNER JOIN iuran ON warga.id = iuran.warga_id 
                          WHERE iuran.jenis_iuran = 'Kas' AND iuran.keterangan = 'Dibayar'";
        $result = $conn->query($query);

        // Tampilkan data dalam tabel
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["warga_id"] . "</td>";
                echo "<td>" . $row["nama"] . "</td>";
                echo "<td>" . $row["nik"] . "</td>";
                echo "<td>" . $row["tanggal"] . "</td>";
                echo "<td>" . $row["nominal"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
        }

        // Tutup koneksi
        $conn->close();
        ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="../scripts/js/sidebar.js"></script>
<script src="../scripts/js/direct.js"></script>
</body>

</html>
