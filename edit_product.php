<?php 
include('db.php');

if(isset($_GET['pid'])) {
  $pid = $_GET['pid'];

  $sql = "SELECT * FROM products WHERE id = $pid";
  $result = $conn->query($sql);

  if($result->num_rows > 0) { 
    $row = $result->fetch_assoc();
    $product_name = $row['product_name'];
    $product_price = $row['product_price'];
    $product_image = $row['product_image'];
    $product_description = $row['product_description'];
  }
}

if(isset($_POST['submit'])) {
  $new_product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
  $new_product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
  $new_product_image = mysqli_real_escape_string($conn, $_POST['product_image']);
  $new_product_description = mysqli_real_escape_string($conn, $_POST['product_description']);

  $update_sql = "UPDATE products 
                 SET product_name = '$new_product_name', 
                     product_price = '$new_product_price', 
                     product_image = '$new_product_image', 
                     product_description = '$new_product_description' 
                 WHERE id = $pid";

if($conn->query($update_sql)) {
  header("Location: home.php");
} else {
  echo "Error updating product: " . $conn->error;
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
      <h2 class="text-[30px] font-bold text-center mb-3">Edit Products</h2>
      
    <form method="post" class="flex flex-col gap-2 w-[400px]">
      
    <div class="relative z-0 w-full mb-6 group">
      <input type="text" name="product_name" id="product_name" value='<?php echo $product_name;?>' class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="product_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Product Name</label>
  </div>

  <div class="relative z-0 w-full mb-6 group">
      <input type="number" name="product_price" id="product_price" value='<?php echo $product_price;?>' class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="product_price" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Product Price</label>
  </div>

  <div class="relative z-0 w-full mb-6 group">
      <input type="text" name="product_image" id="product_image" value='<?php echo $product_image;?>' class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="product_image" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Image Url</label>
  </div>

  <div class="relative z-0 w-full mb-6 group">
      <input type="text" name="product_description" id="product_description" value='<?php echo $product_description;?>' class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="product_description" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Product Description</label>
  </div>

  <div>
  <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit Product</button>
  </div>

    </form>
    </div>
</div>
</body>
</html>