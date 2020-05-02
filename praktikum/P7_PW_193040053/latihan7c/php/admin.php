<?php 
// menghubungkan dengan file php lainnya
require 'functions.php';
session_start();

if (!isset($_SESSION["username"])){
	header("location: login.php");
	exit;
}

$buku = query("SELECT * FROM buku");

// ketika icon pencarian diklik
if (isset($_GET['cari'])){
	$buku = cari($_GET['keyword']);
	
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<link rel="icon" type="image/png" href="../assets/index/1.png">
	<link rel="stylesheet" href=" ../css/style.css">
	<link type="text/css" rel="stylesheet" href=" ../css/materialize.min.css"  media="screen,projection"/>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- Import google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
	<style type="text/css">
		.buku img {
    		width: 130px;
    		position: relative;
    	}
	</style>
</head>
<body>

	<div class="container section">
		<div class="row">
			<div class="col s3">
			<a href="#" class="sidenav-trigger" data-target="menu-side">
			<i class="material-icons small">menu</i>
			</a>
			</div>
			<div class="col s6">
				<h5 class="light center black-text large" style="font-family: 'Orbitron', sans-serif;">Prometheus</h5>
			</div>
			<div class="col s3">
				<a href="logout.php" class="btn-small red right"> Logout</a>
			</div>
		</div>
		<ul class="sidenav" id="menu-side">
			<li>
				<div class="user-view">
      			<div class="background">
        		<img src="../assets/admin/user-back.jpg" style="width: 300px;">
      			</div>
      			<a href="#user"><img class="circle" src="../assets/admin/user.jpg"></a>
      			<a href="#name"><span class="white-text name">Fauzan Nursalma Mawardi</span></a>
      			<a href="#nrp"><span class="white-text nrp">193040053</span></a>
    		</div>
			</li>
			<li><a href="#!" class="subheader"><i class="material-icons">person_outline</i>Halaman Admin</a></li>
    		<li><a href="#buku"><i class="material-icons">collections_bookmark</i>Daftar Buku</a></li>
    		<li><a href="tambah.php"><i class="material-icons">add</i>Tambah Buku</a></li>
    		<li><a class="waves-effect" href="logout.php">Logout<i class="material-icons right">exit_to_app</i></a></li>
    	</ul>
  	</div>

	
     
	
    
	<div class="container">
  	<h5 class="light black-text large center" id="buku">Daftar Buku</h5><br>
  	<div class="row">
      <div class="col s7"><a href="tambah.php" class="waves-effect waves-light blue darken-1 btn-small left">Tambah Data</a></div>
      <form action="" method="get">
      <div class="col s4">
          <input type="text" name="keyword" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off">
      </div>
      <div class="col s1 right">
          <button type="submit" name="cari" class="waves-effect waves-light blue darken-1 btn-small "><i class="material-icons">search</i>
          </button> 
      </div>
      </form>
    </div>
    <div class="row buku">
	<table border="1" cellpadding="13" cellspacing="0" class="responsive-table striped">
		<tr>
			<th>#</th>
			<th colspan="2">Opsi</th>
			<th>Cover</th>
			<th>Judul Buku</th>
			<th>Pengarang</th>
			<th>Penerbit</th>
			<th>Tahun_terbit</th>
			<th>Harga</th>
			<th>Deskripsi</th>
		</tr>
		<?php if (empty($buku)) : ?>
			<tr>
				<td colspan="9" style="text-align: center;">
					<h1>Data Tidak Ditemukan</h1>
				</td>
			</tr>
    	<?php else : ?>
		<?php $i =1; ?>
		<?php foreach ($buku as $b) :?>
			<tr>
				<td><?= $i; ?></td>
				<td>
					<a href="ubah.php?id=<?= $b['id']?>" class="waves-effect waves-light blue darken-1 btn-small">Ubah</a></td>
				<td>
					<a href="hapus.php?id=<?= $b['id']?>" onclick="return confirm('Hapus Data ??')" class="waves-effect waves-light red darken-1 btn-small">Hapus</a>
				</td>
				<td><img src="../assets/img/<?= $b['cover']; ?>" alt=""></td>
				<td><?= $b['judul']; ?></td>
				<td><?= $b['pengarang']; ?></td>
				<td><?= $b['penerbit']; ?></td>
				<td><?= $b['tahun_terbit']; ?></td>
				<td><?= $b['harga']; ?></td>
				<td><a href="deskripsi.php?id=<?= $b['id']?>">lihat deskripsi</td>
			</tr>
		<?php $i++; ?>
		<?php endforeach;?>
		<?php endif; ?>
	</table>	
	</div>
	</div>

	<script type="text/javascript" src="../js/materialize.min.js"></script>

	<script>
        document.addEventListener('DOMContentLoaded', function() {
    		var elems = document.querySelectorAll('.sidenav');
    		var instances = M.Sidenav.init(elems);
  		});
    </script>
     
</body>
</html>