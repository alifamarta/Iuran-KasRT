<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <title>Iuran Kas RT</title>
</head>

<body>
    <div id="sidebar" class="sidebar">
        <a href="javascript:void(0)" class="close" onclick="closeNav()">&#9776;</a>
        <a href="#" class="active">Dashboard</a>
        <a href="../scripts/data_warga.php">Data Warga</a>
        <a href="../scripts/tambah_warga.php">Tambah Data Warga</a>
        <a href="../scripts/tampil_iuran.php">Daftar Kas Warga</a>
        <a href="../scripts/iuran.php">Tambah Iuran Warga</a>
        <a href="../scripts/laporan_transaksi.php">Data Belum Membayar</a>
        <a href="#">Jumlah Kas</a>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #118eea;">
        <div class="nav-content">
            <button class="sidebar-toggle" onclick="openNav()">&#9776;</button> 
            <a href="#" class="navbar-brand">Aplikasi Iuran Kas</a>
        </div>
    </nav>
    <script src="../scripts/sidebar.js"></script>
</body>

</html>