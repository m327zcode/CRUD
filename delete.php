<?php
include('config.php');

$id = $_GET['id'];
$del = "DELETE FROM `users` WHERE `users`.`id` = $id";

$que = mysqli_query($mysqli, $del);

if($que) {
  header("Location:index.php");
} else {
  echo "gagal delete";
}
 ?>
