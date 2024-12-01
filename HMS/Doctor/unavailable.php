<?php
session_start();
// Include the db_connection.php file to establish the database connection
include('../Dashboard/db_connection.php');

// Assuming 'uname' contains the value of the doctor_name you want to match
$uname = $_SESSION['uname'];

// Get the selected date from the form
$date = $_POST['date'];

// Update the status and date of the doctor_details table
$sql = "UPDATE doctor_details SET status = 'Unavailable', date = '$date' WHERE doctor_name = '$uname'";
$result = $conn->query($sql);

if ($result) {
  // Update successful
  echo "Status updated successfully!";
} else {
  // Update failed
  echo "Error updating status: " . $conn->error;
}

// Close the database connection
$conn->close();

// Navigate to doctorView.php
header("Location: ../Doctor/ddoctorView1.php");
exit;
?>
