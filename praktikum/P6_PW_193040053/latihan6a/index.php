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
    <title>Latihan6a</title>
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href=" css/style.css">
</head>
<body>
<div class="container">
<table border="1px" cellpadding ="3px" cellspacing="0" class="responsive-table">
    <tr>
        <div class="top">
        <td><b>#</b></td>
        <td><b>Judul</b></td>
        </div>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($buku as $b ) : ?>
    <tr>
        <td><a href="php/detail.php?id=<?= $b['id'] ?>"><?= $i; ?></a></td>
        <td><p><a href="php/detail.php?id=<?= $b['id'] ?>">
            <?="$b[judul]";?></a></p></td>
     </tr>
     <?php $i++; ?>
    <?php endforeach; ?>
</table>
</div>
    <!--  sumber gambar : http://www.bukabuku.com/ -->
</body>
</html>