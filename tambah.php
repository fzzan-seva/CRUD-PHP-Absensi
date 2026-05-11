<?php
// Pastikan tidak ada spasi atau baris kosong sebelum tag <?php
require_once 'config/koneksi.php';

if (isset($_POST['simpan'])) {
    // Ambil data dan cegah SQL Injection sederhana dengan real_escape_string
    $nama = mysqli_real_escape_string($conn, $_POST['nama_siswa']);
    $ket  = mysqli_real_escape_string($conn, $_POST['keterangan']);
    $tgl  = $_POST['tanggal'];

    // Validasi: Jika tanggal kosong, gunakan tanggal hari ini sebagai default
    if (empty($tgl)) {
        $tgl = date('Y-m-d');
    }

    $query = "INSERT INTO absensi_siswa_xipplg2 (nama_siswa, keterangan, tanggal) 
              VALUES ('$nama', '$ket', '$tgl')";

    if ($conn->query($query)) {
        // Gunakan exit() setelah header agar script berhenti dan langsung pindah
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Data Absensi</title>
    <style>
        form{
            height: 20hv;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <h2>Tambah Data Siswa</h2>

    <form method="POST">
        <label>Nama Siswa:</label><br>
        <input type="text" name="nama_siswa" required><br><br>

        <label>Keterangan:</label><br>
        <select name="keterangan" required>
            <option value="">-- Pilih Status --</option>
            <option value="Hadir">Hadir</option>
            <option value="Izin">Izin</option>
            <option value="Sakit">Sakit</option>
            <option value="Alfa">Alfa</option>
        </select><br><br>

        <label>Tanggal:</label><br>
        <!-- Menambahkan value default tanggal hari ini di HTML -->
        <input type="date" name="tanggal" value="<?= date('Y-m-d'); ?>" required><br><br>

        <button type="submit" name="simpan">Simpan Data</button>
        <a href="index.php">Kembali</a>
    </form>

</body>
</html>