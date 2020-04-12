<?php 
	// Mengecek apakah ada id yang dikirimkan
	// Jika tidak ada maka akan dikembalikan ke halaman index.php
	if (!isset($_GET['id'])){
		header("location: ../index.php");
		exit;
	}

	require 'functions.php';

	// Mengambil id dari url
	$id = $_GET['id'];

	// Melakukan query dengan parameter id yang diambil dari url
	$buku = query("SELECT * FROM buku WHERE id = $id")[0];
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan5c</title>
    <link rel="stylesheet" href=" ../css/style.css">
</head>
<body>
   
       <!--  sumber : http://www.bukabuku.com/ -->
<table border="1px" cellpadding ="8px" cellspacing="0">
    <tr>
        <td><b>Cover</b></td>
        <td colspan="2"><b>Keterangan</b></td>
    </tr>
    <tr>
        <td rowspan="6"><img src="../assets/img/<?= $buku["cover"]; ?>" alt=""></td>
    </tr>
  <div class="keterangan">
    <tr>
        <td><p>Judul Buku   :</p></td>
        <td><p><?= $buku["judul"];?></p></td></td>  
    </tr>
    <tr>
    	<td><p>Pengarang    :</p></td>
    	<td><p><?= $buku["pengarang"];?></p></td>
    </tr>
    <tr>
        <td><p>Penerbit     :</p></td>
        <td><p><?= $buku["penerbit"];?></p></td>
    </tr>
    <tr>
        <td><p>Tahun Terbit :</p></td>
        <td><p><?= $buku["tahun_terbit"];?></p></td> 
    </tr>
    <tr>
        <td><p>Harga 		:</p></td>
        <td><p><?= $buku["harga"];?></p></td>
    </tr>
  </div>
    <tr>
    	<td colspan="3"><button class="tombol-kembali"><a href="../index.php">Kembali</a></button></td>
    </tr>

</table>
        
</body>
</html>