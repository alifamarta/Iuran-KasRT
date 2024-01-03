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
    <title>Iuran Kas RT</title>
</head>

<body>
    <!-- Tampilan menu sidebar -->
    <div id="sidebar" class="sidebar">
        <a href="#" style="color: white;"><img src="../media/mini_logo_iuran.png" width="20" style="vertical-align:middle;"> Aplikasi Iuran Kas</a>
        <hr class="divider">
        <a href="javascript:void(0)" class="close" onclick="closeNav()">&#9776;</a>
        <a href="#" class="active">Home</a>
        <a href="data_warga.php">Data Warga</a>
        <a href="../pages/tambah_warga.php">Tambah Data Warga</a>
        <a href="../pages/data_iuran_warga.php">Data Iuran Warga</a>
        <a href="../pages/tambah_iuran.php">Tambah Iuran Warga</a>
        <a href="#">Data Belum Membayar</a>s
        <a href="../scripts/laporan_transaksi.php">Tambbah Data Belum Membayar</a>
        <a href="#">Jumlah Kas</a>
    </div>
    <!-- Tampilan navbar dengan tombol burger -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #118eea;">
        <div class="nav-content">
            <button class="sidebar-toggle" onclick="openNav()">&#9776;</button>
            <a href="#" class="navbar-brand">Aplikasi Iuran Kas</a>
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
                    <p class="card-text fw-bold">Daftar Kas Warga</p>
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