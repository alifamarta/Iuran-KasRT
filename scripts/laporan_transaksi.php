<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Warga Belum Bayar Iuran</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Data Warga Belum Bayar Iuran</h2>

    <!-- Form untuk memfilter data -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="bulan">Bulan</label>
                <select class="form-control" id="bulan" name="bulan">
                    <!-- Opsi bulan -->
                    <?php
                    $selectedMonth = isset($_GET['bulan']) ? $_GET['bulan'] : date('m');
                    for ($i = 1; $i <= 12; $i++) {
                        $selected = ($selectedMonth == $i) ? 'selected' : '';
                        echo "<option value='$i' $selected>" . date("F", mktime(0, 0, 0, $i, 1)) . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="tahun">Tahun</label>
                <select class="form-control" id="tahun" name="tahun">
                    <!-- Opsi tahun -->
                    <?php
                    $selectedYear = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');
                    for ($i = date('Y'); $i >= 2020; $i--) {
                        $selected = ($selectedYear == $i) ? 'selected' : '';
                        echo "<option value='$i' $selected>$i</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="jenis_iuran">Jenis Iuran</label>
                <select class="form-control" id="jenis_iuran" name="jenis_iuran">
                    <option value="1" <?php echo (isset($_GET['jenis_iuran']) && $_GET['jenis_iuran'] == 1) ? 'selected' : ''; ?>>Kas</option>
                    <option value="2" <?php echo (isset($_GET['jenis_iuran']) && $_GET['jenis_iuran'] == 2) ? 'selected' : ''; ?>>Sampah</option>
                    <option value="3" <?php echo (isset($_GET['jenis_iuran']) && $_GET['jenis_iuran'] == 3) ? 'selected' : ''; ?>>Sumbangan</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

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

    // Inisialisasi filter bulan, tahun, dan jenis iuran
    $selectedMonth = isset($_GET['bulan']) ? $_GET['bulan'] : date('m');
    $selectedYear = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');
    $selectedJenisIuran = isset($_GET['jenis_iuran']) ? $_GET['jenis_iuran'] : '';

    // Query untuk mengambil data warga yang belum membayar iuran
    // Query untuk mengambil data warga yang belum membayar iuran
    $sql = "SELECT * FROM warga
        WHERE id_warga NOT IN (
            SELECT id FROM iuran
            WHERE MONTH(tanggal) = '$selectedMonth'
            AND YEAR(tanggal) = '$selectedYear'
            AND jenis_iuran = '$selectedJenisIuran'
            AND status_pembayaran = 1
        )";


    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID Warga</th>";
        echo "<th>Nama</th>";
        echo "<th>Alamat</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id_warga"] . "</td>";
            echo "<td>" . $row["nama"] . "</td>";
            echo "<td>" . $row["alamat"] . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<div class='alert alert-info mt-3' role='alert'>Tidak ada data warga yang belum membayar iuran.</div>";
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

