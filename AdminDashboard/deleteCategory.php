<?php
include 'header.php';
include 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "DELETE FROM categories WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: manageCategory.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>

<center><h1>Delete Product</h1>
<p>Are you sure you want to delete this product?</p>
<form method="post" onsubmit="return confirm('Are you sure you want to delete this Category?');">
    <button type="submit">Yes, delete it</button>
</form>
<br>
<a href="manageProduct.php" class="inda">Back to Manage Categories</a>
</center>

<?php
include 'footer.php';
?>