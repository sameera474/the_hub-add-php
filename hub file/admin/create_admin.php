<?php
// Database connection
require_once '../customer/conn_connection.php';

// Password to hash
$password = 'admin123';

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert the new admin user with hashed password
$stmt = $conn->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
$username = 'admin';
$stmt->bind_param("ss", $username, $hashed_password);

if ($stmt->execute()) {
    echo "Admin user created successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
