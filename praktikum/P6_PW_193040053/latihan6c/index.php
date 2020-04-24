<?php 
	//menghubungkan dengan file php lainnya
	require 'php/functions.php';
	//melakukan query
	$buku = query("SELECT * FROM buku")

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan6c</title>
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href=" css/style.css">
</head>
<body>
  <div class="container">
    <h3 class="light center black-text large"> Daftar Buku</h3>
    <br><br><br><br>
    </div>
    <div class="row">
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
    </div>
  </div>
  <footer class="black white-text center navfoot">
    <p>Fauzann N. Copyright &copy; 2019. </p>
  </footer>
    <!--  sumber gambar : http://www.bukabuku.com/ -->
</body>
</html>