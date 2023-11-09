<?php 
session_start();
if(isset($_SESSION['login'])) {
  session_unset();
  header("Location: login.php");
} else {
  header("Location: login.php");
}

?>