<?php
// Connection to the database (replace with your actual database connection details)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_kas_rt";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $no_hp = $_POST["no_hp"];
    $alamat = $_POST["alamat"];
    $no_rumah = $_POST["no_rumah"];
    $status = $_POST["status"];
    $users_id = $_POST["users_id"];

    // Update data in the warga table using prepared statement
    $updateQuery = "UPDATE warga 
                    SET nik = ?, nama = ?, jenis_kelamin = ?, no_hp = ?, alamat = ?, no_rumah = ?, status = ?, users_id = ?
                    WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("ssssssiii", $nik, $nama, $jenis_kelamin, $no_hp, $alamat, $no_rumah, $status, $users_id, $id);

    if ($stmt->execute()) {
        echo "Warga berhasil diubah";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
