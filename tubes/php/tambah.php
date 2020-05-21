<?php
require 'functions.php';
session_start();
if (!isset($_SESSION["username"])) {
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
  <link rel="icon" type="image/png" href="../assets/index/1.png">
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
  <style>
    body {
      background-image: url(../assets/img-background/background_tambah.jpg);
      background-size: cover;
    }

    .card {
      background: rgba(0, 0, 0, .8);
      margin-top: 50px;
    }

    label {
      font-size: 16px;
      color: white;
    }

    input {
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
            <h4>Form Tambah Data</h4>
          </div>
          <div class="card-content">
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="form-field">
                <label>Judul
                  <input type="text" name="judul" autofocus required>
                </label>
              </div><br>
              <div class="form-field">
                <label>Pengarang
                  <input type="text" name="pengarang" required>
                </label>
              </div><br>
              <div class="form-field">
                <label>Penerbit
                  <input type="text" name="penerbit" required>
                </label>
              </div><br>
              <div class="form-field">
                <label>Tahun Terbit
                  <input type="text" name="tahun_terbit" required>
                </label>
              </div><br>
              <div class="form-field">
                <label>Cover (.jpg/.jpeg/.png)<br>
                  <input type="file" name="cover" class="cover" onchange="previewImage()">
                </label><br>
                <img src="../assets/img/nobooks.png" width="120" class="img-preview">
              </div> <br>
              <div class="form-field">
                <label>Harga
                  <input type="text" name="harga" required>
                </label>
              </div><br>
              <div class="form-field">
                <label>Deskripsi
                  <textarea type="text" name="sinopsis" style="color: white;"></textarea>
                </label>
              </div><br>
              <div class="form-field">
                <div class="row">
                  <div class="col s6">
                    <a href="admin.php" class="waves-effect waves-light red darken-4 btn-large"> Kembali</a></div>
                  <div class="col s6">
                    <button type="submit" name="tambah" class="waves-effect waves-light blue darken-4 btn-large right">Tambah Data!</button></div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <script src="../js/upload.js"></script>
</body>

</html>