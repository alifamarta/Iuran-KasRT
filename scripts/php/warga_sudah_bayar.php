<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Data Warga</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        .table-responsive {
            max-height: 400px; /* Atur tinggi maksimal tabel yang dapat di-scroll */
            overflow-y: auto; /* Atur overflow-y ke auto agar dapat di-scroll jika melebihi tinggi maksimal */
        }
    </style>
</head>

<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Filter Data Warga</h2>

    <?php
    // Proses Filter Data Warga
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Tangkap data dari formulir
        $bulan = $_POST["bulan"];
        $tahun = $_POST["tahun"];
        $jenis_iuran = $_POST["jenis_iuran"];

        // Lakukan filter data warga berdasarkan bulan, tahun, jenis iuran, dan yang belum membayar
        $query = "SELECT warga.*, iuran.* FROM warga
                  LEFT JOIN iuran ON warga.id = iuran.warga_id
                  WHERE MONTH(iuran.tanggal) = ? AND YEAR(iuran.tanggal) = ? 
                  AND iuran.jenis_iuran = ? AND iuran.keterangan = 'Dibayar'";

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

        // Gunakan prepared statement
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $bulan, $tahun, $jenis_iuran);
        $stmt->execute();

        // Dapatkan hasil query
        $result = $stmt->get_result();

        // Tampilkan hasil dalam tabel
        if ($result->num_rows > 0) {
            echo "<h3 class='mt-4'>Hasil Filter:</h3>";
            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered table-hover'>";
            echo "<thead class='table-primary'>";
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
            echo "<p class='mt-4'>Tidak ada data yang sesuai dengan filter.</p>";
        }

        // Tutup statement dan koneksi
        $stmt->close();
        $conn->close();
    }
    ?>

    <form action="" method="post">
        <div class="mb-3">
            <label for="bulan" class="form-label">Bulan</label>
            <input type="text" class="form-control" id="bulan" name="bulan" required>
        </div>

        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="text" class="form-control" id="tahun" name="tahun" required>
        </div>

        <div class="mb-3">
            <label for="jenis_iuran" class="form-label">Jenis Iuran</label>
            <select class="form-select" id="jenis_iuran" name="jenis_iuran" required>
                <option value="1">Kas</option>
                <option value="2">Sampah</option>
                <option value="3">Sumbangan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Filter Data</button>
    </form>

</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</body>

</html>
