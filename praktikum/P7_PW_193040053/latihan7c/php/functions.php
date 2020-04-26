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
		$result = mysqli_query($conn, $sql);

		$rows = [];
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

	function ubah($data)
{
	global $conn;

	$conn = koneksi();

	$id = $data['id'];
	$cover = htmlspecialchars($data['cover']);
	$judul = htmlspecialchars($data['judul']);
	$pengarang = htmlspecialchars($data['pengarang']);
	$penerbit = htmlspecialchars($data['penerbit']);
	$tahun_terbit = htmlspecialchars($data['tahun_terbit']);
	$harga = htmlspecialchars($data['harga']);
	$deskripsi = htmlspecialchars($data['sinopsis']);

	$queryubah = "UPDATE buku 
					SET 
					cover = '$cover',
					judul = '$judul',
					pengarang = '$pengarang',
					penerbit = '$penerbit',
					tahun_terbit = '$tahun_terbit',
					harga = '$harga',
					sinopsis = '$deskripsi'
				WHERE id = '$id' ";
	mysqli_query($conn, $queryubah);

	return mysqli_affected_rows($conn);
}
	function cari($keyword){
		$conn = koneksi();

		$query = "SELECT * FROM buku WHERE 
				judul LIKE '%$keyword%' OR 
				pengarang LIKE '%$keyword%' OR
				penerbit LIKE '%$keyword%' OR
				tahun_terbit LIKE '%$keyword%' OR
				harga LIKE '%$keyword%' ";

		$result = mysqli_query($conn, $query);

		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
			} 
		return $rows;
}
	function registrasi($data){

		$conn = koneksi();
		$username = strtolower(stripcslashes($data["username"]));
		$password = mysqli_real_escape_string($conn, $data["password"]);

		// cek username sudah ada atau belum 
		$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' ");
		if (mysqli_fetch_assoc($result)){
			echo "<script>
					alert('username sudah digunakan');
				</script>";
			return false;
		}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambah user baru
	$query_tambah = "INSERT INTO user VALUES (null,'$username','$password')";
	mysqli_query($conn, $query_tambah);

	return mysqli_affected_rows($conn);
}
?>