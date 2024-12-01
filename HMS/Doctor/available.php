<?php
session_start();
// Include the db_connection.php file to establish the database connection
include('../Dashboard/db_connection.php');

// Assuming 'uname' contains the value of the doctor_name you want to match
$uname = $_SESSION['uname'];

// Update the status of the doctor_details table
$sql = "UPDATE doctor_details SET status = 'Available' WHERE doctor_name = '$uname'";
$result = $conn->query($sql);

// Check if the update was successful

// Close the database connection
$conn->close();

// Navigate to doctorView.php
header("Location: ../Doctor/ddoctorView1.php");
exit;
?>
