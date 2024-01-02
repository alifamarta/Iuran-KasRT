<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Warga</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

<div class="container mt-5">
    <h2 style="text-align: center">Data Warga</h2>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered table-sm">
            <thead>
            <tr>
                <th>User ID</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>No Rumah</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
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

            // Query untuk mendapatkan semua data warga
            $query = "SELECT * FROM warga";
            $result = $conn->query($query);

            // Loop through the result set and display data
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>"; // Ganti id menjadi users_id jika memang users_id yang dimaksud
                echo "<td>{$row['nik']}</td>";
                echo "<td>{$row['nama']}</td>";
                echo "<td>{$row['jenis_kelamin']}</td>";
                echo "<td>{$row['no_hp']}</td>";
                echo "<td>{$row['alamat']}</td>";
                echo "<td>{$row['no_rumah']}</td>";
                echo "<td>{$row['status']}</td>";
                echo "<td>
                        <a href='../scripts/ubah_warga.php?id={$row['id']}' class='btn btn-primary'>Ubah</a>
                        <a href='javascript:void(0);' onclick='konfirmasiHapus({$row['id']})' class='btn btn-danger'>Hapus</a>
                      </td>";
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

<script>
    function konfirmasiHapus(id) {
        var konfirmasi = confirm("Apakah Anda yakin ingin menghapus data ini? Data Warga Dan Iuran Akan Ikut Kehapus");

        if (konfirmasi) {
            // Redirect ke skrip hapus_warga.php jika konfirmasi diterima
            window.location.href = `../scripts/hapus_warga.php?id=${id}`;
        }
    }
</script>

</body>

</html>

