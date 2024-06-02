<?php
include 'Database.php'; // Include the database connection file

// Start a session to store login information
session_start();

// Create an instance of the Database class and get the connection
$database = new Database();
$db = $database->getConnection();

// Check if the form was submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Get form data
  $matric = $_POST['matric'];
  $password = $_POST['password'];

  // Validate the login credentials
  $is_valid_user = validate_login($matric, $password, $db);

  if ($is_valid_user) {
    // Login successful
    $_SESSION['matric'] = $matric; // Store matric number in session
    header("Location: page5.php"); // Redirect to a different page (replace with your destination)
    exit();
  } else {
    // Login failed
    $error_message = "Invalid username or password"; // Set an error message
  }
}

?>