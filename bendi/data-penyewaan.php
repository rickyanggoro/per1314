<?php
// Menghubungkan ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bendi_car"; // Nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil data penyewaan dari tabel penyewaan
$sql = "SELECT * FROM penyewaan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penyewaan Mobil</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Data Penyewaan Mobil</h1>
    </header>

    <main>
        <!-- Tabel untuk menampilkan data penyewaan -->
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Penyewa</th>
                    <th>Kontak</th>
                    <th>Mobil</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Identitas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Menampilkan data dari setiap baris hasil query
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["nama"] . "</td>
                                <td>" . $row["kontak"] . "</td>
                                <td>" . $row["mobil"] . "</td>
                                <td>" . $row["tanggal_pinjam"] . "</td>
                                <td>" . $row["tanggal_kembali"] . "</td>
                                <td><img src='uploads/" . $row["identitas"] . "' width='100' height='100'></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Tidak ada data penyewaan.</td></tr>";
                }

                // Menutup koneksi
                $conn->close();
                ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 PT. Bendi Car</p>
    </footer>
</body>
</html>
