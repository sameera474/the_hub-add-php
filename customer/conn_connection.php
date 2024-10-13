<?php
// Database connection parameters for local server
$servername = "localhost";
$username = "root"; // XAMPP default MySQL username is 'root'
$password = ""; // XAMPP default MySQL password is empty
$dbname = "the_hub"; // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
