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
