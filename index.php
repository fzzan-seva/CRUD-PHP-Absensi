<?php
require_once 'config/koneksi.php';

// Query ambil data
$query = "SELECT * FROM absensi_siswa_xipplg2 ORDER BY id DESC";
$result = $conn->query($query);

// Cek error query
if (!$result) {
  die("Query gagal: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Data Absensi</title>
  <style>
    h2 {
  justify-content: center;
  display: flex;
    }

    .btn-tambah {
      background: purple;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    table,
    th,
    td {
      border: 1px solid black;
      padding: 8px;
    }

    th {
      background-color: #0099ff;
    }
  </style>
</head>

<body>

  <h2>Data Absensi Siswa</h2>
  <a href="tambah.php">+ Tambah Data</a>
  <br><br>
  
  <table>
    <tr>
      <th>No</th>
      <th>Nama Siswa</th>
      <th>Status</th>
      <th>Tanggal</th>
      <th>Aksi</th>
    </tr>

    <?php
    $no = 1;

    // Perbaikan: Buka kurung kurawal { di sini
    while ($row = $result->fetch_assoc()) : 
    ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= htmlspecialchars($row['nama_siswa'] ?? ''); ?></td>
        <td><?= htmlspecialchars($row['keterangan'] ?? ''); ?></td>
        <td><?= htmlspecialchars($row['tanggal'] ?? ''); ?></td>
        <td>
          <a href="edit.php?id=<?= $row['id']; ?>">Edit</a>
          <a href="hapus.php?id=<?= $row['id']; ?>"
            onclick="return confirm('Yakin ingin menghapus data ini?')">
            Hapus
          </a>
        </td>
      </tr>
    <?php 
    // Tutup kurung kurawal loop di sini setelah </tr>
    endwhile; 
    ?>

    <?php if ($result->num_rows == 0) : ?>
      <tr>
        <td colspan="5" style="text-align:center;">Data tidak ditemukan.</td>
      </tr>
    <?php endif; ?>

  </table>

</body>

</html>