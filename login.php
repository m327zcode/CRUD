<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <form action="login.php" method="post">

          <label for="email">Email</label>
          <input type="email" name="email" ><br>

          <label for="password">Password</label>
          <input type="password" name="password" ><br>

          <button type="submit" name="submit">Login</button>
    </form>
  </body>
</html>

<?php
session_start();
include_once('config.php');
include_once('helper.php');

if(isset($_SESSION['user'])){
  header("location: index.php");
}

if(isset($_POST['submit'])){
  $email = filterData($_POST['email']);
  $password = md5($_POST['password']);
  $submit = filterData($_POST['submit']);
  // buat koneksi
  // buat form
  // buat query untuk select data berdasarkan email
  // membandingkan data yang di input email password dengan data users yang ada di table, jika sama dengan data yang ada di table users maka di login dan redirec/pindah halaman ke index.php/home dan jika salah maka redirec ke halaman login dengan pesan error

  $login = mysqli_query($mysqli, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");

  $data = mysqli_fetch_array($login);
  $rows = mysqli_num_rows($login);
  if ($rows) {
    //kita login
    $_SESSION['user'] = $data['email'];
    // redirect ke index.php
    header("Location:index.php");
  } else {
    echo "gagal login!!!";
  }
  // echo "<pre>".print_r($row,true)."</pre>";
}
 ?>
