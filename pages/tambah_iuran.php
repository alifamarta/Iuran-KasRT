<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Data Iuran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }

        .mb-3 {
            margin-bottom: 15px;
        }
        /* Impport font */
@import url('https://fonts.googleapis.com/css2?family=Istok+Web&display=swap');

body {
    font-family: 'Istok Web', sans-serif;
}

.sidebar {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #212529;
    overflow-x: hidden;
    padding-top: 60px;
    transition: 0.5s;
}

.sidebar a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 20px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidebar a:hover {
    color: #f1f1f1;
}

.sidebar .active {
    background-color: #118eea;
    color: white;
}

.sidebar .close {
    position: absolute;
    top: 0px;
    right: 5px;
    font-size: 30px;
    margin-left: 50px;
}

.sidebar-toggle {
    font-size: 25px;
    cursor: pointer;
    background: none;
    color: #fff;
    border: none;
    padding: 10px 15px;
    margin-left: 10px;
}

.divider {
    margin-left: auto;
    margin-right: auto;
    color: #f1f1f1;
    width: 90%;
}

.sidebar-toggle:hover {
    color: #dedcdc;
}

.nav-content .navbar-brand {
    margin-left: 30px;
}

.card {
    width: 23%;
    height: 200px;
    color: white;
    border-radius: 20px;
    cursor: pointer;
}

.bg-user {
    background: url('../media/card_user.png');
    background-size: contain;
}

.bg-kasWarga {
    background: url('../media/card_daftarkas.png');
    background-size: contain;
}

.card-kasWarga,
.card-kas {
    margin-left: 80px;
}

.bg-kas {
    background: url('../media/card_kas.png');
    background-size: contain;
}

@media screen and (max-width: 800px) {
    .card {
        width: 90%;
        margin-left: 30px;
    }

    .card-user,
    .card-kasWarga,
    .card-kas {
        margin-bottom: 30px;
    }
}
    </style>
</head>

<body>
     <!-- Tampilan navbar dengan tombol burger -->
     <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #118eea;">
        <div class="nav-content">
            <button class="sidebar-toggle" onclick="openNav()">&#9776;</button>
            <a href="#" class="navbar-brand">Aplikasi Iuran Kas</a>
        </div>
    </nav>
<div class="container mt-5">
    <h2 class="mb-4">Formulir Data Iuran</h2>
    <form action="../scripts/proses_tambah_iuran.php" method="post">
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>

        <div class="mb-3">
            <label for="warga_id" class="form-label">ID Warga</label>
            <input type="text" class="form-control" id="warga_id" name="warga_id" required>
        </div>

        <div class="mb-3">
            <label for="nominal" class="form-label">Nominal</label>
            <input type="text" class="form-control" id="nominal" name="nominal" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Status Pembayaran</label>
            <select class="form-select" id="keterangan" name="keterangan" required>
                <option value="Dibayar">Dibayar</option>
                <option value="Belum Di Bayar">Belum Dibayar</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="jenis_iuran" class="form-label">Jenis Iuran</label>
            <select class="form-select" id="jenis_iuran" name="jenis_iuran" required>
                <option value="1">Kas</option>
                <option value="2">Sampah</option>
                <option value="3">Sumbangan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Tambah Iuran</button>
    </form>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>