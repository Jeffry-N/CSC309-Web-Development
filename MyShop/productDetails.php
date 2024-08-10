<?php
include 'db.php';
include 'header.php';

$id = $_GET['id'];
$sql = "SELECT * FROM Products WHERE id = $id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
?>

<center><h1>Product Details</h1>
<p>Title: <?php echo $product['title']; ?></p>
<p>Description: <?php echo $product['description']; ?></p>
<p>Color: <?php echo $product['color']; ?></p>
<p>Price: <?php echo $product['price']; ?></p>
<a href="index.php" class="inda">Back to Product List</a>
</center>

<?php include 'footer.php'; ?>