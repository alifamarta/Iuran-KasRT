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

// Check if ID parameter is set in the URL
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Query to delete data from the warga table
    $deleteQuery = "DELETE FROM warga WHERE id = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Warga dengan ID $id berhasil dihapus.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid ID parameter.";
}

// Close the database connection
$conn->close();
?>
