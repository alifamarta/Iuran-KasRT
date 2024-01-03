<?php
// Koneksi ke database (sesuaikan dengan informasi database Anda)
$host = "localhost";
$username = "root";
$password = "";
$database = "db_kas_rt";

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil ID Warga dari parameter GET
if (isset($_GET['id'])) {
    $id_warga = $_GET['id'];

    // Query untuk mendapatkan data warga berdasarkan ID
    $query = "SELECT * FROM warga WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_warga);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data warga tidak ditemukan.";
        exit;
    }

    $stmt->close();
} else {
    echo "ID Warga tidak diberikan.";
    exit;
}

// Proses update data warga
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $no_hp = $_POST["no_hp"];
    $alamat = $_POST["alamat"];
    $no_rumah = $_POST["no_rumah"];
    $status = $_POST["status"];

    // Query untuk update data warga
    $updateQuery = "UPDATE warga SET nik=?, nama=?, jenis_kelamin=?, no_hp=?, alamat=?, no_rumah=?, status=? WHERE id=?";
    $stmtUpdate = $conn->prepare($updateQuery);
    $stmtUpdate->bind_param("ssssssii", $nik, $nama, $jenis_kelamin, $no_hp, $alamat, $no_rumah, $status, $id_warga);

    if ($stmtUpdate->execute()) {
        // Jika berhasil, arahkan ke halaman sukses atau sesuaikan dengan kebutuhan
        header("Location: ../pages/data_warga.php");
    } else {
        echo "Error: " . $stmtUpdate->error;
    }

    // Tutup statement
    $stmtUpdate->close();
}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Warga</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

<div class="container mt-5">
    <h2 class="mb-4">Ubah Data Warga</h2>
    <form action="" method="post">
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $row['nik']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="L" <?php if ($row['jenis_kelamin'] == 'L') echo 'selected'; ?>>Laki-Laki</option>
                <option value="P" <?php if ($row['jenis_kelamin'] == 'P') echo 'selected'; ?>>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $row['no_hp']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" required><?php echo $row['alamat']; ?></textarea>
        </div>

        <div class="mb-3">
            <label for="no_rumah" class="form-label">No Rumah</label>
            <input type="text" class="form-control" id="no_rumah" name="no_rumah" value="<?php echo $row['no_rumah']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="0" <?php if ($row['status'] == 0) echo 'selected'; ?>>Aktif</option>
                <option value="0" <?php if ($row['status'] == 0) echo 'selected'; ?>>Non-Aktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</body>

</html>