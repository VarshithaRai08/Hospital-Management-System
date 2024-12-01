<?php
include('../Dashboard/db_connection.php');

// include first file
require('../Dashboard/navigation.php');

// include second file
require('../Patient/pcpanel.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the selected specialization value
  $spe_id = $_POST['spe_id'];

  // Enable error reporting
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

  // Execute a query to retrieve the specialization name based on the selected spe_id
  $spe_name_query = "SELECT spe_name FROM specialization WHERE spe_id = '$spe_id'";
  $spe_name_result = mysqli_query($conn, $spe_name_query);
  $spe_name_row = mysqli_fetch_assoc($spe_name_result);
  $spe_name = $spe_name_row['spe_name'];

  // Execute a query to retrieve doctor details based on the selected specialization
  $sql = "SELECT * FROM doctor_details WHERE spe_name = '$spe_name'";

  // Execute the query
  $result = mysqli_query($conn, $sql);

  // Display the doctor details as profiles
  if (mysqli_num_rows($result) > 0) {
    echo "<div style='display: flex; flex-wrap: wrap; justify-content: center;'>";

    while ($row = mysqli_fetch_assoc($result)) {
      echo "<div style='border: 3px solid green; border-radius: 10px;top:0; width:300px;padding: 20px; margin: 10px; text-align: center;margin-top:-590px;'>";
      echo "<img src='../upload/" . $row['doctor_photo'] . "' width='150' height='150' style='border-radius: 50%; object-fit: cover;'>";
      echo "<h3 style='color: green;'>" . $row['doctor_name'] . "</h3>";

      echo "<p><strong>Gender:</strong> " . $row['gender'] . "</p>";
      echo "<p><strong>Date of Birth:</strong> " . $row['dob'] . "</p>";
      echo "<p><strong>Date of Joining:</strong> " . $row['date_of_joining'] . "</p>";
      echo "<p><strong>Qualification:</strong> " . $row['qualification_name'] . "</p>";
      echo "<p><strong>Specialization:</strong> " . $spe_name . "</p>";
      echo "<p><strong>Address:</strong> " . $row['doctor_address'] . "</p>";
      echo "<p><strong>Mobile Number:</strong> " . $row['mobile_number'] . "</p>";
      echo "<p><strong>Email ID:</strong> " . $row['email_id'] . "</p>";
      echo "</div>";
    }

    echo "</div>";
  } else {
    echo "<p>No doctor details found for the selected specialization.</p>";
  }

  // Free the result set
  mysqli_free_result($result);
}

// Close the database connection
mysqli_close($conn);
?>
