<?php
$server = 'localhost:3307';
$username = 'root';
$password = '';
$database = 'abhaya';

// Create a new mysqli connection
$conn = new mysqli($server, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Connection successful

?>
