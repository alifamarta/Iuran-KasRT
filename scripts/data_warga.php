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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Warga</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        /* Gaya umum di luar media query */

        /* Media Query Bootstrap untuk perangkat seluler */
        @media (max-width: 767px) {
            body {
                padding-top: 70px; /* Sesuaikan top padding untuk fixed navbar pada layar kecil */
            }


            .table-responsive {
                overflow-x: auto;
            }
        }

    </style>
</head>
<body>

<div class="container mt-5">
    <h2>Data Warga</h2>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>No Rumah</th>
            <th>Status</th>
            <th>Tindakan</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Loop through the result set and display data
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['nik']}</td>";
            echo "<td>{$row['nama']}</td>";
            echo "<td>{$row['jenis_kelamin']}</td>";
            echo "<td>{$row['no_hp']}</td>";
            echo "<td>{$row['alamat']}</td>";
            echo "<td>{$row['no_rumah']}</td>";
            echo "<td>{$row['status']}</td>";
            echo "<td>
                    <a href='ubah_warga.php?id={$row['id']}' class='btn btn-primary'>Ubah</a>
                    <a href='hapus_warga.php?id={$row['id']}' class='btn btn-primary'>Hapus</a>
                  </td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
