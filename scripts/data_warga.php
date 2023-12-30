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

// Query to retrieve data from the warga table
$sql = "SELECT * FROM warga";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>
