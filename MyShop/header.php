<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple Store</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <div style="float: left;">
            <?php if (isset($_SESSION['username'])): ?>
                <p>Welcome Back, <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; ?> | <a href="login.php?x=1">Logout</a></p>
            <?php else: ?>
                <a href="login.php">Login</a> | 
                <a href="register.php">Register</a>
            <?php endif; ?>
            </div>

        <div style="float: right;">
            <form action="Products.php" method="get">
                <input type="text" name="search" placeholder="Search for products">
                <button type="submit">Search</button>
            </form>
        </div>
    </header>