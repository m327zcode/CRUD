<?php
  include_once('config.php');

  $search = $_GET['search'];

  $result = mysqli_query($mysqli, "SELECT * FROM users WHERE nama LIKE '%$search%' ORDER BY id DESC");
  // echo '<pre>'.print_r(mysqli_fetch_array($result)).'</pre>';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Belajar CRUD</title>
  </head>
  <body>
    <a href="add.php">Add</a><br>
    <a href="logout.php">Logout</a>
    <form action="search.php" method="get">
      <input type="text" name="search" placeholder="Search Data">
      <button type="submit" name="submit">Cari</button>
    </form>
    <form action="edit.php" method="post">
    <table border="1" align= "center" width="100%">

      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Umur</th>
          <th>Navigasi</th>
        </tr>
      </thead>

      <tbody>
        <?php
        // buat perulangan untuk menampilkan array
        if (mysqli_num_rows($result)) {
        while ($res = mysqli_fetch_array($result)) {
        ?>
          <tr>
            <td><?php echo $res['id'] ?></td>
            <td><?php echo $res['nama'] ?></td>
            <td><?php echo $res['alamat'] ?></td>
            <td><?php echo $res['umur'] ?></td>
            <td>
              <a href="edit.php?id=<?php echo $res['id'] ?>">Edit</a>
              <a href="delete.php?id=<?php echo $res['id'] ?>">Delete</a>
            </td>
          </tr>
        <?php }
      } else { ?>
        <tr>
          <td colspan="5" align="center">Data tidak ada</td>
        </tr>

      <?php } ?>
      </tbody>

    </table>
  </form>
  </body>
</html>
