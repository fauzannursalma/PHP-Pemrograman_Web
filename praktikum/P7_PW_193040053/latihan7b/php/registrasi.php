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
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
</head>

<body>
  <div class="container">
    <br><br>
      <div class="row center">
    <div class="col s12">
      <div class="card white darken-1">
        <div class="card-content">
          <table border="1px" cellpadding="8px" cellspacing="0" class="center">
            <form action="" method="POST">
              <tr>
                <th colspan="3">
                  <h3 class="center">Halaman Registrasi</h3>
                </th>
              </tr>
              <tr>
                  <td><label for="username">Username</label></td>
                  <td>:</td>
                  <td><input type="text" name="username" autofocus></td>
              </tr>
              <tr>
                  <td><label for="password">Password</label></td>
                  <td>:</td>
                  <td><input type="password" name="password"></td>
              </tr>
            </table>
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
      </div>
</body>
</html>