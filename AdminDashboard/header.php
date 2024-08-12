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
                <p>Welcome Back, <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; ?> | <a href="index.php?x=1">Logout</a></p>
            <?php else: ?>
                <a href="index.php">Login</a>
            <?php endif; ?>
            </div>
            <div style="float: right;">
            <form method="get" action="manage.php">
            <button type="submit" class="inda">Home Page</button>
            </form>
            </div>
    </header>