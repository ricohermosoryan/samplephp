<?php
include('db.php');

if(isset($_GET['pid'])) {
  $pid = $_GET['pid'];

  $sql = "SELECT * FROM post WHERE id = $pid";
  $result = $conn->query($sql);

  if($result->num_rows > 0 ) {
    $row = $result->fetch_assoc();
    $currentPost = $row['post'];
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
  <form method="POST" action="edit_post.php?pid=<?php echo $row['id'];?>">
  <input type="text" name="post" id="post" value='<?php echo $currentPost; ?>'>
  <button type="submit">Edit</button>
  </form>
</body>
</html>