<?php 
session_start();
require 'functions.php';
// melakukan pengecekan apakah user sudah melakukan login, jika sudah redirect ke halaman admin
if (isset($_SESSION['username'])){
  header("location: admin.php");
  exit;
}
// cek coockie
if (isset($_COOKIE['username'])&& isset($_COOKIE['hash'])) {
  $username = $_COOKIE['username'];
  $hash = $_COOKIE['hash'];

  // ambil username berdasarkan id 
  $result = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");
  $row = mysqli_fetch_assoc($result);

  // cek cookie dan username
  if ($hash == hash('sha256', $row['id'], false)){
    $_SESSION['username'] = $row['username'];
    header("Location: admin.php");
    exit;
  }
}
// login
if (isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cek_user = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");
// mencocokan USERNAME dan PASSWORD
  if (mysqli_num_rows($cek_user) > 0) {
    $row = mysqli_fetch_assoc($cek_user);
    if(password_verify($password, $row['password'])){
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['hash'] = hash('sha256', $row['id'], false);
// jika remember me dicentang
      if (isset($_POST['remember'])){
        setcookie('username', $row['username'], time() + 60 * 60 * 24);
        $hash = hash('sha256', $row['id']);
        setcookie('hash', $hash, time() + 60 * 60 * 24);
      }
      if (hash('sha256', $row['id']) == $_SESSION['hash']){
          header("location: admin.php");
          die;
        }
      header("location: ../index.php");
    die;
    }
  }
  $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
</head>

<body>
  <div class="container">
    <br>
      <div class="row center">
    <div class="col s12">
      <div class="card white darken-1">
        <div class="card-content">
          <table border="1px" cellpadding="8px" cellspacing="0" class="center">
            <form action="" method="POST">
              <tr>
                <th colspan="3">
                  <h3 class="center">Halaman Login</h3>
                </th>
              </tr>
              <tr>
                <td colspan="3">
                <?php if (isset($error)) : ?>
                  <h3 style="color: red; font-style: italic;">Username atau Password Salah !</h3>
                <?php endif; ?>
                </td>
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
              <tr>
                <td colspan="3">
                  <div class="remember">
                    <label>
                        <input id="indeterminate-checkbox remember" type="checkbox" name="remember" value="remember" />
                        <span>Remember me</span>
                    </label>
                  </div>
                </td>
              </tr>
            </table>
            <br>
              <div class="row">
                <div class="col s6">
                <a href="../index.php" class="waves-effect waves-light red darken-4 btn-large left"> Kembali</a></div>
                <div  class="col s6">
                <button type="submit" name="submit" class="waves-effect waves-light blue darken-4 btn-large right">Login</button></div>
              </div>
              <div class="row">
                <div class="col s12">
                  <p>Belum Punya Akun ? Registrasi <a href="registrasi.php">disini</a></p>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
      </div>
</body>

</html>