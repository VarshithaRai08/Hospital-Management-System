<?php
// Include the necessary files and establish a database connection
include('../Dashboard/db_connection.php');

// Check if the doctor_id parameter is set in the URL
if (isset($_GET['doctor_id'])) {
    // Retrieve the doctor_id from the URL
    $doctor_id = $_GET['doctor_id'];

    // Prepare the delete query
    $sql = "DELETE FROM doctor_details WHERE doctor_id = $doctor_id";

    // Execute the delete query
    if (mysqli_query($conn, $sql)) {
        // Delete successful, redirect back to the doctor list page
        header("Location:../Admin/doctorview.php");
        exit();
    } else {
        // Delete failed, display an error message
        echo "Error deleting doctor: " . mysqli_error($conn);
    }
} else {
    // doctor_id parameter is not set, display an error message
    echo "Invalid request";
}
?>
