<?php
session_start();
include 'db.php';

// Handle logout
if (isset($_GET['x']) && $_GET['x'] == 1) {
    session_destroy();
    header("Location: index.php");
    exit();
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Store user information in session
            $_SESSION['username'] = $user['username'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['is_admin'] = $user['is_admin']; // Set is_admin session variable
            header("Location: manage.php");
            exit();
        } else {
            $error_message = "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <center><h1>Login</h1></center>
    <form method="post" action="">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required id="password"><br>
        Show Password: <input type="checkbox" onclick="showPassword()"><br>
        <button type="submit">Sign In</button>
    </form>
    <script>
        function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <br>
    <center><a href="ChangePassword.php">Change Password</a></center>
</body>
</html>