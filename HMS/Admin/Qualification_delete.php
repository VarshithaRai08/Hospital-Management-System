<?php
include('../Dashboard/db_connection.php');

// Check if the qualification_id parameter is set
if (isset($_GET['qualification_id'])) {
  $qualification_id = $_GET['qualification_id'];

  // Delete the qualification from the database
  $sql = "DELETE FROM qualification WHERE qualification_id = $qualification_id";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    // Redirect to the qualification list page
    header("Location:../Admin/qualification.php");
    exit();
  } else {
    echo "Error deleting qualification: " . mysqli_error($conn);
  }
} else {
  echo "Invalid qualification ID.";
}
?>
