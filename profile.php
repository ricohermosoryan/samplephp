<?php
include('db.php');

if(isset($_GET['m'])) {
  $m = $_GET['m'];

  $sql = "SELECT * FROM users WHERE id = $m";
  $result = $conn->query($sql);

  if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentUserName = $row['name'];
    $currentUserMobile = $row['mobile'];
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <p><?php echo $currentUserName; ?></p>
  <p><?php echo $currentUserMobile; ?></p>
</body>
</html>