<?php  
    require 'functions.php';
    $mahasiswa = query("SELECT * FROM mahasiswa");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Mahasiswa</title>
</head>
<body>
	<table border="1px" cellpadding ="8px" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Foto</th>
        <th>Nama</th>
        <th>NRP</th>
        <th>Jurusan</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($mahasiswa as $mhs) : ?> 
    <tr>
        <td><?=$mhs['id'];?></td>
        <td><img src= "img/<?= $mhs['foto']; ?>" width="80" height="120"></td>
        <td><?=$mhs['nama'];?></td>
        <td><?=$mhs['nrp'];?></td>
        <td><?=$mhs['jurusan'];?></td>
        <td><?=$mhs['email'];?></td> 
        <td>
        	<a href="">Ubah</a> | <a href="">Hapus</a>
        </td>

    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>