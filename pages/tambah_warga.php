<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Warga</title>
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
    <h2>Tambah Data Warga</h2>
    <form method="POST" action="../scripts/proses_tambah_warga.php">
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" required></textarea>
        </div>
        <div class="mb-3">
            <label for="no_rumah" class="form-label">No Rumah</label>
            <input type="text" class="form-control" id="no_rumah" name="no_rumah" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="Aktif">Aktif</option>
                <option value="Non Aktif">Non Aktif</option>
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Tambah Data Warga</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>