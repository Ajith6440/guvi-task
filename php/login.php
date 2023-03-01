<?php
// Set database connection variables
$host = 'localhost';
$user = 'root';
$password = 'Ajith2601';
$database = 'guvi_db';

// Connect to MySQL database
$conn = mysqli_connect($host, $user, $password, $database);

// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user input from login form
$username = $_POST['username'];
$password = $_POST['password'];
// Create SQL query to check if username and password match
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

// Execute query
$result = mysqli_query($conn, $sql);

// Check if query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Check if username and password match
if (mysqli_num_rows($result) == 1) {
    // Login successful
    echo "Login successful!";
} else {
    // Login failed
    echo "Invalid username or password";
}

// Close database connection
mysqli_close($conn);
?>