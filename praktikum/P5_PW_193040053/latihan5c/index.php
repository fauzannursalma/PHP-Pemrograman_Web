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
    <title>Latihan5c</title>
    <link rel="stylesheet" href=" css/style.css">
          <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
</head>
<body>
	<div class="utama">
        <div class="card">
<table border="1px" cellpadding ="3px" cellspacing="0" class="striped">
    <tr>
        <div class="top">
        <td><b>No</b></td>
        <td><b>Judul</b></td>
        </div>
    </tr>
    <?php foreach ($buku as $b ) : ?>
    <tr>
        <td><a href="php/detail.php?id=<?= $b['id'] ?>" class="nomor">
            <?="$b[id]";?></td>
        <td><p><a href="php/detail.php?id=<?= $b['id'] ?>">
            <?="$b[judul]";?></a></p></td>
     </tr>
    <?php endforeach; ?>
</table>
        </div>
	</div>
    <!--  sumber gambar : http://www.bukabuku.com/ -->
</body>
</html>