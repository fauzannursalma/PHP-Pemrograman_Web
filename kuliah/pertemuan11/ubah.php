<?php
require 'functions.php';

// jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("location: index.php");
  exit;
}

// ambil id dari url
$id = $_GET['id'];

// query mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id");

// cek apakah tombol ubah sudah di tekan
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
            alert('data berhasil diubah!');
            document.location.href = 'index.php';
          </script>";
  } else {
    echo "data gagal diubah !";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Mahasiswa</title>
  <link rel="stylesheet" href="css/style.css">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
</head>

<body>
  <div class="container">
    <h3 class="light center Black-text">Form Ubah Data Mahasiswa</h3>
    <br><br><br><br>
    <div class="row">
      <div class="col s12 m12">
        <div class="tabel">
          <table border="1px" cellpadding="8px" cellspacing="0" class="striped">
            <form action="" method="POST">
              <input type="hidden" name="id" value="<?= $mhs['id']; ?>">
              <tr>
                <label>
                  <td>Nama</td>
                  <td>:</td>
                  <td><input type="text" name="nama" value="<?= $mhs['nama']; ?>" autofocus required></td>
                </label>
              </tr>
              <tr>
                <label>
                  <td>NRP</td>
                  <td>:</td>
                  <td><input type="text" name="nrp" value="<?= $mhs['nrp']; ?>" required></td>
                </label>
              </tr>
              <tr>
                <label>
                  <td>Jurusan</td>
                  <td>:</td>
                  <td><input type="text" name="jurusan" value="<?= $mhs['jurusan']; ?>" required></td>
                </label>
              </tr>
              <tr>
                <label>
                  <td>Email</td>
                  <td>:</td>
                  <td><input type="text" name="email" value="<?= $mhs['email']; ?>"required></td>
                </label>
              </tr>
              <tr>
                <label>
                  <td>Foto</td>
                  <td>:</td>
                  <td><input type="text" name="foto" value="<?= $mhs['foto']; ?>" required></td>
                </label>
              </tr>
              <tr>
                <td colspan="2"><a href="index.php" class="waves-effect waves-light red darken-4 btn-large"> Kembali</a></td>
                </td>
                <td><button type="submit" name="ubah" class="waves-effect waves-light blue darken-4 btn-large right">Ubah Data!</button></td>
              </tr>
            </form>
          </table>
        </div>
      </div>
</body>

</html>