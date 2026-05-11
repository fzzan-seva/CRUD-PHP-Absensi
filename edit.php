<?php
// 1. Sesuaikan path koneksi
require_once 'config/koneksi.php';

// 2. Ambil ID dari URL
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$id = mysqli_real_escape_string($conn, $_GET['id']);

// 3. Ambil data lama untuk ditampilkan di form
$sql = "SELECT * FROM absensi_siswa_xipplg2 WHERE id = '$id'";
$query = $conn->query($sql);
$data = $query->fetch_assoc();

// Jika data tidak ditemukan
if (!$data) {
    die("Data tidak ditemukan.");
}

// 4. Proses Update saat tombol diklik
if (isset($_POST['update'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama_siswa']);
    $ket  = mysqli_real_escape_string($conn, $_POST['keterangan']);
    $tgl  = mysqli_real_escape_string($conn, $_POST['tanggal']);

    // Sesuaikan query ini. Jika tabel Anda TIDAK ada kolom 'nis', hapus bagian nis='$nis'
    $sql = "UPDATE absensi_siswa_xipplg2 SET 
            nama_siswa = '$nama', 
            keterangan = '$ket',
            tanggal = '$tgl' 
            WHERE id = '$id'";
    
    if ($conn->query($sql)) {
        header('Location: index.php');
        exit();
    } else {
        echo "Gagal mengupdate data: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Absensi</title>
</head>
<body>
    <h2>Edit Data Siswa</h2>
    <form method="POST">
        <label>Nama Siswa:</label><br>
        <input type="text" name="nama_siswa" value="<?= htmlspecialchars($data['nama_siswa']); ?>" required><br><br>

        <label>Keterangan:</label><br>
        <select name="keterangan" required>
            <option value="Hadir" <?= ($data['keterangan'] == 'Hadir') ? 'selected' : ''; ?>>Hadir</option>
            <option value="Sakit" <?= ($data['keterangan'] == 'Sakit') ? 'selected' : ''; ?>>Sakit</option>
            <option value="Izin" <?= ($data['keterangan'] == 'Izin') ? 'selected' : ''; ?>>Izin</option>
            <option value="Alfa" <?= ($data['keterangan'] == 'Alfa') ? 'selected' : ''; ?>>Alfa</option>
        </select><br><br>

        <label>Tanggal:</label><br>
        <input type="date" name="tanggal" value="<?= $data['tanggal']; ?>" required><br><br>

        <button type="submit" name="update">Simpan Perubahan</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>