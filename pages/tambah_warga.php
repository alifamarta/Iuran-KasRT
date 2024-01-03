<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Warga</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/sidebar.css">
    <style>
        /* Import Font */
        @import url('https://fonts.googleapis.com/css2?family=Istok+Web&display=swap');

        body {
            background-color: #f8f9fa;
            font-family: 'Istok Web', sans-serif;
        }

        .container {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
            margin-bottom: 30px;
        }

        .btn-primary {
            background-color: #118eea;
        }

        @media screen and (max-width: 800px) {
            .container{
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <!-- Tampilan menu sidebar -->
    <div id="sidebar" class="sidebar">
            <a href="#" style="color: white;"><img src="../media/mini_logo_iuran.png" width="20" style="vertical-align:middle;"> App Iuran Kas RT</a>
            <hr class="divider">
            <a href="javascript:void(0)" class="close" onclick="closeNav()">&#9776;</a>
            <a href="index.php">Home</a>
            <a href="data_warga.php">Data Warga</a>
            <a href="tambah_warga.php" class="active">Tambah Data Warga</a>
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
            <a href="#" class="navbar-brand">App Iuran Kas RT</a>
        </div>
    </nav>
    <div class="container mt-5">
        <h2>Tambah Data Warga</h2>
        <form method="POST" action="../scripts/php/proses_tambah_warga.php">
            <div class="container-fluid mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" required placeholder="NIK">
            </div>
            <div class="container-fluid mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required placeholder="Nama">
            </div>
            <div class="container-fluid mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option selected disabled>--Jenis Kelamin--</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="container-fluid mb-3">
                <label for="no_hp" class="form-label">No. HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" required placeholder="Nomor HP">
            </div>
            <div class="container-fluid mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" required placeholder="Alamat"></textarea>
            </div>
            <div class="container-fluid mb-3">
                <label for="no_rumah" class="form-label">No. Rumah</label>
                <input type="text" class="form-control" id="no_rumah" name="no_rumah" required placeholder="Nomor Rumah">
            </div>
            <div class="container-fluid mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required placeholder="Status">
                    <option value="Aktif">Aktif</option>
                    <option value="Non Aktif">Non Aktif</option>
                </select>
            </div>
            <div class="container-fluid mb-3">
                <button type="submit" class="btn btn-primary">Tambah Data Warga</button>
            </div>
        </form>
    </div>
    <script src="../scripts/js/sidebar.js"></script>
</body>

</html>