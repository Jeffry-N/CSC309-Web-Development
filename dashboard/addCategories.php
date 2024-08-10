<?php
include 'db.php';
include 'header.php';

// Ensure only admin users can access this page
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_name = $_POST['cName'];
    $image_name = $_POST['imageName'];

    // Insert the new category into the database
    $sql = "INSERT INTO categories (cName, imageName) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $category_name, $image_name);

    if ($stmt->execute()) {
        echo "Category added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}
?>

    <center><h1>Add New Category</h1>
    <form method="post" action="">
        <label for="cName">Category Name:</label>
        <input type="text" id="cName" name="cName" required><br><br>
        <label for="imageName">Image Name:</label>
        <input type="text" id="imageName" name="imageName" required><br><br>
        <button type="submit">Add Category</button>
    </form>
</center>
<?php
include 'footer.php';
?>