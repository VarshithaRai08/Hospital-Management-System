<?php
function getDBConnection() {
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "abhaya";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

session_start();
include("../Dashboard/db_connection.php");

// Check if the user is logged in
if (!isset($_SESSION["uname"])) {
    echo "User not logged in.";
    exit;
}

// Get the logged-in user's username from the session
$username = $_SESSION["uname"];

// Retrieve the new username and password from the form
$newUsername = $_POST["new_username"];
$newPassword = $_POST["new_password"];

// Database connection
$conn = getDBConnection();

// Update the username and password for the logged-in user
$sql = "UPDATE login SET username = ?, password = ? WHERE username = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $newUsername, $newPassword, $username);

if ($stmt->execute()) {
    echo "Username and password updated successfully.";
} else {
    echo "Error updating username and password: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
