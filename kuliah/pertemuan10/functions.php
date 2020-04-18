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
