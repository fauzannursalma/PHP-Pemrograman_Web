<?php
require 'functions.php';

// ambil dari URL
$id = $_GET['id'];
// query mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <table border="1px" cellpadding="8px" cellspacing="0">
    <tr>
      <td><img src="img/<?= $mhs['foto']; ?>" width="85" height="120"></td>
      <td>Nama :<?= $mhs['nama']; ?></td>
      <td>NRP :<?= $mhs['nrp']; ?></td>
      <td>Jurusan :<?= $mhs['jurusan']; ?></td>
      <td>Email :<?= $mhs['email']; ?></td>
      <td><a href="">Ubah</a> | <a href="">Hapus</a></td>
      <td>
        <a href="latihan3.php">Kembali ke daftar mahasiswa</a>
      </td>

  </table>

</body>

</html>