<?php
include 'db.php';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    $imgename = $_POST['imgename'];
    $categoryId = $_POST['categoryId'];

    $sql = "INSERT INTO Products (title, description, color, price, imgename, categoryId) VALUES ('$title', '$description', '$color', '$price','$imgename', $categoryId)";
    if ($conn->query($sql) === TRUE) {
        header("Location: manageProduct.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<center><h1>Add Product</h1>
<form method="post" action="">
    Title: <input type="text" name="title" required><br>
    Description: <textarea name="description" required></textarea><br>
    Color: <input type="text" name="color"><br>
    Price: <input type="text" name="price"><br>
    Image Name: <input type="text" name="imgename"><br>
    Category ID: <input type="number" name="categoryId" required><br>
    <button type="submit">Add Product</button>
</form>
<br>
<a href="manageProduct.php" class="inda">Back to Product List</a>
</center>
<?php include 'footer.php'; ?>