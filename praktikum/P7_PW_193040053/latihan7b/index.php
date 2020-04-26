<?php 
// menghubungkan dengan file php lainnya
require 'php/functions.php';
$buku = query("SELECT * FROM buku");

// ketika icon pencarian diklik
if (isset($_GET['cari'])){
  $buku = cari($_GET['keyword']);
  
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>latihan7b</title>
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href=" css/style.css">
</head>
<body>
  <nav>
    <div class="navbar-fixed white col s12 m6">
      <a href="php/login.php" class="waves-effect waves-light blue darken-1 btn-large left" style="margin-top: 4px; margin-left: 2px">Masuk ke Halaman Admin</a>
     <ul id="nav-mobile" class="right hide-on-med-and-down">
        <form action="" method="get">
        <li>
             <input type="text" name="keyword" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off" size="28">
      </li>
        <li>
          <button type="submit" name="cari" class="waves-effect waves-light blue darken-1 btn-small ">
            <i class="material-icons" style="margin-top: -10px; ">search</i>
          </button>
        </li>
        </form>
    </ul>
    </div>
  </nav> 
  <div class="container">
    <h3 class="light center black-text large">Daftar Buku</h3>
    <br><br><br><br>
    </div>
    <div class="row">
      <?php if (empty($buku)) : ?>
        <div  style="text-align: center; color: red; font-family: lucida fax;">
          <h1>Data Tidak Ditemukan</h1>
        </div>
      <?php else : ?>
      <?php foreach ($buku as $b) : ?>
        <div class="col md4 s3 l3 ">
          <div class="card medium">
            <div class="card-image">
              <img src="assets/img/<?= $b['cover']; ?>" width="85" height="120" class="responsive-img materialboxed">
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4 nama"><?= $b['judul']; ?></span>
            </div>
            <div class="card-action">
              <a class="waves-effect waves-light blue darken-4 btn-small" href="php/detail.php?id=<?= $b['id']; ?>">Lihat Detail </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
    </div>
  </div>
    <!--  sumber gambar : http://www.bukabuku.com/ -->
</body>
</html>