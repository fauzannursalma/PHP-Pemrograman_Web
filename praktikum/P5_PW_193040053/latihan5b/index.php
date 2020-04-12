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
    <title>Latihan5b</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
                
       <!--  sumber : http://www.bukabuku.com/ -->
   
    
   
<table border="1px" cellpadding ="8px" cellspacing="0">
    <tr>
        <td><b>No.</b></td>
        <td><b>Cover</b></td>
        <td><b>Judul</b></td>
        <td><b>Pengarang</b></td>
        <td><b>Penerbit</b></td>
        <td><b>Tahun Terbit</b></td>
        <td><b>harga</b></td>
    </tr>
    <?php foreach ($buku as $b ) : ?>
    <tr>
        <td><?="$b[id]";?></td>
        <td><img src="assets/img/<?="$b[cover]";?>"></td>
        <td><?="$b[judul]";?></td>
        <td><?="$b[pengarang]";?></td>
        <td><?="$b[penerbit]";?></td>
        <td><?="$b[tahun_terbit]";?></td> 
        <td><?="$b[harga]";?></td>  
    </tr>
    <?php endforeach; ?>
</table>
        
</body>
</html>