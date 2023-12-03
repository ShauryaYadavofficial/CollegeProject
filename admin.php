<?php
include_once('./connection.php');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get user input
$username = $_POST['username'];
$password = $_POST['password'];

// Query to check if the user exists in the database
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Redirect to candidates_list.php if credentials match
  header('Location: candidates_list.php');
  exit;
} else {
  echo "Invalid username or password";
}

$conn->close();
?>
