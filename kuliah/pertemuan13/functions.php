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

function upload(){
	$nama_file = $_FILES['foto']['name'];
	$tipe_file = $_FILES['foto']['type'];
	$ukuran_file = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmp_file =$_FILES['foto']['tmp_name'];

	// ketika tidak ada gambar yang di pilih
	if ($error == 4){
		// echo "<script>
		// 		alert('Pilih gambar/foto terlebih dahulu!')
		// 	</script>";
		return 'nophoto.jpg';
	}

	// cek eksistensi
	$daftar_foto = ['jpg','jpeg','png'];
	$eksistensi_file = explode('.', $nama_file);
	$eksistensi_file = strtolower(end($eksistensi_file));
	if(!in_array($eksistensi_file, $daftar_foto)){
		echo "<script>
				alert('yang Anda pilih bukan gambar/foto')
			</script>";
		return false;
	}

	// cek tipe file
	if($tipe_file != 'image/jpeg' && $tipe_file != 'image/png' ){
		echo "<script>
				alert('yang Anda pilih bukan gambar/foto')
			</script>";
		return false;
	}

	// cek ukuran file
	// maksimal 5mb == 5000000
	if ($ukuran_file > 5000000) {
		echo "<script>
				alert('ukuran file terlalu besar !')
			</script>";
		return false;
	}

	// lolos pengecekan
	// siap upload file
	// generate nama file baru
	$nama_file_baru = uniqid();
	$nama_file_baru .= '.';
	$nama_file_baru .= $eksistensi_file;
	move_uploaded_file($tmp_file, 'img/'. $nama_file_baru);

	return $nama_file_baru;
}

function tambah($data)
{
	$conn = koneksi();

	$nama = htmlspecialchars($data['nama']);
	$nrp = htmlspecialchars($data['nrp']);
	$jurusan = htmlspecialchars($data['jurusan']);
	$email = htmlspecialchars($data['email']);
	// $foto = htmlspecialchars($data['foto']);

	// upload gambar
	$foto = upload();
	if(!$foto){
		return false;
	}

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
	// menghapus gambar di folder img
	$mhs = query("SELECT * FROM mahasiswa WHERE id = $id");
	if($mhs['foto'] != 'nophoto.jpg'){
		unlink('img/'. $mhs['foto']);
	}
	
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
	$foto_lama = htmlspecialchars($data['foto_lama']);

	$foto = upload();
	if(!$foto){
		return false;
	}

	if($foto == 'nophoto.jpg'){
		$foto = $foto_lama;
	} elseif ($foto_lama != 'nophoto.jpg' ) {
		unlink('img/'. $data['foto_lama']);
		// agar foto_lama yang != nophoto.jpg terhapus diganti dengan foto baru
	}  

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

function cari($keyword)
{
	$conn = koneksi();
	$query = "SELECT * FROM mahasiswa WHERE 
				nama LIKE '%$keyword%' OR
				nrp LIKE '%$keyword%' OR
				jurusan LIKE '%$keyword%' OR
				email LIKE '%$keyword%' ";

		$result = mysqli_query($conn, $query);

		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
			} 
		return $rows;
}

function login($data)
{
	$conn = koneksi();

	$username = htmlspecialchars($data['username']);
	$password = htmlspecialchars($data['password']);

	// cek dulu username
	if($user = query("SELECT * FROM user WHERE username = '$username'")){
		// cek password 
		if (password_verify($password, $user['password'])) {
			// set sesssion
			$_SESSION['login'] = true;
			header("Location: index.php");
			exit;
		}
	} return [
			'error' => true,
			'pesan' => 'Username / Password Salah !'
	];
}

function registrasi($data)
{
	$conn = koneksi();

	$username = htmlspecialchars(strtolower($data['username']));
	$password1 = mysqli_real_escape_string($conn, $data['password1']);
	$password2 = mysqli_real_escape_string($conn, $data['password2']);

	// Jika username / password kosong 
	if (empty($username) || empty($password1) || empty($password2)) {
		echo "<script>
				alert('Username / Password tidak boleh kosong!');
				document.location.href = 'registrasi.php';
			</script>";
		return false;
	}

	// Jika username sudah ada
	if (query("SELECT * FROM user WHERE username = '$username'")) {
		echo "<script>
				alert('Username sudah terdaftar!');
				document.location.href = 'registrasi.php';
			</script>";
		return false;
	}

	// Jika konfirmasi password tidadk sesuai
	if ($password1 !== $password2) {
		echo "<script>
				alert('Konfirmasi Password tidak sesuai !');
				document.location.href = 'registrasi.php';
			</script>";
		return false;
	}

	// Jika password < 5 digit
	if (strlen($password1) < 5) {
		echo "<script>
				alert('Konfirmasi Password tidak sesuai !');
				document.location.href = 'registrasi.php';
			</script>";
		return false;
	}

	// Jika username & password sudah sesuai
	// enkripsi password
	$password_baru = password_hash($password1, PASSWORD_DEFAULT);
	// insert ke tabel user
	$query = "INSERT INTO user
				VALUES 
				(null, '$username','$password_baru')";
	mysqli_query($conn, $query) or die(mysqli_error($conn));
	return mysqli_affected_rows($conn);
}
