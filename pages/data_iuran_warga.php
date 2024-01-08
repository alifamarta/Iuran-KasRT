<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/home.css">
    <link rel="stylesheet" href="../styles/sidebar.css">
    <link rel="stylesheet" href="../styles/table.css">
    <title>Iuran Kas RT</title>
</head>

<body>
    <!-- Tampilan menu sidebar -->
    <div id="sidebar" class="sidebar">
        <a href="index_user.php" style="color: white;"><img src="../media/mini_logo_iuran.png" width="20"
                style="vertical-align:middle;"> App Iuran Kas RT</a>
        <hr class="divider">
        <a href="javascript:void(0)" class="close" onclick="closeNav()">&times;</a>
        <a href="index_user.php">Home</a>
        <a href="data_warga_user.php">Data Warga</a>
        <a href="data_iuran_warga.php" class="active">Data Iuran Warga</a>
        <a href="jumlah_kas_user.php">Jumlah Kas</a>
    </div>
    <!-- Tampilan navbar dengan tombol burger -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #118eea;">
        <div class="nav-content">
            <button class="sidebar-toggle btn" onclick="openNav()">&#9776;</button>
            <a href="index_user.php" class="navbar-brand">Aplikasi Iuran Kas RT</a>
        </div>
    </nav>
    <div class="container mt-5 table-responsive mb-5">
        <h2 class="mb-4">Data Iuran</h2>
        <table class="table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tanggal</th>
                    <th>ID Warga</th>
                    <th>Nominal</th>
                    <th>Keterangan</th>
                    <th>Jenis Iuran</th>
                </tr>
            </thead>
            <tbody>
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
    <script src="../scripts/js/sidebar.js"></script>
</body>

</html>