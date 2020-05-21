<?php
session_start();
// menghubungkan dengan file php lainnya
require 'php/functions.php';
$buku = query("SELECT * FROM buku");

// ketika icon pencarian diklik
if (isset($_GET['cari'])) {
  $buku = cari($_GET['keyword']);
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Import google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Prometheus</title>
  <link rel="icon" type="image/png" href="assets/index/1.png">
  <style>
    .services img {
      width: 60px;
      position: relative;
    }

    section,
    footer {
      padding: 2px;
    }

    .navfoot a,
    .slider h2 {
      font-family: 'Orbitron', sans-serif;
    }

    .navbar {
      position: relative;
      z-index: 1;
    }

    @media (min-width: 992px) {
      .nav-link {
        color: black !important;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.8);
      }
    }

    .nav-link {
      text-transform: uppercase;
      margin-right: 0px;
    }
  </style>
</head>

<body id="home" class="scrollspy">

  <!-- navbar -->
  <div class="navbar-fixed">
    <nav class="white">
      <div class="container">
        <div class="nav-wrapper navfoot">
          <a href="#home" class="brand-logo black-text">Prometheus</a>
          <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons black">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="#home" class="nav-link waves-effect waves-light">Home</a></li>
            <li><a href="#about" class="nav-link waves-effect waves-light">About Us</a></li>
            <li><a href="#buku" class="nav-link waves-effect waves-light">Daftar Buku</a></li>
            <li>
              <?php if (isset($_SESSION['username'])) : ?>
                <a href="php/admin.php" class="nav-link waves-effect waves-light"><i class="material-icons small">person_outline</i></a>
                <a href="php/logout.php" class="nav-link waves-effect waves-light"><i class="material-icons small">exit_to_app</i></a>
              <?php else : ?>
                <div class="nav-link blue darken-4 waves-effect waves-light"><a href="php/login.php">Login</div>
              <?php endif; ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <!-- sidenav -->
  <ul class="sidenav" id="mobile-nav">
    <li><a href="#home" class="nav-link waves-effect waves-light"><i class="material-icons">home</i>Home</a></li>
    <li><a href="#about" class="nav-link waves-effect waves-light"><i class="material-icons">people</i>About Us</a></li>
    <li><a href="#buku" class="nav-link waves-effect waves-light"><i class="material-icons">collections_bookmark</i>Daftar Buku</a></li>
    <li>
      <?php if (isset($_SESSION['username'])) : ?>
        <a href="php/admin.php" class="nav-link waves-effect waves-light"><i class="material-icons small">person_outline</i> Halaman Admin</a>
        <a href="php/logout.php" class="nav-link waves-effect waves-light"><i class="material-icons small right">exit_to_app</i>Logout</a>
      <?php else : ?>
        <a href="php/login.php"><i class="material-icons">person_outline</i>Login</a>
        <a href="php/registrasi.php" class="nav-link waves-effect waves-light"><i class="material-icons small">person_add</i> Registrasi</a>
      <?php endif; ?>
    </li>
  </ul>
  <?php if (isset($_SESSION['username'])) : ?>

    <!-- floating btn -->
    <div class="fixed-action-btn">
      <a h class="btn-floating btn-large red">
        <i class="large material-icons">menu</i>
      </a>
      <ul>
        <li><a href="#home" class="btn-floating red"><i class="material-icons">home</i></a></li>
        <li><a href="#buku" class="btn-floating yellow darken-1"><i class="material-icons">collections_bookmark</i></a></li>
        <li><a href="php/admin.php" class="btn-floating green"><i class="material-icons">person_outline</i></a></li>
        <li><a class="btn-floating blue sidenav-trigger" data-target="mobile-nav"><i class="material-icons">view_list</i></a></li>
      </ul>
    </div>
  <?php else : ?>
  <?php endif; ?>

  <!-- slider -->
  <div class="slider">
    <ul class="slides">
      <li>
        <img src="assets/slider/2.jpg">
        <div class="caption left-align">
          <h2 style="font-style: italic;">Welcome</h2>
        </div>
      </li>
      <li>
        <img src="assets/slider/3.jpg">
        <div class="caption right-align">
          <h3 style="font-style: italic;">Ayo Bergabung dengan Kami[Prometheus]</h3>
        </div>
      </li>
      <li>
        <img src="assets/slider/1.jpg">
        <div class="caption left-align">
          <h3 style="font-style: italic;">Choose your favorite book</h3>
        </div>
      </li>
      <li>
        <img src="assets/slider/5.jpg">
        <div class="caption center-align">
          <h3 style="font-style: italic;">Upload deskripsi buku-buku rekomendasi mu</h3>
        </div>
      </li>
      <li>
        <img src="assets/slider/4.jpg">
      </li>
    </ul>
  </div>

  <!-- About Us -->
  <section class="about scrollspy grey darken-3" id="about">
    <div class="container service">
      <div class="row">
        <div class="col m6 light white-text">
          <h5><i class="material-icons">collections_bookmark</i> Prometheus</h5>
          <p>Prometheus merupakan Website yang berisi buku-buku rekomendasi yang menarik, tempat dimana anda dapat menemukan buku-buku terbaik yang kami rekomendasikan untuk anda. Prometheus diambil dari nama titan / dewa yang paling cerdas dan cerdik diantara para dewa dalam mitologi Yunani.<br>
            Selain memberikan informasi buku-buku menarik kepada Anda, Anda juga bisa ikut serta dalam pengembangan website ini dengan memberikan rekomendasi buku-buku anda kepada pengunjung website ini cara ikut bergabung dengan kami[Prometheus] melalui halaman registrasi. Ayo tunggu apa lagi, Ayo bergabung! kita bangun website ini agar lebih keren dan menarik :D</p>
          <?php if (isset($_SESSION['username'])) : ?>
          <?php else : ?>
            <a href="php/registrasi.php" class="btn-small blue darken-3">Ayo Bergabung!</a>
          <?php endif; ?>
          <br>
        </div>
        <div class="col m6 white-text service">
          <div class="right">
            <img src="assets/index/prometheus.jpg" style="height: 350px; margin-top:20px;">
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Buku -->
  <section class="portfolio scrollspy white" id="buku">
    <h3 class="light center">Daftar Buku</h3> <br><br>
    <div class="row">
      <form action="" method="get">
        <div class="col s12 m1 right">
          <button type="submit" name="cari" class="waves-effect waves-light blue darken-1 btn" id="tombol-cari">
            <i class="material-icons">search</i>
          </button>
        </div>
        <div class="col s12 m5 right">
          <input type="text" name="keyword" placeholder="Masukkan pencarian seperti judul buku / pengarang . . " autocomplete="off" id="keyword"></div>
        <div class="col s12 m6"></div>
      </form>
    </div>

    <div id="listbuku">
      <div id="horizontal-card" class="section">
        <div class="row">
          <div class="col s12">
            <?php if (empty($buku)) : ?>
              <div style="text-align: center; font-family: lucida fax;">
                <h1>Buku Tidak Ditemukan</h1>
              </div>
            <?php else : ?>
            <?php endif; ?>
          </div>
          <?php foreach ($buku as $b) : ?>
            <div class="col s12 m4">
              <div class="card horizontal">
                <div class="card-image">
                  <img src="assets/img/<?= $b['cover']; ?>" style="height: 220px; width: 160px;">
                </div>
                <div class="card-stacked">
                  <div class="card-content">
                    <b class="buku" style="font-size: 17px; padding-left: 5px;"><?= $b['judul']; ?></b><br><br>
                    <p class="chip"><?= $b['pengarang']; ?></p>
                  </div>
                  <div class="card-action">
                    <a class="waves-effect waves-light blue darken-4 btn-small" href="php/detail.php?id=<?= $b['id']; ?>">Lihat Detail</a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
  <!-- contact us -->
  <section id="contact" class="contact scrollspy grey darken-3">
    <div class="container">
      <h3 class="light white-text center"> Contact Us</h3><br>
      <div class="row">
        <div class="col m5 s12">
          <div class="card-panel blue darken-3 white-text">
            <h4 class="center">Contact</h4><br>
            <p><i class="tiny material-icons contact">email</i> 193040053@mail.unpas.ac.id</p>
            <p><i class="tiny material-icons contact">call</i> 08981284297</p>
          </div>
        </div>
        <div class="col m7 s12">
          <div class="card-panel">
            <ul class="collection with-header">
              <li class="collection-header center">
                <h4>Our Office</h4>
              </li>
              <li class="collection-item">LOZ.inc</li>
              <li class="collection-item">Jl. Merdeka no. 205</li>
              <li class="collection-item">West Java, Indonesia</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- footer -->
  <footer class="black white-text center navfoot">
    <p>Fauzann LOZ inc. Copyright &copy; 2020. </p>
  </footer>
  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script>
    const sideNav = document.querySelectorAll('.sidenav');
    M.Sidenav.init(sideNav);

    const slider = document.querySelectorAll('.slider');
    M.Slider.init(slider, {
      indicators: false,
      height: 500,
      transition: 500,
      interval: 3000
    });
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.fixed-action-btn');
      var instances = M.FloatingActionButton.init(elems, {
        direction: 'left',
        hoverEnabled: false
      });
    });
  </script>
  <!-- Jquery -->
  <script src="js/jquery-3.5.1.min.js"></script>
  <!-- AJAX -->
  <script src="js/scriptindex.js"></script>
</body>

</html>