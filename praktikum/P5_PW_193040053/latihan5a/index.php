<?php 
	//melakukan Koneksi ke Database
	$conn = mysqli_connect("localhost","root","")or die("Koneksi ke Database Gagal!");
	//memilih database
	mysqli_select_db($conn, "tubes_193040053")or die("Database Salah!");
	//query mengambil objek dari tabel didalam database
	$result = mysqli_query($conn, "SELECT * FROM buku");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan5a</title>
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
    <?php while ($row =mysqli_fetch_assoc($result)) : ?> 
    
    <tr>
        <td><?="$row[id]";?></td>
        <td><img src="assets/img/<?="$row[cover]";?>"></td>
        <td><?="$row[judul]";?></td>
        <td><?="$row[pengarang]";?></td>
        <td><?="$row[penerbit]";?></td>
        <td><?="$row[tahun_terbit]";?></td> 
        <td><?="$row[harga]";?></td>  
    </tr>
    <?php endwhile; ?>
</table>
        
</body>
</html>