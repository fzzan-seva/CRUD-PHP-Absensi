<?php
// Membuat koneksi
$conn=new mysqli("localhost", "root", "", "absensi_siswa_xipplg2");

// Cek koneksi
if ($conn->connect_error) {
die("Koneksi gagal: " . $conn->connect_error);
}

// Set charset
$conn->set_charset("utf8"); 