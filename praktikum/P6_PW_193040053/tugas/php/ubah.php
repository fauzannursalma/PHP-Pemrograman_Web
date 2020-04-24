<?php
require 'functions.php';

$id = $_GET['id'];
$buku = query("SELECT * FROM buku WHERE id = $id")[0];

// cek apakah tombol tambah sudah di tekan
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
            alert('Data berhasil diubah!');
            document.location.href = 'admin.php';
          </script>";
  } else {
    echo "Data gagal diubah !";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data</title>
  <link rel="stylesheet" href="css/style.css">
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
</head>

<body>
  <div class="container">
    <h3 class="light center Black-text">Form Ubah Data</h3>
    <br><br><br><br>
    <div class="row">
      <div class="col s12 m12">
        <div class="tabel">
          <table border="1px" cellpadding="8px" cellspacing="0" class="striped">
            <form action="" method="POST">
              <tr>
                <label>
                  <input type="hidden" name="id" id="id" value="<?= $buku['id'];?>">
                  <td>Judul</td>
                  <td>:</td>
                  <td><input type="text" name="judul" autofocus required value="<?= $buku['judul'];?>"></td>
                </label>
              </tr>
              <tr>
                <label>
                  <td>Pengarang</td>
                  <td>:</td>
                  <td><input type="text" name="pengarang" required value="<?= $buku['pengarang'];?>"></td>
                </label>
              </tr>
              <tr>
                <label>
                  <td>Penerbit</td>
                  <td>:</td>
                  <td><input type="text" name="penerbit" required value="<?= $buku['penerbit'];?>"></td>
                </label>
              </tr>
              <tr>
                <label>
                  <td>Tahun Terbit</td>
                  <td>:</td>
                  <td><input type="text" name="tahun_terbit" required value="<?= $buku['tahun_terbit'];?>"></td>
                </label>
              </tr>
                <tr>
                <label>
                  <td>Cover</td>
                  <td>:</td>
                  <td><input type="text" name="cover" required value="<?= $buku['cover'];?>"></td>
                </label>
              </tr>
              <tr>
                <label>
                  <td>harga</td>
                  <td>:</td>
                  <td><input type="text" name="harga" required value="<?= $buku['harga'];?>"></td>
                </label>
              </tr>
              <tr>
                <label>
                  <td>Deskripsi</td>
                  <td>:</td>
                  <td><textarea type="text" name="sinopsis" value="<?= $buku['sinopsis'];?>">
                    <?= $buku['sinopsis'];?></textarea></td>
                </label>
              </tr>
              <tr>
                <td colspan="2"><a href="admin.php" class="waves-effect waves-light red darken-4 btn-large"> Kembali</a></td>
                </td>
                <td><button type="submit" name="ubah" class="waves-effect waves-light blue darken-4 btn-large right">Ubah Data!</button></td>
              </tr>
            </form>
          </table>
        </div>
      </div>
</body>

</html>