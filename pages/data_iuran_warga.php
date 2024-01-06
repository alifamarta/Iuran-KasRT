<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data Iuran</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
<div class="container mt-5 table-responsive">
    <h2 class="mb-4">Data Iuran</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>ID Warga</th>
            <th>Nominal</th>
            <th>Keterangan</th>
            <th>Jenis Iuran</th> <!-- Tambahkan kolom jenis_iuran -->
        </tr>
        </thead>
        <tbody>
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

        // Query untuk mendapatkan data dari tabel
        $query = "SELECT id, tanggal, warga_id, nominal, keterangan, jenis_iuran FROM iuran";
        $result = $conn->query($query);

        // Tampilkan data dalam tabel
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["tanggal"] . "</td>";
                echo "<td>" . $row["warga_id"] . "</td>";
                echo "<td>" . $row["nominal"] . "</td>";
                echo "<td>" . $row["keterangan"] . "</td>";
                echo "<td>" . $row["jenis_iuran"] . "</td>";
                        echo "</tr>";
                    }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
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
</body>

</html>
