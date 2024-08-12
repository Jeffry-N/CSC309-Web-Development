<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_SESSION['username'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if old password is correct
    $sql = "SELECT password FROM Users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();

    if (password_verify($old_password, $hashed_password)) {
        if ($new_password === $confirm_password) {
            // Update the password in the database
            $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $sql = "UPDATE Users SET password = ? WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $new_hashed_password, $username);

            if ($stmt->execute()) {
                echo "<script>alert('Password updated successfully!'); window.location.href='index.php';</script>";
            } else {
                echo "<script>alert('Error updating password: " . $conn->error . "');</script>";
            }

            $stmt->close();
        } else {
            echo "<script>alert('New password and confirm password do not match.');</script>";
        }
    } else {
        echo "<script>alert('Old password is incorrect.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple Store - Change Password</title>
    <link rel="stylesheet" href="changepassword.css">

</head>
<body>

    <center><h1>Change Password</h1></center>
    <form method="post" action="">
        <label for="old_password">Old Password:</label>
        <input type="password" id="old_password" name="old_password" required><br><br>
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required><br><br>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
        <button type="submit">Change Password</button>
    </form>

</body>
</html>