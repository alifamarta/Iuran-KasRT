<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Data Warga</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/home.css">
    <link rel="stylesheet" href="../styles/sidebar.css">
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

<div class="container mt-5">
    <h2 class="text-center mb-4">Filter Data Warga Sudah Membayar</h2>
    <form action="../scripts/php/warga_sudah_bayar.php" method="post">
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
<script src="../scripts/js/sidebar.js"></script>
<script src="../scripts/js/direct.js"></script>

</body>

</html>
