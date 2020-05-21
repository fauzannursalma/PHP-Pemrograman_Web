<?php
require 'functions.php';
session_start();
if (!isset($_SESSION["username"])){
  header("location: login.php");
  exit;
}
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
  <link rel="icon" type="image/png" href="../assets/index/1.png">
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
   <style>
    body{
      background-image: url(../assets/img-background/background_ubah.jpg);
      background-size: cover;
    }
    .card{
      background:rgba(0,0,0,.5);
      margin-top: 50px; 
    }
    label {
      font-size: 16px;
      color: white;
    } 
    input, textarea{
      font-size: 24px !important;
      color: white;
    }

  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col s12 l9 offset-l1">
        <div class="card">
          <div class="card-action blue lighten-1 white-text center">
            <h4>Form Ubah Data</h4>
          </div>
          <div class="card-content">
          <form action="" method="POST">
            <div class="form-field">
              <label><input type="hidden" name="id" id="id" value="<?= $buku['id'];?>"></label>
              <label>Judul
              <input type="text" name="judul" autofocus required value="<?= $buku['judul'];?>">
              </label>
            </div><br>
            <div class="form-field">
              <label>Pengarang
              <input type="text" name="pengarang" required value="<?= $buku['pengarang'];?>">
              </label>
            </div><br>
            <div class="form-field">
              <label>Penerbit
              <input type="text" name="penerbit" required value="<?= $buku['penerbit'];?>">
              </label>
            </div><br>
            <div class="form-field">
              <label>Tahun Terbit
              <input type="text" name="tahun_terbit" required value="<?= $buku['tahun_terbit'];?>">
              </label>
            </div><br>
            <div class="form-field">
              <label>Cover (.jpg/.jpeg/.png)
              <input type="text" name="cover" required value="<?= $buku['cover'];?>">
              </label>
            </div><br>
            <div class="form-field">
              <label>Harga
              <input type="text" name="harga" required value="<?= $buku['harga'];?>">
              </label>
            </div><br>
            <div class="form-field">
              <label>Deskripsi
              <textarea type="text" name="sinopsis" value="<?= $buku['sinopsis'];?>"><?= $buku['sinopsis'];?></textarea>
              </label>
            </div><br>
            <div class="form-field">
              <div class="row">
                <div class="col s6">
                <a href="admin.php" class="waves-effect waves-light red darken-4 btn-large"> Kembali</a></div>
                <div  class="col s6">
                <button type="submit" name="ubah" class="waves-effect waves-light blue darken-4 btn-large right">Ubah Data!</button></div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</body>

</html>