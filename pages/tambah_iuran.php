<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Data Iuran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
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