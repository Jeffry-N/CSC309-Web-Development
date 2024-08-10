<?php
include 'header.php';
include 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    $imgename = $_POST['imgename'];
    $categoryId = $_POST['categoryId'];

    // Prepare the UPDATE statement to prevent SQL injection
    $stmt = $conn->prepare("UPDATE Products SET title=?, description=?, color=?, imgename=?, categoryId=?, price=? WHERE id=?");
    $stmt->bind_param("ssssiii", $title, $description, $color, $imgename, $categoryId, $price, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: manageProduct.php");
    } else {
        echo "Error updating record: ". $stmt->error;
    }
} else {
    // Prepare the SELECT statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM Products WHERE id =?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "No product found with that ID.";
        exit();
    }
}
?>

<center><h1>Edit Product</h1>
<form method="post" action="">
    Title: <input type="text" name="title" value="<?php echo htmlspecialchars($product['title']);?>" required><br>
    Description: <textarea name="description" required><?php echo htmlspecialchars($product['description']);?></textarea><br>
    Color: <input type="text" name="color" value="<?php echo htmlspecialchars($product['color']);?>"><br>
    Price: <input type="text" name="price" value="<?php echo htmlspecialchars($product['price']);?>"><br>
    Image Name: <input type="text" name="imgename" value="<?php echo htmlspecialchars($product['imgename']);?>"><br>
    Category ID: <input type="number" name="categoryId" value="<?php echo htmlspecialchars($product['categoryId']);?>" required><br>
    <button type="submit">Update Product</button>
</form>
<br>
<a href="manageProduct.php" class="inda">Back to Product List</a>
</center>

<?php
include 'footer.php';
?>