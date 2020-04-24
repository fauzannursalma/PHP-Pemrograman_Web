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
	

?>