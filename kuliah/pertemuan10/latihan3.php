<?php
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
?>
<!DOCTYPE html>
<html>

<head>
  <title>Daftar Mahasiswa</title>
  <link rel="stylesheet" href="css/style.css">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
</head>

<body>
  <div class="container">
    <h3 class="light center black-text large"> Daftar Mahasiswa</h3>
    <div class="row">
      <div class="col s3 offset-s9"><a href="tambah.php" class="waves-effect waves-light blue darken-4 btn-small">Tambah Data Mahasiswa</a></div>
    </div>
    <div class="row">
      <?php foreach ($mahasiswa as $mhs) : ?>
        <div class="col md4 s4 ">
          <div class="card medium">
            <div class="card-image">
              <img src="img/<?= $mhs['foto']; ?>" width="85" height="120" class="responsive-img materialboxed">
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4 nama"><?= $mhs['nama']; ?></span>
            </div>
            <div class="card-action">
              <a class="waves-effect waves-light blue darken-4 btn-small" href="detail.php?id=<?= $mhs['id']; ?>">Lihat Detail </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <footer class="black white-text center navfoot">
    <p>Fauzann N. Copyright &copy; 2019. </p>
  </footer>

</body>

</html>