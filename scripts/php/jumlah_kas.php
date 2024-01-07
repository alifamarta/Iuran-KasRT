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