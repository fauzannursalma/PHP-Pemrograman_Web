<?php
require 'functions.php';
if (!isset($_SESSION["username"])){
  header("location: login.php");
  exit;
}

// cek apakah tombol tambah sudah di tekan
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
            alert('Data berhasil ditambahkan!');
            document.location.href = 'admin.php';
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
  <title>Tambah Data</title>
  <link rel="stylesheet" href="css/style.css">
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
</head>

<body>
  <div class="container">
    <h3 class="light center Black-text">Form Tambah Data</h3>
    <br><br><br><br>
    <div class="row">
      <div class="col s12 m12">
        <div class="tabel">
          <table border="1px" cellpadding="8px" cellspacing="0" class="striped">
            <form action="" method="POST">
              <tr>
                <label>
                  <td>Judul</td>
                  <td>:</td>
                  <td><input type="text" name="judul" autofocus required></td>
                </label>
              </tr>
              <tr>
                <label>
                  <td>Pengarang</td>
                  <td>:</td>
                  <td><input type="text" name="pengarang" required></td>
                </label>
              </tr>
              <tr>
                <label>
                  <td>Penerbit</td>
                  <td>:</td>
                  <td><input type="text" name="penerbit" required></td>
                </label>
              </tr>
              <tr>
                <label>
                  <td>Tahun Terbit</td>
                  <td>:</td>
                  <td><input type="text" name="tahun_terbit" required></td>
                </label>
              </tr>
                <tr>
                <label>
                  <td>Cover</td>
                  <td>:</td>
                  <td><input type="text" name="cover" required></td>
                </label>
              </tr>
              <tr>
                <label>
                  <td>harga</td>
                  <td>:</td>
                  <td><input type="text" name="harga" required></td>
                </label>
              </tr>
              <tr>
                <label>
                  <td>Deskripsi</td>
                  <td>:</td>
                  <td>
                    <textarea type="text" name="sinopsis">
                    </textarea></td>
                </label>
              </tr>
              <tr>
                <td colspan="2"><a href="admin.php" class="waves-effect waves-light red darken-4 btn-large"> Kembali</a></td>
                </td>
                <td><button type="submit" name="tambah" class="waves-effect waves-light blue darken-4 btn-large right">Tambah Data!</button></td>
              </tr>
            </form>
          </table>
        </div>
      </div>
</body>

</html>