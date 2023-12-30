<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data Iuran</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Form Input Data Iuran</h2>

    <!-- Form untuk memasukkan data ke dalam tabel -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="form-group">
            <label for="nominal">Nominal</label>
            <input type="number" class="form-control" id="nominal" name="nominal" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="jenis_iuran">Jenis Iuran</label>
            <select class="form-control" id="jenis_iuran" name="jenis_iuran" required>
                <option value="1">Kas</option>
                <option value="2">Sampah</option>
                <option value="3">Sumbangan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status_pembayaran">Status Pembayaran</label>
            <select class="form-control" id="status_pembayaran" name="status_pembayaran" required>
                <option value="1">Sudah Bayar</option>
                <option value="0">Belum Bayar</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php
    // Sertakan konfigurasi koneksi database sesuai kebutuhan
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_kas_rt";

    // Buat koneksi ke database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Proses form jika ada data yang dikirim
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil data dari formulir
        $tanggal = $_POST["tanggal"];
        $nominal = $_POST["nominal"];
        $keterangan = $_POST["keterangan"];
        $jenis_iuran = $_POST["jenis_iuran"];
        $status_pembayaran = $_POST["status_pembayaran"];

        // Query untuk memasukkan data ke dalam tabel
        $sql = "INSERT INTO iuran (tanggal, nominal, keterangan, jenis_iuran, status_pembayaran)
                VALUES ('$tanggal', '$nominal', '$keterangan', '$jenis_iuran', '$status_pembayaran')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success mt-3' role='alert'>Data berhasil dimasukkan!</div>";
        } else {
            echo "<div class='alert alert-danger mt-3' role='alert'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }
    }

    // Tutup koneksi database
    $conn->close();
    ?>

</div>

<!-- Bootstrap JS dan Popper.js -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
