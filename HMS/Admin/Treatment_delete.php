<?php
// Include the necessary files and establish a database connection
include('../Dashboard/db_connection.php');

// Check if the treatment_id parameter is set in the URL
if (isset($_GET['treatment_id'])) {
    // Retrieve the treatment_id from the URL
    $treatment_id = $_GET['treatment_id'];

    // Prepare the delete query
    $sql = "DELETE FROM treatment_details WHERE treatment_id = $treatment_id";

    // Execute the delete query
    if (mysqli_query($conn, $sql)) {
        // Delete successful, redirect back to the treatment list page
        header("Location:../Admin/TreatmentView.php");
        exit();
    } else {
        // Delete failed, display an error message
        echo "Error deleting treatment: " . mysqli_error($conn);
    }
} else {
    // treatment_id parameter is not set, display an error message
    echo "Invalid request";
}
?>
