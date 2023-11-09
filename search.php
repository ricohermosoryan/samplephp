<?php
include('db.php');


$search = mysqli_real_escape_string($conn, $_GET['search']); // prevent from sql injection using the code mysqli_real_escape_string()

$sql = "SELECT username FROM users WHERE username LIKE '%$search%'";
$result = $conn->query($sql);

if($result->num_rows > 0) {
  echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>".$row['username']."</li>";
    }
    echo "</ul>";
} else {
  echo "No Result Found";
}
echo "<br><a href='home.php'>Go Back</a>";
$conn->close();


?>
