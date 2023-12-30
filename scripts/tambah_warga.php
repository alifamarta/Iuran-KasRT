<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_kas_rt";

$conn = new mysqli($servername, $username, $password, $dbname);

// cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $no_hp = $_POST["no_hp"];
    $alamat = $_POST["alamat"];
    $no_rumah = $_POST["no_rumah"];
    $status = $_POST["status"];
    $users_id = $_POST["users_id"];

    // Validasi Data nya
    $checkDuplicateQuery = "SELECT COUNT(*) as count FROM warga WHERE nik = ?";
    $stmt = $conn->prepare($checkDuplicateQuery);
    $stmt->bind_param("s", $nik);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row['count'] > 0) {
        echo "Error: NIK '$nik' already exists in the database.";
    } else {
        // Insert data into the warga table using prepared statement
        $insertQuery = "INSERT INTO warga (nik, nama, jenis_kelamin, no_hp, alamat, no_rumah, status, users_id)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("sssssssi", $nik, $nama, $jenis_kelamin, $no_hp, $alamat, $no_rumah, $status, $users_id);

        if ($stmt->execute()) {
            echo "Warga berhasil ditambahkan";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    $stmt->close();
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en"><!-- Bootstrap CSS -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Warga</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Form Tambah Warga</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="nik">NIK:</label>
            <input type="text" class="form-control" name="nik" required>
        </div>

        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" name="nama" required>
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select class="form-control" name="jenis_kelamin">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="no_hp">Nomor HP:</label>
            <input type="text" class="form-control" name="no_hp">
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea class="form-control" name="alamat"></textarea>
        </div>

        <div class="form-group">
            <label for="no_rumah">Nomor Rumah:</label>
            <input type="text" class="form-control" name="no_rumah">
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" name="status">
                <option value="1">Aktif</option>
                <option value="2">Non Aktif</option>
            </select>
        </div>

        <div class="form-group">
            <label for="users_id">ID User:</label>
            <input type="text" class="form-control" name="users_id" required>
        </div>

        <button type="submit" class="btn btn-primary">Tambah Warga</button>
    </form>
</div>

<!-- Script CSS Dan Js-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
