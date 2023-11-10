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
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="flex justify-center items-center h-[900px]">
    <div class="rounded-lg shadow-lg px-[100px] py-[90px] bg-white">
      <h2 class="text-[30px] font-bold text-center mb-3">Blog Post Edit</h2>
  <form method="POST" action="edit_post.php?pid=<?php echo $row['id'];?>">
  <div class="relative z-0 w-full mb-6 group">
      <input type="text" name="post" id="post" value='<?php echo $currentPost; ?>' class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
      <label for="username" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Blog Post</label>
  </div>
  <button type="submit" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
  <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
      Edit
  </span>
</button>
  </form>
    </div>
</div>
</body>
</html>