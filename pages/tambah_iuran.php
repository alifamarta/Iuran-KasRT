<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data Iuran</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
    <h2 class="mb-4">Tambah Data Iuran Warga</h2>
    <form action="../scripts/php/proses_tambah_iuran.php" method="post">
        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" class="form-control" name="tanggal" required>
        </div>

        <div class="form-group">
            <label for="warga_id">Warga ID:</label>
            <input type="number" class="form-control" name="warga_id" required>
        </div>

        <div class="form-group">
            <label for="nominal">Nominal:</label>
            <input type="number" class="form-control" name="nominal" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan:</label>
            <select class="form-control" name="keterangan">
                <option value="Dibayar">Dibayar</option>
                <option value="Belum Di Bayar">Belum Di Bayar</option>
            </select>
        </div>

        <div class="form-group">
            <label for="jenis_iuran">Jenis Iuran:</label>
            <select class="form-control" name="jenis_iuran" required>
                <option value="Kas">Kas</option>
                <option value="Sampah">Sampah</option>
                <option value="Sumbangan">Sumbangan</option>
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="../scripts/js/sidebar.js"></script>
<script src="../scripts/js/direct.js"></script>
</body>
</html>
