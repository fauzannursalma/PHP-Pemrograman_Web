<?php
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// ketika icon pencarian diklik
if (isset($_POST['cari'])){
  $mahasiswa = cari($_POST['keyword']);
  
} 
?>
<!DOCTYPE html>
<html>

<head>
  <title>Daftar Mahasiswa</title>
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
</head>

<body>
  <div class="container">
    <h3 class="light center black-text large" > Daftar Mahasiswa</h3>
    <br><br><br><br>
    <div class="row">
      <div class="col s7">
        <a href="tambah.php" class="waves-effect waves-light blue darken-4 btn-small">Tambah Data Mahasiswa</a>
      </div>
       <form action="" method="POST">
      <div class="col s4">
          <input type="text" name="keyword" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off">
      </div>
      <div class="col s1">
        <button type="submit" name="cari" class="waves-effect waves-light blue darken-1 btn-small right">Cari</button>
      </div>
      </form>
    </div>
    <div class="row">
      <?php if(empty($mahasiswa)) : ?>
        <div class="col 12 md4">
          <h3>Data Mahasiswa Tidak Di Temukan</h3>
        </div>
      <?php endif; ?>
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
</body>

</html>