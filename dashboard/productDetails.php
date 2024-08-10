<?php
include 'db.php';
include 'header.php';

$id = $_GET['id'];
$sql = "SELECT * FROM Products WHERE id = $id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
?>

<center><h1>Product Details</h1></center>
<center><form method="get" action="editProduct.php">
  <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
  <button type="submit" class="inda">Edit Product</button>
</form>
<form method="get" action="deleteProduct.php">
  <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
  <button type="submit" class="inda">Delete Product</button>
</form>
</center>
<center>
<p>Title: <?php echo $product['title']; ?></p>
<p>Description: <?php echo $product['description']; ?></p>
<p>Color: <?php echo $product['color']; ?></p>
<p>Price: <?php echo $product['price']; ?></p>
<a href="manageproduct.php" class="inda">Back to Product List</a>
</center>

<?php include 'footer.php'; ?>