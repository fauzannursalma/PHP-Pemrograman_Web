<?php 
require 'functions.php';

if (isset($_POST["registrasi"])){
  if (registrasi($_POST) > 0){
    echo "<script>
            alert('Registrasi Berhasil. Silahkan Login');
            document.location.href = 'login.php';
          </script>";
  } else {
      echo "<script>
            alert('Registrasi Gagal!');
          </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registerasi</title>
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <style>
    body{
      background-image: url(img/background/registrasi.jpg);
      background-size: cover;
    }
    .card{
      background:rgba(0,0,0,.5);
      margin-top: 50px; 
    }
    label {
      font-size: 16px;
      color: white;
    } 
    input, textarea{
      font-size: 24px !important;
      color: white;
    }

  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col s12 l8 offset-l2">
        <div class="card">
          <div class="card-action white center">
            <h4>Halaman Registrasi</h4>
          </div>
          <div class="card-content">
            <form action="" method="POST">
            <div class="form-field">
              <label for="username">Username</label>
              <input type="text" name="username" autofocus autocomplete="off" required="">
            </div><br>
            <div class="form-field">
              <label for="password">Password</label>
              <input type="password" name="password1" required="">
            </div><br>
            <div class="form-field">
              <label for="password">*Konfirmasi Password</label>
              <input type="password" name="password2" required="">
            </div><br>
            <div class="form-field">
              <div class="row">
                <div class="col s6">
                <a href="login.php" class="waves-effect waves-light red darken-4 btn-large left"> Kembali</a></div>
                <div  class="col s6">
                <button type="submit" name="registrasi" class="waves-effect waves-light blue darken-4 btn-large right">Registrasi</button></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</body>
</html>