<?php
session_start();

if (isset($_SESSION['login'])) {
  header("Location: index.php");
  exit;
}
require 'functions.php';

// ketika tombol login di tekan
if (isset($_POST['login'])) {
	$login = login($_POST);
}


?>
<!DOCTYPE html>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<style>
    body{
      background-image: url(img/background/login.jpg);
      background-size: cover;
    }
		.card{
      background:rgba(0,0,0,.8);
      margin-top: 50px; 
    }
    label {
      font-size: 16px;
      color: white;
    } 
    input{
      font-size: 24px !important;
      color: white;
    }
	</style>
	<title>Login</title>
</head>
<body>
	<div class="container">
    <div class="row">
      <div class="col s12 l8 offset-l2">
        <div class="card">
          <div class="card-action white center">
            <h4>Login</h4>
          </div>
          <div class="alert">
            <?php if (isset($login['error'])) : ?>
              <h4 class="red-text center"><?= $login['pesan']; ?></h4>
            <?php endif; ?>
          </div>
          <div class="card-content">
            <form action="" method="POST">
            <div class="form-field">
              <label for="username">Username</label>
              <input type="text" name="username" id="username" autofocus autocomplete="off">
            </div><br>
            <div class="form-field">
              <label for="password">Password</label>
              <input type="password" name="password" id="password">
            </div><br>
            <div class="form-field">
              <div class="row">
                <div class="row">
                <div class="col s6"></div>
                <div  class="col s6">
                <button type="submit" name="login" class="waves-effect waves-light blue darken-4 btn-large right">Login</button></div>
                </div>
                </div>
            </form>
          </div>
          <div class="row">
                <div class="col s12 center">
                  <p class="white-text">Belum Punya Akun ? Registrasi <a href="registrasi.php">disini</a></p>
                </div>
              </div>
        </div>
      </div>
    </div>

</body>
</html>