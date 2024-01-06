<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data Iuran</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
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
</body>
</html>
