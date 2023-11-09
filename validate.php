<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('db.php');

if(isset($_GET['m'])) {
  switch($_GET['m']){
    case "login":
      if(isset($_POST)){
        $usename = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $sql = "SELECT * FROM users WHERE username = '$usename' AND password = '$password'";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
          echo "LOGIN Success!";
          $user = $result->fetch_assoc();
          $_SESSION['login'] = true;
          $_SESSION['id'] = $user['id'];
          $_SESSION['name'] = $user['name'];
          header("Location: home.php");
        } else {
          echo "Invalid Login <br> <a href='login.php'>Back</a>"; 
        }
        
      }
      break;
    case "register":
      if(isset($_POST)) {
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "INSERT INTO users (name, mobile, username, password) VALUES ('$name', '$mobile', '$username', '$password')";
          if($conn->query($sql)) {
            echo "Registered <br> <a href='login.php'>Login</a>";
          } else {
            echo ("Error:" .$conn->error);
          }

      }  

      break;
    default:
      echo "Invalid action";
  }
}
?>