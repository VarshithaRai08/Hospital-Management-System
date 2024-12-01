<?php
// Include the database connection file
include('db_connection.php');

if (isset($_POST['dischargeDate'])) {
    $dischargeDate = $_POST['dischargeDate'];

    // Get the patient number from the URL parameters or session variable
    $patient_number = $_GET['patient_number'] ?? $_SESSION['patient_number'] ?? '';

    // Update the discharge date in the inpatients table
    $sql = "UPDATE inpatients SET discharge_date = '$dischargeDate' WHERE patient_number = '$patient_number'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "success";
    } else {
        echo "error";
    }
}

// Close the database connection
mysqli_close($conn);
?>
