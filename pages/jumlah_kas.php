<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iuran Kas RT</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/sidebar.css">
    <link rel="stylesheet" href="../styles/table.css">
    <link rel="stylesheet" href="../styles/filter.css">
</head>

<body>
    <!-- Tampilan menu sidebar -->
    <div id="sidebar" class="sidebar">
        <a href="index.php" style="color: white;"><img src="../media/mini_logo_iuran.png" width="20"
                style="vertical-align:middle;"> App Iuran Kas RT</a>
        <hr class="divider">
        <a href="javascript:void(0)" class="close" onclick="closeNav()">&times;</a>
        <a href="index.php">Home</a>
        <a href="data_warga.php">Data Warga</a>
        <a href="tambah_warga.php">Tambah Data Warga</a>
        <a href="tambah_iuran.php">Tambah Iuran Warga</a>
        <a href="warga_sudah_bayar.php">Data Sudah Membayar</a>
        <a href="warga_belum_bayar.php">Data Belum Membayar</a>
        <a href="jumlah_kas.php" class="active">Jumlah Kas</a>
    </div>
    <!-- Tampilan navbar dengan tombol burger -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #118eea;">
        <div class="nav-content">
            <button class="sidebar-toggle" onclick="openNav()">&#9776;</button>
            <a href="index_user.php" class="navbar-brand">Aplikasi Iuran Kas RT</a>
        </div>
    </nav>
    <div class="container mt-5 mb-5">
        <h2 class="mb-4 text-center">Jumlah Kas Warga </h2>
        <div class="table-responsive">
            <table class="table-bordered">
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
                    include '../scripts/php/jumlah_kas.php';
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="../scripts/js/sidebar.js"></script>
    <script src="../scripts/js/direct.js"></script>
</body>

</html>