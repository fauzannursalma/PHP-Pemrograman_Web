<?php 
	//function untuk koneksi ke database
	function Koneksi(){
		$conn = mysqli_connect("localhost","root","")or die("Koneksi ke Database Gagal!");
		mysqli_select_db($conn, "tubes_193040053")or die("Database Salah!");

		return $conn;
	}
	
	//function untuk melakukan query ke database
	function query($sql){
		$conn = koneksi();
		$result = mysqli_query($conn, "$sql");

		$row = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

	function tambah($data)
{
	$conn = koneksi();

	$cover = htmlspecialchars($data['cover']);
	$judul = htmlspecialchars($data['judul']);
	$pengarang = htmlspecialchars($data['pengarang']);
	$penerbit = htmlspecialchars($data['penerbit']);
	$tahun_terbit = htmlspecialchars($data['tahun_terbit']);
	$harga = htmlspecialchars($data['harga']);
	$deskripsi = htmlspecialchars($data['sinopsis']);

	$query = "INSERT INTO 
							buku
						VALUES
						(null, '$cover', '$judul', '$pengarang', '$penerbit', '$tahun_terbit','$harga','$deskripsi')";
	mysqli_query($conn, $query);
	echo mysqli_error($conn);
	return mysqli_affected_rows($conn);
}
	
	function hapus($id)
{
	$conn = koneksi();	
	mysqli_query($conn, "DELETE FROM buku WHERE id = $id");
	return mysqli_affected_rows($conn);
}
	

?>