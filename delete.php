<?php
include 'Database.php';
include 'User.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  // Retrieve the matric value from the GET request
  if (isset($_GET['matric'])) { // Check if 'matric' key exists before accessing it
    $matric = $_GET['matric'];
  } else {
    // Handle the case where 'matric' is not present in the request (optional)
    echo "Error: Matric number not provided";
    exit();
  }

  // Create an instance of the Database class and get the connection
  $database = new Database();
  $db = $database->getConnection();

  // Create an instance of the User class
  $user = new User($db);
  $user->deleteUser($matric);

  // Close the connection
  $db->close();
}

