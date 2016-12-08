<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tambah Data User</title>
  </head>
  <body>
    <form action="add.php" method="post">
      <label for="nama" >Nama</label>
      <input type="text" name="nama" ><br>

      <label for="email">Email</label>
      <input type="email" name="email" ><br>

      <label for="password">Password</label>
      <input type="password" name="password" ><br>

      <label for="umur">Umur</label>
      <input type="text" name="umur" ><br>

      <label for="alamat">Alamat</label>
      <textarea name="alamat" ></textarea><br>

      <input type="submit" name="submit"value="Simpan">
    </form>

  </body>
</html>
<?php
// membuat include / memasukkan file config ke dalam add.php
include_once('config.php');
include_once('helper.php');
// echo "<pre>".print_r($_POST,1)."</pre>";

// jika ada yang submit data baru kita proses
if(isset($_POST['submit'])){
  $nama = filterData($_POST['nama']);
  $umur = filterData($_POST['umur']);
  $alamat = filterData($_POST['alamat']);
  $email = filterData($_POST['email']);
  $password = md5(filterData($_POST['password']));

  if(empty($nama) || empty($umur) || empty($alamat) || empty($email) || empty($password)){
    echo "tidak boleh ada yang kosong";
  } else {
    $sql = mysqli_query($mysqli, "INSERT INTO users VALUES (null, '$nama', '$umur', '$alamat', '$email', '$password')");
  }
  header("Location:index.php");
}

 ?>
