<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Data Iuran</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Daftar Data Iuran</h2>

    <?php
    // Sertakan konfigurasi koneksi database sesuai kebutuhan
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_kas_rt";

    // Buat koneksi ke database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query untuk mengambil data dari tabel
    $sql = "SELECT * FROM iuran";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Tanggal</th>";
        echo "<th>Nominal</th>";
        echo "<th>Keterangan</th>";
        echo "<th>Jenis Iuran</th>";
        echo "<th>Status Pembayaran</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["tanggal"] . "</td>";
            echo "<td>" . $row["nominal"] . "</td>";
            echo "<td>" . $row["keterangan"] . "</td>";
            echo "<td>" . $row["jenis_iuran"] . "</td>";
            echo "<td>" . ($row["status_pembayaran"] == 1 ? 'Sudah Bayar' : 'Belum Bayar') . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<div class='alert alert-info mt-3' role='alert'>Tidak ada data yang ditemukan.</div>";
    }

    // Tutup koneksi database
    $conn->close();
    ?>

</div>

<!-- Bootstrap JS dan Popper.js -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
