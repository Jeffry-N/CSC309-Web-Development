<?php
include 'header.php';
include 'db.php';

// Ensure only admin users can access this page
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];

    // Update the user's is_admin status
    $sql = "UPDATE users SET is_admin = 1 WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);

    if ($stmt->execute()) {
        echo "User promoted to admin successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}
?>



    <center><h1>Promote User to Admin</h1>
    <form method="post" action="">
        Username: <input type="text" name="username" required><br>
        <button type="submit">Promote to Admin</button>
    </form>
    </center>
<?php
include 'footer.php';
?>