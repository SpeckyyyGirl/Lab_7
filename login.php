<?php
include 'Database.php'; // Include the database connection file

// Start a session to store login information (optional)
session_start();

// Create an instance of the Database class and get the connection
$database = new Database();
$db = $database->getConnection();

// Check if the form was submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Get form data
  $matric = $_POST['matric'];
  $password = $_POST['password'];

  // Validate the login credentials (replace with your validation logic)
  $is_valid_user = validate_login($matric, $password, $db);  // Replace validate_login with your function

  if ($is_valid_user) {
    // Login successful
    $_SESSION['matric'] = $matric; // Store matric number in session (optional)
    header("Location: page5.php"); // Redirect to a different page (replace with your destination)
    exit();
  } else {
    // Login failed
    $error_message = "Invalid username or password"; // Set an error message
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
</head>
<body>
  <h2>Login</h2>
  <form method="POST" action="login.php">
    <label for="matric">Matric No.:</label>
    <input type="text" id="matric" name="matric" required><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    <button type="submit">Login</button>
  </form>
  <?php if (isset($error_message))
