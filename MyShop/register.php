<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];

    $sql = "INSERT INTO users (username, password, first_name, last_name, date_of_birth, is_admin) VALUES ('$username', '$password', '$first_name', '$last_name', '$date_of_birth', 0)";
    if ($conn->query($sql) === TRUE) {
        header("Location: login.php?x=2");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="reg.css">
</head>
<body>
    <center><h1>Register</h1></center>
    <form method="post" action="">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        Confirm Password: <input type="password" name="confirm_password" required><br>
        Show Password: <input type="checkbox" onclick="showPassword()"><br>
        First Name: <input type="text" name="first_name"><br>
        Last Name: <input type="text" name="last_name"><br>
        Date of Birth: <input type="date" name="date_of_birth"><br>
        <button type="submit">Sign Up</button>
    </form>
    <script>
        function showPassword() {
            var x = document.querySelectorAll("input[type='password']");
            x.forEach(function(el) {
                if (el.type === "password") {
                    el.type = "text";
                } else {
                    el.type = "password";
                }
            });
        }
    </script>
    <br>
    <center><a href="login.php">Already have an account? Login</a></center>
</body>
</html>