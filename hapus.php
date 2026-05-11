<?php
// 1. Pastikan jalur ke file koneksi benar (sesuaikan dengan index.php)
require_once 'config/koneksi.php';

if (isset($_GET['id'])) {
    // Menggunakan mysqli_real_escape_string untuk keamanan tambahan
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // 2. Pastikan nama tabel SAMA dengan yang ada di index.php
    $sql = "DELETE FROM absensi_siswa_xipplg2 WHERE id = '$id'";

    if ($conn->query($sql)) {
        // Jika berhasil, kembali ke index.php
        header('Location: index.php');
        exit(); // Selalu gunakan exit setelah header location
    } else {
        echo "Gagal menghapus data: " . $conn->error;
    }
} else {
    die("ID tidak ditemukan.");
}
?>