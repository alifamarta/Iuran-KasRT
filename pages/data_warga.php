<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Warga</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/sidebar.css">
    <style>
        table {
            width: 100%;
        }
        
        th {
            background-color: #eaecf0;
            color: black;
        }

        th, td {
            text-align: left;
        }
        tr:nth-child(even){
            background-color: #f2f2f2
        }

        @media screen and (max-width: 800px) {
            .btn-danger {
                margin-top: 10px;
            }
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
            <a href="warga_sudah_bayar.php">Data Sudah Membayar</a>
            <a href="warga_sudah_bayar.php">Tambah Data Sudah Membayar</a>
            <a href="#">Data Belum Membayar</a>
            <a href="../scripts/laporan_transaksi.php">Tambah Data Belum Membayar</a>
            <a href="jumlah_kas.php">Jumlah Kas</a>
    </div>
    <!-- Tampilan navbar dengan tombol burger -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #118eea;">
        <div class="nav-content">
            <button class="sidebar-toggle" onclick="openNav()">&#9776;</button>
            <a href="#" class="navbar-brand">Aplikasi Iuran Kas RT</a>
        </div>
    </nav>
    <div class="container mt-5">
        <h2 style="text-align: center">Data Warga</h2>
        <br>
        <div class="table-responsive-xxl">
            <table class="table-bordered table-sm">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>No Rumah</th>
                        <th>Status</th>
                        <th>Aksi</th>
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

                    // Query untuk mendapatkan semua data warga
                    $query = "SELECT * FROM warga";
                    $result = $conn->query($query);

                    // Loop through the result set and display data
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
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

    <script>
        function konfirmasiHapus(id) {
            var konfirmasi = confirm("Apakah Anda yakin ingin menghapus data ini? Data Warga Dan Iuran Akan Ikut Kehapus");

            if (konfirmasi) {
                // Redirect ke skrip hapus_warga.php jika konfirmasi diterima
                window.location.href = `../scripts/php/hapus_warga.php?id=${id}`;
            }
        }
    </script>

    <script src="../scripts/js/sidebar.js"></script>
</body>

</html>