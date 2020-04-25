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
  <title>Detail Mahasiswa</title>
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
</head>

<body>
  <div class="container">
    <h3 class="light center Black-text">Detail Mahasiswa</h3>
    <div class="row">
      <div class="col s12 m12">
        <div class="tabel">
          <table border="1px" cellpadding="8px" cellspacing="0" class="striped">
            <tr>
              <td class="center" colspan="3"><img src="img/<?= $mhs['foto']; ?>" width="280" height="340"></td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td><?= $mhs['nama']; ?></td>
            </tr>
            <tr>
              <td>NRP</td>
              <td>:</td>
              <td><?= $mhs['nrp']; ?></td>
            </tr>
            <tr>
              <td>Jurusan</td>
              <td>:</td>
              <td><?= $mhs['jurusan']; ?></td>
            </tr>
            <tr>
              <td>Email</td>
              <td>:</td>
              <td><?= $mhs['email']; ?></td>
            </tr>
            <tr>
              <td colspan="3"><a href="ubah.php?id=<?= $mhs['id'];?>" class="waves-effect waves-light blue darken-4 btn-small">Ubah</a>
                <a href="hapus.php?id=<?= $mhs['id'];?>" onclick="return confirm('Apakah anda yakin?')" class="waves-effect waves-light red darken-4 btn-small">Hapus</a></td>
            </tr>
            <tr>
              <td colspan="3"><a href="index.php" class="waves-effect waves-light blue darken-4 btn-small"> Kembali Ke Daftar Mahasiswa</a></td>
            </tr>
          </table>
        </div>
      </div>
    </div>

</body>

</html>