<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_kas_rt";

$conn = new mysqli($servername, $username, $password, $dbname);

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

    $checkDuplicateQuery = "SELECT COUNT(*) as count FROM warga WHERE nik = ?";
    $stmt = $conn->prepare($checkDuplicateQuery);
    $stmt->bind_param("s", $nik);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row['count'] > 0) {
        echo "Error: NIK '$nik' sudah ada dalam database.";
    } else {
        $insertQuery = "INSERT INTO warga (nik, nama, jenis_kelamin, no_hp, alamat, no_rumah, status)
                        VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ssssssi", $nik, $nama, $jenis_kelamin, $no_hp, $alamat, $no_rumah, $status);


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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Data Warga</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Formulir Data Warga</h2>

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
            <select class="form-control" name="jenis_kelamin" required>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="no_hp">Nomor HP:</label>
            <input type="text" class="form-control" name="no_hp" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea class="form-control" name="alamat" required></textarea>
        </div>

        <div class="form-group">
            <label for="no_rumah">Nomor Rumah:</label>
            <input type="text" class="form-control" name="no_rumah" required>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" name="status" required>
                <option value="1">Aktif</option>
                <option value="2">Non Aktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
