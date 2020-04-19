<?php
require 'functions.php';

// cek apakah tombol tambah sudah di tekan
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'latihan3.php';
          </script>";
  } else {
    echo "data gagal ditambahkan !";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Tambah Data</title>
  <link rel="stylesheet" href="css/style.css">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
</head>

<body>
  <div class="container">
    <h3 class="light center Black-text">Form Tambah Data Mahasiswa</h3>
    <br><br><br><br>
    <div class="row">
      <div class="col s12 m12">
        <div class="tabel">
          <table border="1px" cellpadding="8px" cellspacing="0" class="striped">
            <form action="" method="POST">
              <tr>
                <label>
                  <td>Nama</td>
                  <td>:</td>
                  <td><input type="text" name="nama" autofocus required></td>
                </label>
              </tr>
              <tr>
                <label>
                  <td>NRP</td>
                  <td>:</td>
                  <td><input type="text" name="nrp" required></td>
                </label>
              </tr>
              <tr>
                <label>
                  <td>Jurusan</td>
                  <td>:</td>
                  <td><input type="text" name="jurusan" required></td>
                </label>
              </tr>
              <tr>
                <label>
                  <td>Email</td>
                  <td>:</td>
                  <td><input type="text" name="email" required></td>
                </label>
              </tr>
              <tr>
                <label>
                  <td>Foto</td>
                  <td>:</td>
                  <td><input type="text" name="foto" required></td>
                </label>
              </tr>
              <tr>
                <td colspan="3"><button type="submit" name="tambah" class="waves-effect waves-light blue darken-4 btn-large">Tambah Data!</button></td>
              </tr>
            </form>
          </table>
        </div>
      </div>
</body>

</html>