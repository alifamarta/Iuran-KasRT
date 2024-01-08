<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        #sidebar {
            width: 250px;
            height: 100vh;
            background-color: #333;
            color: #fff;
            padding-top: 20px;
        }

        #sidebar a {
            padding: 10px;
            text-decoration: none;
            color: #fff;
            display: block;
        }

        #content {
            flex: 1;
            padding: 20px;
        }

        .data-container {
            display: none;
        }
    </style>
</head>
<body>

<div id="sidebar">
    <a href="#" onclick="showData('warga')">Data Warga</a>
    <a href="#" onclick="showData('iuran')">Data Kas Warga</a>
    <a href="#" onclick="showData('kas')">Jumlah Kas</a>
    <a href="../index.php">Login</a>
</div>

<div id="content">
    <div id="warga" class="data-container">
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Data Warga</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
            <style>
                table {
                    width: 100%;
                }

                th {
                    background-color: #eaecf0;
                    color: black;
                }

                th,
                td {
                    text-align: left;
                }

                tr:nth-child(even) {
                    background-color: #f2f2f2
                }

                @media screen and (max-width: 800px) {
                    .btn-danger {
                        margin-top: 10px;
                    }
                }
            </style>
        </head>

        <body>

        <div class="container mt-5">
            <h2 class="text-center">Data Warga</h2>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-primary">
                    <tr>
                        <th scope="col">User ID</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Rumah</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Koneksi ke database
                    $host = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "db_kas_rt";

                    $conn = new mysqli($host, $username, $password, $database);

                    // Periksa koneksi
                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }

                    // Query untuk mendapatkan semua data warga
                    $query = "SELECT * FROM warga";
                    $result = $conn->query($query);


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
                        echo "</tr>";
                    }

                    // Tutup koneksi
                    $conn->close();
                    ?>
                    </tbody>
                </table>
            </div>
        </div>


        <!-- Bootstrap JS and Popper.js -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>


        </body>

        </html>

        <!-- Tampilkan data warga di sini -->
    </div>
    <div id="iuran" class="data-container">
        <div class="container mt-5 table-responsive">
            <h2 class="mb-4 text-center">Data Kas Warga</h2>
            <table class="table" style="border-top: 3px solid #007bff;">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tanggal</th>
                    <th>Warga ID</th>
                    <th>Nominal</th>
                    <th>Keterangan</th>
                    <th>Jenis Iuran</th>
                </tr>
                </thead>
                <tbody>
                <?php
                // Koneksi ke database
                $host = "localhost";
                $username = "root";
                $password = "";
                $database = "db_kas_rt";

                $conn = new mysqli($host, $username, $password, $database);

                // Periksa koneksi
                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                // Query untuk mendapatkan data dari tabel
                $query = "SELECT * FROM iuran";
                $result = $conn->query($query);

                // Tampilkan data dalam tabel
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["tanggal"] . "</td>";
                        echo "<td>" . $row["warga_id"] . "</td>";
                        echo "<td>" . $row["nominal"] . "</td>";
                        echo "<td>" . $row["keterangan"] . "</td>";
                        echo "<td>" . $row["jenis_iuran"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
                }

                // Tutup koneksi
                $conn->close();
                ?>
                </tbody>
            </table>
        </div>

        <!-- Bootstrap JS and Popper.js -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </div>

    <div id="kas" class="data-container">
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Jumlah Kas Warga</title>
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <style>

                body {
                    background-color: #f8f9fa;
                }

                .container {
                    background-color: #ffffff;
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    overflow-x: auto;
                }
            </style>
        </head>

        <body>
        <div class="container mt-5 table-responsive">
            <h2 class="mb-4">Jumlah Kas Warga </h2>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Warga</th>
                    <th>NIK</th>
                    <th>Tanggal</th>
                    <th>Jumlah Kas</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $host = "localhost";
                $username = "root";
                $password = "";
                $database = "db_kas_rt";

                $conn = new mysqli($host, $username, $password, $database);

                // Periksa koneksi
                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }


                $query = "SELECT warga.id AS warga_id, warga.nama, warga.nik, iuran.tanggal, iuran.nominal 
                          FROM warga 
                          INNER JOIN iuran ON warga.id = iuran.warga_id 
                          WHERE iuran.jenis_iuran = 'Kas' AND iuran.keterangan = 'Dibayar'";
                $result = $conn->query($query);

                // Tampilkan data dalam tabel
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["warga_id"] . "</td>";
                        echo "<td>" . $row["nama"] . "</td>";
                        echo "<td>" . $row["nik"] . "</td>";
                        echo "<td>" . $row["tanggal"] . "</td>";
                        echo "<td>" . $row["nominal"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
                }

                // Tutup koneksi
                $conn->close();
                ?>
                </tbody>
            </table>
        </div>

        <!-- Bootstrap JS and Popper.js -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        </body>

        </html>

        <!-- Tampilkan jumlah kas di sini -->
    </div>
</div>

<script>
    function showData(dataType) {
        // Sembunyikan semua kontainer data
        var dataContainers = document.getElementsByClassName('data-container');
        for (var i = 0; i < dataContainers.length; i++) {
            dataContainers[i].style.display = 'none';
        }

        // Tampilkan kontainer data sesuai dengan jenis data yang dipilih
        document.getElementById(dataType).style.display = 'block';
    }
</script>

</body>
</html>
