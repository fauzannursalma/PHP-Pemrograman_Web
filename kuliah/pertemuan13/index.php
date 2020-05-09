<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

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
  <!--Import Materialize css -->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <!--Import Google Icon Font -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
  <style>
    body{
      background-color: lightblue;
    }
    .container{
      background-color: white;
    }
    footer {
      margin-top: -20px;
      padding:10px 0;
    }
  </style>
</head>

<body>
  <div class="container section">
    <div class="row">
      <div class="col s12">
        <table border="0">
          <tr>
            <th><a href="#" class="sidenav-trigger" data-target="menu-side">
                <i class="material-icons small">menu</i></a>
            </th>
            <th>
              <h4 class=" center black-text large" style="font-family: 'Orbitron', sans-serif;">TEKNIK'19</h4>
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
            <img src="img/user/user-back.jpg" style="width: 300px;">
            </div>
            <a href="#user"><img class="circle" src="img/user/user.jpg"></a>
            <a href="#name"><span class="white-text name">Fauzan Nursalma Mawardi</span></a>
            <a href="#nrp"><span class="white-text nrp">193040053</span></a>
        </div>
      </li>
      <li><a href="#!" class="subheader"><i class="material-icons">person_outline</i>Halaman Admin</a></li>
        <li><a href="#buku"><i class="material-icons">people</i>Daftar Mahasiswa</a></li>
        <li><a href="tambah.php"><i class="material-icons">add</i>Tambah Data Mahasiswa</a></li>
        <li><a class="waves-effect" href="logout.php">Logout<i class="material-icons right">exit_to_app</i></a></li>
      </ul>
    </div>

  
  <div class="container" id="mahasiswa">
    <br>
  <div class="row">
    <h4 class="light black-text large" style="padding-left: 10px;" > Daftar Mahasiswa</h4>
    <br>
    
      <form action="" method="POST">
      <div class="col m4 s12">
         <a href="tambah.php" class="waves-effect waves-light blue darken-4 btn-small left">Tambah Data Mahasiswa</a>
      </div>
      <div class="col m2 s12">
          <button type="submit" name="cari" class="tombol-cari waves-effect waves-light blue darken-1 btn-small left">Cari</button>
      </div>
      <div class="col m6 s12 ">
        <input type="text" name="keyword" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off" class="keyword">
      </div>
      </form>
    </div>
    <div class="listmahasiswa">
    <div class="row">
      <?php if(empty($mahasiswa)) : ?>
        <div class="col s12 m12 center" id="mahasiswa">
          <h4>Data Mahasiswa Tidak Di Temukan</h4>
          <br>
        </div>
      <?php endif; ?>
      <?php foreach ($mahasiswa as $mhs) : ?>
        <div class="col s12 m4">
          <div class="card medium">
            <div class="card-image">
              <img src="img/<?= $mhs['foto']; ?>"class="responsive-img">
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
  </div>

  <!-- footer -->
<footer class="blue lighten-1 white-text center navfoot">
  <h6>Fauzann LOZ inc. Copyright &copy; 2020. </h6>
</footer>

<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="js/materialize.min.js"></script>
<script src="js/script.js"></script>

<script>
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
      });
</script>




</body>
</html>