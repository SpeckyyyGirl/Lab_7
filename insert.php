<?php
include 'Database.php';
include 'User.php';

// Create an instance of the Database class and get the connection
$database = new Database();
$db = $database->getConnection();

// Create an instance of the User class
$user = new User($db);

// Check if POST data exists
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['matric']) && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['role'])) {
  // Register the user using POST data
  $user->createUser($_POST['matric'], $_POST['name'], $_POST['password'], $_POST['role']);
} else {
  // Handle the case where some data is missing (optional)
  echo "Error: Please fill in all required fields";
}

// Close the connection
$db->close();


