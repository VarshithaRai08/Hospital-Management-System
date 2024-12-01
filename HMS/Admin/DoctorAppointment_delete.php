<?php
include('../Dashboard/db_connection.php');

// Check if an ap_id is provided
if (isset($_GET['ap_id'])) {
    // Sanitize the input to prevent SQL injection
    $apId = mysqli_real_escape_string($conn, $_GET['ap_id']);

    // Check if the ap_id exists in the database
    $checkQuery = "SELECT * FROM doctor_appointments WHERE ap_id = '$apId'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // ap_id is valid, proceed with deletion
        $deleteQuery = "DELETE FROM doctor_appointments WHERE ap_id = '$apId'";
        $deleteResult = mysqli_query($conn, $deleteQuery);

        if ($deleteResult) {
            // Deletion successful
            echo '<script>alert("Appointment deleted successfully.");</script>';
            echo '<script>window.location.href = "../Doctor/doctorappointmentview.php";</script>';
            exit();
        } else {
            // Deletion failed
            echo '<script>alert("Failed to delete appointment.");</script>';
            echo '<script>window.location.href = "../Doctor/doctorappointmentview.php";</script>';
            exit();
        }
    } else {
        // Invalid ap_id provided
        echo '<script>alert("Invalid appointment ID.");</script>';
        echo '<script>window.location.href = "../Doctor/doctorappointmentview.php";</script>';
        exit();
    }
} else {
    // No ap_id provided
    echo '<script>alert("No appointment ID provided.");</script>';
    echo '<script>window.location.href = "../Doctor/doctorappointmentview.php";</script>';
    exit();
}
?>
