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
	mysqli_query($conn, $query) or die(mysqli_error($conn));
	return mysqli_affected_rows($conn);
}

function hapus($id)
{
	$conn = koneksi();
	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id") or die(mysqli_error($conn));
	return mysqli_affected_rows($conn);
}

function ubah($data)
{
	$conn = koneksi();

	$id = htmlspecialchars($data['id']);
	$nama = htmlspecialchars($data['nama']);
	$nrp = htmlspecialchars($data['nrp']);
	$jurusan = htmlspecialchars($data['jurusan']);
	$email = htmlspecialchars($data['email']);
	$foto = htmlspecialchars($data['foto']);

	$queryubah = "UPDATE mahasiswa SET
				nama = '$nama',
				nrp = '$nrp',
				jurusan = '$jurusan',
				email = '$email',
				foto = '$foto'
			WHERE id = $id";
	mysqli_query($conn, $queryubah) or die(mysqli_error($conn));
	return mysqli_affected_rows($conn);
}

function cari($keyword){
	$conn = koneksi();
	$query = "SELECT * FROM mahasiswa WHERE 
				nama LIKE '%$keyword%' ";

		$result = mysqli_query($conn, $query);

		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
			} 
		return $rows;
}
?>