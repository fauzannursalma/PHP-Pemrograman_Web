<?php
// menghubungkan dengan file php lainnya
require 'functions.php';
session_start();

if (!isset($_SESSION["username"])) {
  header("location: login.php");
  exit;
}
$buku = query("SELECT * FROM buku");
// ketika icon pencarian diklik
if (isset($_GET['cari'])) {
  $buku = cari($_GET['keyword']);
}

$user = query("SELECT * FROM user");
?>
<!DOCTYPE html>
<html>

<head>
  <title>Halaman Admin</title>
  <link rel="icon" type="image/png" href="../assets/index/1.png">
  <!-- CSS Materialize -->
  <link type="text/css" rel="stylesheet" href=" ../css/materialize.min.css" media="screen,projection" />
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Import google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
  <!-- Jquery -->
  <script src="../js/jquery-3.5.1.min.js"></script>
  <!-- ajax -->
  <script src="../js/scriptadmin.js"></script>
  <style type="text/css">
    footer {
      padding: 2px;
    }

    .card-content,
    p {
      font-size: 12px;
    }
  </style>
</head>

<body id="body">
  <!-- Navbar -->
  <div class="row">
    <div class="col s12">
      <table border="0">
        <tr>
          <th><a href="#" class="sidenav-trigger" data-target="menu-side">
              <i class="material-icons small">menu</i></a>
          </th>
          <th>
            <h4 class=" center black-text large" style="font-family: 'Orbitron', sans-serif;">Prometheus</h4>
          </th>
          <th>
            <a href="logout.php" class="btn-small red waves-effect right">Logout</a>
          </th>
        </tr>
      </table>
    </div>
  </div>
  <ul class="sidenav" id="menu-side">
    <li>
      <div class="user-view">
        <div class="background">
          <img src="../assets/admin/user-back.png" style="width: 300px;">
        </div>
        <a href="#user"><img class="circle" src="../assets/admin/user.jpg" style="margin-left: 5"></a>
        <a href="#name"><span class="white-text name">Hello <?= $_SESSION["username"]; ?>!</span></a>
      </div>
    </li>
    <li><a href="#!" class="subheader"><i class="material-icons">person_outline</i>Halaman Admin</a></li>
    <li><a href="../index.php"><i class="material-icons">home</i>Halaman Index</a></li>
    <li><a href="#buku"><i class="material-icons">collections_bookmark</i>Daftar Buku</a></li>
    <li><a href="tambah.php"><i class="material-icons">add</i>Tambah Buku</a></li>
    <li><a class="waves-effect" href="logout.php">Logout<i class="material-icons right">exit_to_app</i></a></li>
  </ul>

  <!-- floating btn -->
  <div class="fixed-action-btn">
    <a class="btn-floating btn-large red">
      <i class="large material-icons">menu</i>
    </a>
    <ul>
      <li><a href="../index.php" class="btn-floating red"><i class="material-icons">home</i></a></li>
      <li><a href="#buku" class="btn-floating yellow darken-1"><i class="material-icons">collections_bookmark</i></a></li>
      <li><a href="tambah.php" class="btn-floating green"><i class="material-icons">add</i></a></li>
      <li><a class="btn-floating blue sidenav-trigger" data-target="menu-side"><i class="material-icons">view_list</i></a></li>
    </ul>
  </div>

  <!-- Parallax -->
  <div class="parallax-container scrollspy">
    <div class="parallax"><img src="../assets/slider/5.jpg"></div>
    <div class="container clients">
      <br><br><br>
      <h2 class="center light white-text"> SELAMAT DATANG DI HALAMAN ADMIN </h2>
      <div class="row center"><br>
        <div class="chip center"><a href="../index.php" style="font-size: 15px;">Halaman Index</a></div>
      </div>
    </div>
  </div>

  <!-- Buku -->
  <section class="buku white" id="buku">
    <div class="row">
      <h3 class="light black-text large" style="padding-left: 10px;"> Daftar Buku</h3>
      <br>
      <div class="col m7 s12">
        <a href="tambah.php" class="waves-effect waves-light blue darken-4 btn left">Tambah Data Buku</a>
      </div>
      <form action="" method="POST">
        <div class="col m4 s12 ">
          <input type="text" name="keyword" placeholder="Masukkan keyword pencarian..." autocomplete="off" class="keyword" id="keyword">
        </div>
        <div class="col m1 s12 ">
          <button type="submit" name="cari" class="tombol-cari waves-effect waves-light blue darken-1 btn-small left" id="tombol-cari">Cari</button>
        </div>
      </form>
    </div>
    <div id="listbuku" id="listbuku">
      <div id="horizontal-card" class="section">
        <div class="row">
          <div class="col s12">
            <?php if (empty($buku)) : ?>
              <div style="text-align: center; font-family: lucida fax;">
                <h1>Buku Tidak Ditemukan</h1>
              </div>
            <?php else : ?>
            <?php endif; ?>
            <?php $i = 1; ?>
          </div>
          <?php foreach ($buku as $b) : ?>
            <div class="col s12 m6">
              <div class="card horizontal">
                <div class="card-image">
                  <img src="../assets/img/<?= $b['cover']; ?>" style="width: 250px;">
                </div>
                <div class=" card-stacked">
                  <div class="card-content">
                    <table border="1px" cellpadding="6px" cellspacing="0">
                      <th colspan="2">
                        <div class="chip black white-text"><?= $i; ?></div><b style="font-size:14px;"><?= $b["judul"]; ?></b>
                      </th>
                      <tr>
                        <td>
                          <p>Pengarang</p>
                        </td>
                        <td>
                          <p> : <?= $b["pengarang"]; ?></p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <p>Penerbit</p>
                        </td>
                        <td>
                          <p> : <?= $b["penerbit"]; ?></p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <p>Tahun Terbit</p>
                        </td>
                        <td>
                          <p> : <?= $b["tahun_terbit"]; ?></p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <p>Harga </p>
                        </td>
                        <td>
                          <p> : <?= $b["harga"]; ?></p>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2">
                          <div class="chip"><a href="deskripsi.php?id=<?= $b['id'] ?>" style="color: black">Lihat Deskripsi</a></div>
                        </td>
                      </tr>
                    </table><br>
                    <a href="ubah.php?id=<?= $b['id'] ?>" class="waves-effect waves-light blue darken-1 btn-small"><i class="material-icons">edit</i></a>
                    <a href="hapus.php?id=<?= $b['id'] ?>" onclick="return confirm('Hapus Data ??')" class="waves-effect waves-light red darken-1 btn-small"><i class="material-icons">delete</i></a>
                  </div>
                </div>
              </div>
            </div>
            <?php $i++; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- footer -->
  <footer class="black white-text center navfoot fixed">
    <p>Fauzann LOZ inc. Copyright &copy; 2020. </p>
  </footer>

  <!-- javascript Materialize -->
  <script type="text/javascript" src="../js/materialize.min.js"></script>
  <script>
    const sideNav = document.querySelectorAll('.sidenav');
    M.Sidenav.init(sideNav);

    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.fixed-action-btn');
      var instances = M.FloatingActionButton.init(elems, {
        direction: 'left',
        hoverEnabled: false
      });
    });
  </script>
</body>

</html>