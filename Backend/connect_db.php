<?php

$host = 'localhost';
$username = 'root';
$password = ''; // Default XAMPP MySQL has no password
$database = 'shopproject2'; // Replace with your actual database name

// Attempt to connect to MySQL database
$link = mysqli_connect($host, $username, $password, $database);

if (!$link) {

# Otherwise fail gracefully and explain the error.

    die('Could not connect to MySQL: ' . mysqli_error());

}

$message = 'Connected to the database successfully!';
echo "<script>console.log('PHP message: " . addslashes($message) . "');</script>";

?>