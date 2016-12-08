<?php
session_start();
if(isset($_SESSION['user'])){
  unset($_SESSION['email']);
  session_destroy();
  header("Location:login.php");
}
 ?>
