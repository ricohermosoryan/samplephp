<?php
include('db.php');

if(isset($_GET['pid'])) {
  $pid = $_GET['pid'];

  $sql = "DELETE FROM post WHERE id = $pid";
  if($conn->query($sql) === true) {
    header("Location: home.php");
  } else {
    echo "There was an error";
  }
}
?>