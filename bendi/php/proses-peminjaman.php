<?php
// Menyambungkan ke database
$host = "localhost"; // Ganti dengan host Anda
$username = "root";  // Ganti dengan username Anda
$password = "";      // Ganti dengan password Anda
$dbname = "bendi_car"; // Ganti dengan nama database Anda

$conn = new mysqli($host, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $nama = $_POST['nama'];
    $kontak = $_POST['kontak'];
    $mobil = $_POST['mobil'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    // Proses upload file
    if (isset($_FILES['identitas']) && $_FILES['identitas']['error'] == 0) {
        $file_tmp = $_FILES['identitas']['tmp_name'];
        $file_name = $_FILES['identitas']['name'];
        $file_path = 'uploads/' . $file_name;

        // Pindahkan file ke folder 'uploads'
        if (move_uploaded_file($file_tmp, $file_path)) {
            // Query untuk menyimpan data ke database
            $sql = "INSERT INTO penyewaan (nama, kontak, mobil, tanggal_pinjam, tanggal_kembali, identitas) 
                    VALUES ('$nama', '$kontak', '$mobil', '$tanggal_pinjam', '$tanggal_kembali', '$file_name')";

            if ($conn->query($sql) === TRUE) {
                echo "Data berhasil disimpan. File telah diupload.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error: Gagal mengupload file.";
        }
    } else {
        echo "Error: Tidak ada file yang diupload.";
    }
}

$conn->close();
?>
