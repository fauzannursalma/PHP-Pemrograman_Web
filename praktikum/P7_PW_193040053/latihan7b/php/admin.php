<?php 
// menghubungkan dengan file php lainnya
require 'functions.php';
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
	<link rel="stylesheet" href=" ../css/style.css">
	<link type="text/css" rel="stylesheet" href=" ../css/materialize.min.css"  media="screen,projection"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<nav>
    <div class="nav-wrapper blue darken-1">
      <a href="#" class="brand-logo center" style="font-style: italic;">Halaman Admin</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li>
        	<div class="logout"><a href="logout.php">Logout</a></div>
        </li>
      </ul>
    </div>
  </nav>
	<br>
	<h3 class="light center black-text large">Daftar Buku</h3>
    <br>
  <nav>
    <div class="navbar-fixed white col s12 m6">
      <a href="tambah.php" class="waves-effect waves-light blue darken-1 btn-large left" style="margin-top: 4px; margin-left: 2px">Tambah Data</a>
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
    <div class="row">
	<table border="1" cellpadding="13" cellspacing="0" class="responsive-table striped">
		<tr>
			<th>#</th>
			<th>Opsi</th>
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
					<a href="ubah.php?id=<?= $b['id']?>" class="waves-effect waves-light blue darken-1 btn-large">Ubah</a>
					<a href="hapus.php?id=<?= $b['id']?>" onclick="return confirm('Hapus Data ??')" class="waves-effect waves-light red darken-1 btn-large">Hapus</a>
				</td>
				<td><img src="../assets/img/<?= $b['cover']; ?>" alt=""></td>
				<td><?= $b['judul']; ?></td>
				<td><?= $b['pengarang']; ?></td>
				<td><?= $b['penerbit']; ?></td>
				<td><?= $b['tahun_terbit']; ?></td>
				<td><?= $b['harga']; ?></td>
				<td><a href="detail.php?id=<?= $b['id']?>">lihat deskripsi</td>
			</tr>
		<?php $i++; ?>
		<?php endforeach;?>
		<?php endif; ?>
	</table>
</body>
</html>