<?php
session_start();

// Cek jika pengguna belum login, redirect ke halaman login
if(!isset($_SESSION["username"])){
    header("location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/home.css">
    <link rel="stylesheet" href="../styles/sidebar.css">
    <title>Iuran Kas RT</title>
</head>

<body>
    <!-- Tampilan menu sidebar -->
    <div id="sidebar" class="sidebar">
            <a href="#" style="color: white;"><img src="../media/mini_logo_iuran.png" width="20" style="vertical-align:middle;"> App Iuran Kas RT</a>
            <hr class="divider">
            <a href="javascript:void(0)" class="close" onclick="closeNav()">&times;</a>
            <a href="index.php" class="active">Home</a>
            <a href="data_warga.php">Data Warga</a>
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
            <button class="sidebar-toggle btn" onclick="openNav()">&#9776;</button>
            <a href="#" class="navbar-brand">Aplikasi Iuran Kas RT</a>
        </div>
    </nav>
    <!-- Isi konten -->
    <div class="container mt-4">
        <!-- Header dari konten -->
        <header style="text-align: left;">
            <img style="vertical-align:middle" src="../media/home.png" width="30"> &nbsp;
            <span class="h4 fw-bold" style="vertical-align:middle">Home</span>
        </header>
        <!-- Card untuk menuju page lain -->
        <div class="container-fluid row mt-5">
            <div class="card bg-user card-user" onclick="toWarga()">
                <div class="card-body">
                    <p class="card-text fw-bold">Data Warga</p>
                </div>
            </div>
            <div class="card bg-kasWarga card-kasWarga" onclick="toKasWarga()">
                <div class="card-body">
                    <p class="card-text fw-bold">Data Sudah Membayar Iuran</p>
                </div>
            </div>
            <div class="card bg-kas card-kas" onclick="toKas()">
                <div class="card-body">
                    <p class="card-text fw-bold">Jumlah Kas</p>
                </div>
            </div>
        </div>
    </div>
    <script src="../scripts/js/sidebar.js"></script>
    <script src="../scripts/js/direct.js"></script>
</body>

</html>