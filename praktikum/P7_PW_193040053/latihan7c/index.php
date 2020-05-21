<?php
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
      padding: 20px 0;
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

    .nav-link:hover::after {
      content: '';
      display: block;
      border-bottom: 3px solid blue;
      width: 100%;
      margin: auto;
      padding-bottom: 5px;
      margin-top: -20px;
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
            <li><a href="#buku" class="nav-link waves-effect waves-light"> Daftar Buku</a></li>
            <li>
              <div class="nav-link blue darken-4 waves-effect waves-light"><a href="php/login.php">Login</div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <!-- sidenav -->
  <ul class="sidenav" id="mobile-nav">
    <li><a href="!#" class="subheader">Prometheus</a></li>
    <li><a href="#buku"><i class="material-icons">collections_bookmark</i>Daftar Buku</a></li>
    <li><a href="php/login.php"><i class="material-icons">person_outline</i>Login</a></li>
  </ul>

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
          <h3 style="font-style: italic;">Start Your Adventure</h3>
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
      </li>
      <li>
        <img src="assets/slider/4.jpg">
      </li>
    </ul>
  </div>
  <!-- About Us -->
  <section class="about scrollspy grey darken-3">
    <div class="container service">
      <div class="row">
        <div class="col m6 light white-text">
          <h5><i class="material-icons" id="about">collections_bookmark</i> Prometheus</h5>
          <p>Promtheus adalah toko online untuk buku-buku, tempat Anda dapat menemukan dan membeli barang-barang yang Anda sukai. Penjual independen terpercaya serta menawarkan banyak buku baru dan langka yang dijual melalui situs web Promtheus. Prometheus diambil dari nama titan / dewa dalam mitologi Yunani. Dia juga yang paling cerdas dan cerdik diantara para dewa.</p>
        </div>
        <div class="col m6 white-text service">
          <div class="right">
            <img src="assets/index/prometheus.jpg" style="height: 220px;">
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Buku -->
  <section class="portfolio scrollspy white" id="buku">
    <div class="container">
      <h3 class="light center">Daftar Buku</h3> <br><br><br>
      <div class="row">
        <form action="" method="get">
          <div class="col s6"></div>
          <div class="col s1 right">
            <button type="submit" name="cari" class="waves-effect waves-light blue darken-1 btn">
              <i class="material-icons">search</i>
            </button>
          </div>
          <div class="col s4 right">
            <input type="text" name="keyword" placeholder="Masukkan keyword pencarian..." autocomplete="off">
          </div>
        </form>
      </div>
      <div class="row">
        <?php if (empty($buku)) : ?>
          <div style="text-align: center; color: red; font-family: lucida fax;">
            <h1>Buku Tidak Ditemukan</h1>
          </div>
        <?php else : ?>
          <?php foreach ($buku as $b) : ?>
            <div class="row">
              <div class="col s12 m4">
                <div class="card medium">
                  <div class="card-image">
                    <img src="assets/img/<?= $b['cover']; ?>" class="responsive-img">
                  </div>
                  <div class="card-content">
                    <p class="buku center"><?= $b['judul']; ?>
                    </p>
                  </div>
                  <div class="card-action center">
                    <a class="waves-effect waves-light blue darken-4 btn-small center" href="php/detail.php?id=<?= $b['id']; ?>">Lihat Detail</a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
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
            <p><i class="tiny material-icons contact">call</i> 0812345678</p>
          </div>
        </div>
        <div class="col m7 s12">
          <div class="card-panel">
            <ul class="collection with-header">
              <li class="collection-header center">
                <h4>Our Store</h4>
              </li>
              <li class="collection-item">Prometheus Books Store, LOZ.inc</li>
              <li class="collection-item">Jl. Merdeka no. 205</li>
              <li class="collection-item">West Java, Indonesia</li>
            </ul>
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
  </script>
</body>

</html>