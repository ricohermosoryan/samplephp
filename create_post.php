<?php
include('db.php');
ini_set('display_errors', 1);
ini_set('display_startup_error', 1);
error_reporting(E_ALL);

if(isset($_POST['post'])) {
  $_POST['post'] = strip_tags($_POST['post']);
  $post = mysqli_real_escape_string($conn, $_POST['post']);

  $sql = "INSERT INTO post (post, user_id) VALUES ('$post', 1)";
  // $stmt = $conn->prepare("INSERT INTO posts (post, user_id) VALUES (:post, :id)");
  // $stmt->bind_param(':post', $post);
  // $stmt->bind_param(':id' , 1);
  // $result = $stmt->execute();

  if($conn->query($sql)) {
    header("Location: home.php");
  } else {
    echo "There was an error";
  }
}
?>