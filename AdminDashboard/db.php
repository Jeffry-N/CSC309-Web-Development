<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "productmanagement";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!($conn)){
    die("Connection failed: " . mysqli_error($conn));
}

?>