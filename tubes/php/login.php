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
  <title>Halaman Login</title>
  <link rel="icon" type="image/png" href="../assets/index/1.png">
  <!-- Import google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
  <style>
    body{
      background-image: url(../assets/img-background/background_login.jpg);
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
            <h4>Login</h4>
          </div>
          <div class="card-content">
            <div class="alert">
              <?php if (isset($error)) : ?>
                  <h5 style="color: red; font-style: italic;">Username atau Password Salah !</h5>
                <?php endif; ?>
            </div>
            <form action="" method="POST">
            <div class="form-field">
              <label for="username">Username</label>
              <input type="text" name="username" id="username" autofocus autocomplete="off" required>
            </div><br>
            <div class="form-field">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" required>
            </div><br>
            <div class="form-field">
              <label>
              <input id="indeterminate-checkbox remember" type="checkbox" name="remember" value="remember" /><span>Remember me</span>
              </label>
            </div><br>
            <div class="form-field">
              <div class="row">
                <div class="row">
                <div class="col s6">
                <a href="../index.php" class="waves-effect waves-light red darken-4 btn-large left"> Kembali</a></div>
                <div  class="col s6">
                <button type="submit" name="submit" class="waves-effect waves-light blue darken-4 btn-large right">Login</button></div>
                </div>
                </div>
              <div class="row">
                <div class="col s12 center">
                  <p class="white-text">Belum Punya Akun ? Registrasi <a href="registrasi.php">disini</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    
</body>

</html>