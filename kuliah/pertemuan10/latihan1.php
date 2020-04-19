<?php
// Koneksi ke DB & pilih Database
$conn = mysqli_connect('localhost', 'root', '', 'pw_193040053');

// Query isi tabel mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// ubah data ke dalam array
//$row = mysqli_fetch_row($result);   // array numerik
//$row = mysqli_fetch_assoc($result); // array associative
//$row = mysqli_fetch_array($result); // keduanya
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

// tampung ke variabel mahasiswa
$mahasiswa = $rows;
?>
<!DOCTYPE html>
<html>

<head>
    <title>Daftar Mahasiswa</title>
</head>

<body>
    <table border="1px" cellpadding="8px" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>NRP</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1;
        foreach ($mahasiswa as $mhs) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><img src="img/<?= $mhs['foto']; ?>" width="85" height="120"></td>
                <td><?= $mhs['nama']; ?></td>
                <td><?= $mhs['nrp']; ?></td>
                <td><?= $mhs['jurusan']; ?></td>
                <td><?= $mhs['email']; ?></td>
                <td>
                    <a href="">Ubah</a> | <a href="">Hapus</a>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>










</body>

</html>