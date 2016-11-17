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
// echo "<pre>".print_r($_POST,1)."</pre>";

// jika ada yang submit data baru kita proses
if(isset($_POST['submit'])){
  $nama = $_POST['nama'];
  $umur = $_POST['umur'];
  $alamat = $_POST['alamat'];

mysqli_query($mysqli, "INSERT INTO users VALUES (null, '$nama', '$umur', '$alamat')");

header("Location:index.php");
}



 ?>
