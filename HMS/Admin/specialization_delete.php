<?php
  include('../Dashboard/db_connection.php');

  // Check if the spe_id parameter is set in the URL
  if(isset($_GET['spe_id'])) {
    $spe_id = $_GET['spe_id'];

    // Delete the specialization from the database
    $sql = "DELETE FROM specialization WHERE spe_id = '$spe_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      // Deletion successful, redirect back to the specialization list page
      header('Location:../Admin/specializationView.php');
      exit();
    } else {
      // Deletion failed, display an error message
      echo "Error deleting specialization: " . mysqli_error($conn);
    }
  }
?>
