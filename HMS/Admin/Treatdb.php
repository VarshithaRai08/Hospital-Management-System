<?php 
include('../Dashboard/db_connection.php');
if (isset($_POST['Submit'])) {
    $treatment_name = $_POST['treatment_name'];
    $spe_id = $_POST['spe_id'];
    $treatment_description = $_POST['treatment_description'];
    $treatment_fees = $_POST['treatment_fees'];
   

    // Fetch specialization name from the database based on spe_id
    $sql_specialization = "SELECT spe_name FROM specialization WHERE spe_id = '$spe_id'";
    $result_specialization = mysqli_query($conn, $sql_specialization);
    $row_specialization = mysqli_fetch_assoc($result_specialization);
    $specialization_name = $row_specialization['spe_name'];

    $sql = "INSERT INTO treatment_details (treatment_name, treatment_sp, treatment_description,  treatment_fees) VALUES ('$treatment_name', '$specialization_name', '$treatment_description',  '$treatment_fees')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Values inserted.");</script>';
        echo '<script>document.location="../Admin/TreatmentView.php";</script>';
    } else {
        echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
    }
}
?>
