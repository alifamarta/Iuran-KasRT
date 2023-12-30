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

    // Query to retrieve data from the warga table based on ID
    $selectQuery = "SELECT * FROM warga WHERE id = ?";
    $stmt = $conn->prepare($selectQuery);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Display the form for updating data
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Ubah Data Warga</title>
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        </head>
        <body>

        <div class="container mt-5">
            <h2>Ubah Data Warga</h2>

            <form method="post" action="proses-ubah-warga.php">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                <div class="form-group">
                    <label for="nik">NIK:</label>
                    <input type="text" class="form-control" name="nik" value="<?php echo $row['nik']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select class="form-control" name="jenis_kelamin">
                        <option value="L" <?php echo ($row['jenis_kelamin'] == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                        <option value="P" <?php echo ($row['jenis_kelamin'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="no_hp">Nomor HP:</label>
                    <input type="text" class="form-control" name="no_hp" value="<?php echo $row['no_hp']; ?>">
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea class="form-control" name="alamat"><?php echo $row['alamat']; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="no_rumah">Nomor Rumah:</label>
                    <input type="text" class="form-control" name="no_rumah" value="<?php echo $row['no_rumah']; ?>">
                </div>

                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" name="status">
                        <option value="1" <?php echo ($row['status'] == 1) ? 'selected' : ''; ?>>Aktif</option>
                        <option value="2" <?php echo ($row['status'] == 2) ? 'selected' : ''; ?>>Non Aktif</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="users_id">ID User:</label>
                    <input type="text" class="form-control" name="users_id" value="<?php echo $row['users_id']; ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>

        <!-- Bootstrap JS and Popper.js -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        </body>
        </html>

        <?php
    } else {
        echo "Data warga dengan ID $id tidak ditemukan.";
    }

    $stmt->close();
} else {
    echo "Invalid ID parameter.";
}

// Close the
