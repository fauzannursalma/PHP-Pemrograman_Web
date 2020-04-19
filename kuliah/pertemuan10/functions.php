<?php
function koneksi()
{
	return mysqli_connect('localhost', 'root', '', 'pw_193040053');
}

function query($sql)
{
	$conn = koneksi();

	$result = mysqli_query($conn, $sql);

	// jika hasilnya hanya 1 data
	if (mysqli_num_rows($result) == 1) {
		return mysqli_fetch_assoc($result);
	}

	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}

function tambah($data)
{
	$conn = koneksi();

	$nama = htmlspecialchars($data['nama']);
	$nrp = htmlspecialchars($data['nrp']);
	$jurusan = htmlspecialchars($data['jurusan']);
	$email = htmlspecialchars($data['email']);
	$foto = htmlspecialchars($data['foto']);

	$query = "INSERT INTO 
							mahasiswa
						VALUES
						(null, '$nama', '$nrp', '$jurusan', '$email', '$foto')";
	mysqli_query($conn, $query);
	echo mysqli_error($conn);
	return mysqli_affected_rows($conn);
}
