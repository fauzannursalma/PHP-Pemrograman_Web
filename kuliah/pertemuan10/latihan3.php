<?php
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
?>
<!DOCTYPE html>
<html>

<head>
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <h3>Daftar Mahasiswa</h3>

  <a href="tambah.php">Tambah Data Mahasiswa</a>
  <br><br>

  <table border="1px" cellpadding="8px" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Foto</th>
      <th>Nama</th>
      <th>Aksi</th>
    </tr>
    <?php $i = 1;
    foreach ($mahasiswa as $mhs) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><img src="img/<?= $mhs['foto']; ?>" width="85" height="120"></td>
        <td><?= $mhs['nama']; ?></td>
        <td>
          <a href="detail.php?id=<?= $mhs['id']; ?>">Lihat Detail </a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>