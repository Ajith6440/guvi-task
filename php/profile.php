<?php
// Set up database connection
$host = 'localhost';
$user = 'root';
$password = 'Ajith2601';
$dbname = 'guvi_db';

$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve user's profile information
$user_id = $_SESSION['user_id']; // or however you identify the user
$sql = "SELECT age, date_of_birth, contact FROM users WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $age = $row['age'];
  $dob = $row['date_of_birth'];
  $contact = $row['contact'];
} else {
  echo "User not found";
}

// Display profile information
echo "Age: " . $age . "<br>";
echo "Date of Birth: " . $dob . "<br>";
echo "Contact: " . $contact . "<br>";

// Update profile button
echo "<form action='update_profile.php' method='post'>";
echo "<input type='submit' value='Update Profile'>";
echo "</form>";

$conn->close();
?>