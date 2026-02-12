<?php
// Define the database connection parameters
$host = 'localhost';  // Database host (could be 'localhost' or an external server)
$dbname = 'ogtech';  // Database name
$username = 'root';  // Database username
$password = '';  // Database password (empty if no password is set for root)

// Create a new connection to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check for a successful connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the character set to UTF-8 for proper encoding
$conn->set_charset("utf8");

// Optionally, you can log errors or handle them more gracefully
// Error reporting could be turned on for debugging
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
?>

 

 

 