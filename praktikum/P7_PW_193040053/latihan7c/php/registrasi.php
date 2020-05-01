<?php 
require 'functions.php';

if (isset($_POST["register"])){
  if (registrasi($_POST) > 0){
    echo "<script>
            alert('Registrasi Berhasil');
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
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
  <!-- Import google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
  <style>
    body{
      background-image: url(../assets/img-background/background_registrasi.jpg);
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
    h4{
        font-family: 'Orbitron', sans-serif;
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
              <input type="text" name="username" autofocus>
            </div><br>
            <div class="form-field">
              <label for="password">Password</label>
              <input type="password" name="password">
            </div><br>
            <div class="form-field">
              <div class="row">
                <div class="col s6">
                <a href="login.php" class="waves-effect waves-light red darken-4 btn-large left"> Kembali</a></div>
                <div  class="col s6">
                <button type="submit" name="register" class="waves-effect waves-light blue darken-4 btn-large right">Register</button></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</body>
</html>