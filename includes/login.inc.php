<?php
require_once "class_autoloader.php";

// Start the session to access session variables
session_start();

if (isset($_POST["submit"])) {
  
  // CSRF Token Validation
  if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("CSRF token validation failed.");
  }

  // Sanitize and validate inputs
  $username = trim($_POST["username"]);
  $pwd = trim($_POST["pwd"]);

  // Use htmlspecialchars to prevent XSS attacks
  $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
  
  // Check if inputs are empty
  if (empty($username) || empty($pwd)) {
    header("Location: ../login.php?error=empty_input");
    exit();
  }

  // Initialize Login Controller
  $login = new LoginContr($username, $pwd);

  // Attempt to login the user
  $login->LoginUser();

} else {
  header("location: ../login.php");
  exit();
}
?>

