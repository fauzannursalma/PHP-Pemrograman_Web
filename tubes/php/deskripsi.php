<?php
// Mengecek apakah ada id yang dikirimkan
require 'functions.php';
session_start();
if (!isset($_SESSION["username"])) {
    header("location: login.php");
    exit;
}

// Mengambil id dari url
$id = $_GET['id'];

// Melakukan query dengan parameter id yang diambil dari url
$buku = query("SELECT * FROM buku WHERE id = $id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $buku["judul"]; ?></title>
    <link rel="icon" type="image/png" href="../assets/index/1.png">
    <link type="text/css" rel="stylesheet" href=" ../css/materialize.min.css" media="screen,projection" />
    <style type="text/css">
        body {
            background-image: url(../assets/img-background/background_ubah.jpg);
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="col m6 s8" style="margin-top: 80px">
            <div class="card blue-grey darken-2 center">
                <div class="card-content white-text">
                    <span class="card-title"><?= $buku["judul"]; ?></span>
                    <p><?= $buku["sinopsis"]; ?></p>
                </div>
            </div>
        </div>
        <div class="kembali">
            <a href="admin.php" class="waves-effect waves-light red darken-4 btn-small"> Kembali</a>
        </div>
    </div>

    <!--  sumber : http://www.bukabuku.com/ -->



</body>

</html>