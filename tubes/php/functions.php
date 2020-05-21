<?php
//function untuk koneksi ke database
function Koneksi()
{
	$conn = mysqli_connect("localhost", "root", "") or die("Koneksi ke Database Gagal!");
	mysqli_select_db($conn, "tubes_193040053") or die("Database Salah!");

	return $conn;
}

//function untuk melakukan query ke database
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

function upload()
{
	$nama_file = $_FILES['cover']['name'];
	$tipe_file = $_FILES['cover']['type'];
	$ukuran_file = $_FILES['cover']['size'];
	$error = $_FILES['cover']['error'];
	$tmp_file = $_FILES['cover']['tmp_name'];

	// ketika tidak ada gambar yang di pilih
	if ($error == 4) {

		return 'nobooks.png';
	}

	// cek ekstensi file 
	$daftar_cover = ['jpg', 'jpeg', 'png'];
	$ekstensi_file = explode('.', $nama_file);
	$ekstensi_file = strtolower(end($ekstensi_file));

	if (!in_array($ekstensi_file, $daftar_cover)) {
		echo "<script>
					alert('Yang anda pilih bukan gambar/foto!');
				</script>";
		return false;
	}

	// cek type file
	if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
		echo "<script>
					alert('Yang anda pilih bukan gambar/foto!');
				</script>";
		return false;
	}

	// cek ukuran file
	// max 5mb == 5000000
	if ($ukuran_file > 5000000) {
		echo "<script>
					alert('Ukuran file terlalu besar!');
				</script>";
		return false;
	}

	// lolos pengecekan
	// siap upload file
	// generate nama file baru
	$nama_file_baru = uniqid();
	$nama_file_baru .= '.';
	$nama_file_baru .= $ekstensi_file;
	move_uploaded_file($tmp_file, '../assets/img/' . $nama_file_baru);

	return $nama_file_baru;
}

function tambah($data)
{
	$conn = koneksi();

	// $cover = htmlspecialchars($data['cover']);
	$judul = htmlspecialchars($data['judul']);
	$pengarang = htmlspecialchars($data['pengarang']);
	$penerbit = htmlspecialchars($data['penerbit']);
	$tahun_terbit = htmlspecialchars($data['tahun_terbit']);
	$harga = htmlspecialchars($data['harga']);
	$deskripsi = htmlspecialchars($data['sinopsis']);
	// upload cover
	$cover = upload();
	if (!$cover) {
		return false;
	}



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
	// menghapus gambar di folder img
	$b = query("SELECT * FROM buku WHERE id = $id");
	if ($b['cover'] != 'nobooks.png') {
		unlink('../assets/img/' . $b['cover']);
	}

	mysqli_query($conn, "DELETE FROM buku WHERE id = $id") or die(mysqli_error($conn));
	return mysqli_affected_rows($conn);
}

function ubah($data)
{
	global $conn;

	$conn = koneksi();

	$id = $data['id'];
	$cover_lama = htmlspecialchars($data['cover_lama']);
	$judul = htmlspecialchars($data['judul']);
	$pengarang = htmlspecialchars($data['pengarang']);
	$penerbit = htmlspecialchars($data['penerbit']);
	$tahun_terbit = htmlspecialchars($data['tahun_terbit']);
	$harga = htmlspecialchars($data['harga']);
	$deskripsi = htmlspecialchars($data['sinopsis']);

	$cover = upload();
	if (!$cover) {
		return false;
	}
	if ($cover == 'nobooks.png') {
		$cover = $cover_lama;
	} elseif ($cover_lama != 'nobooks.png') {
		unlink('../assets/img/' . $data['cover_lama']);
		// agar foto_lama yang != nobooks.png terhapus diganti dengan foto baru
	}

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
function cari($keyword)
{
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
function registrasi($data)
{

	$conn = koneksi();
	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);

	// cek username sudah ada atau belum 
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' ");
	if (mysqli_fetch_assoc($result)) {
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
