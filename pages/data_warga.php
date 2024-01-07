<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Warga</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/sidebar.css">
    <link rel="stylesheet" href="../styles/table.css">
    <style>
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
        <a href="javascript:void(0)" class="close" onclick="closeNav()">&times;</a>
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
    <div class="container mt-5 mb-5">
        <h2 style="text-align: center">Data Warga</h2>
        <br>
        <div class="table-responsive">
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
                    include '../scripts/php/data_warga.php'
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