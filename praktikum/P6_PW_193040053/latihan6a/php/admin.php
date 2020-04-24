<?php 
// menghubungkan dengan file php lainnya
require 'functions.php';
// melakukan query
$buku = query("SELECT * FROM buku");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<link rel="stylesheet" href=" ../css/style.css">
	<link type="text/css" rel="stylesheet" href=" ../css/materialize.min.css"  media="screen,projection"/>
</head>
<body>
	<table border="1" cellpadding="13" cellspacing="0" class=" responsive-table striped">
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
		<?php $i =1; ?>
		<?php foreach ($buku as $b) :?>
			<tr>
				<td><?= $i; ?></td>
				<td>
					<a href="" class="waves-effect waves-light blue darken-1 btn-small">Ubah</a>
					<a href="" class="waves-effect waves-light red darken-1 btn-small">Hapus</a>
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
	</table>
</body>
</html>