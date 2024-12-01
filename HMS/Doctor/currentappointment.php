<!DOCTYPE html>
<html>
<head>
<style>
   /* Global styles */

body {
  font-family: Arial, sans-serif;
}
h1{
    margin-top: -600px;
  margin-left: 260px;
  color: darkblue;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
  margin-top: -600px;
  margin-left: 260px;
}

/* Navigation styles */

.navbar {
  background-color: #333;
  color: #fff;
  padding: 10px;
}

.navbar a {
  color: #fff;
  text-decoration: none;
  margin-right: 10px;
}

/* Content panel styles */

.content-panel {

  padding: 20px;
}

.btn-container {
  margin-bottom: 20px;
  margin-left: 260px;
}

.btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: darkblue;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
}

/* Table styles */

.table-container {
  margin-top: 20px;
  margin-left: 260px;
}

table {
  width: 100%;
  border-collapse: collapse;
}

table th,
table td {
  padding: 10px;
  border-bottom: 3px solid darkblue;
}

table th {
  background-color: darkblue;
  color: #fff;
}

/* Button styles */

.btn-accept {
  display: inline-block;
  padding: 5px 10px;
  background-color: #4caf50;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
}

.btn-delete {
  display: inline-block;
  padding: 5px 10px;
  background-color: #f44336;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
}

.btn-delete img {
  vertical-align: middle;
  margin-right: 5px;
}


</style>
<script>
    // JavaScript code for automatically refreshing the page every 5 seconds
    setTimeout(function(){
       location.reload();
    }, 5000);
</script>
</head>
<body>
<?php
  // include first file
  require('../Dashboard/navigation.php');

  // include second file
  require('../Doctor/dcdash.php');
?>
<h1>TODAYS APPOINTMENTS</h1>
<div class="col-lg-12">
    <div class="content-panel">
        <div class="btn-container">
            <a href="doctorappointmentdetails.php" class="btn btn-theme">Appointment Booked</a>
        </div>
    </div>
    <div class="table-container">
    <?php
include('../Dashboard/db_connection.php');

// Check if the user is logged in
if (!isset($_SESSION['uname'])) {
    // Redirect the user to the login page or handle the unauthorized access in some way
    exit("Unauthorized access. Please login first.");
}

$uname = $_SESSION['uname'];

// Get the current date
$current_date = date('Y-m-d');

// Fetch appointment records for the specific doctor and current date
// Fetch appointment records for the specific doctor and current date, excluding matched patient visits
$appointment_query = "
    SELECT *
    FROM doctor_appointments
    WHERE doctor_name = '$uname'
    AND appointment_date = '$current_date'
    AND NOT EXISTS (
        SELECT 1
        FROM doctor_suggestion
        WHERE doctor_suggestion.patient_number = doctor_appointments.pidno
        AND doctor_suggestion.patient_visit = doctor_appointments.appointment_date
    )
";
$appointment_result = mysqli_query($conn, $appointment_query);

// Display appointment records in a table
if ($appointment_result && mysqli_num_rows($appointment_result) > 0) {
    echo "<table>";
    echo "<tr>
        <th>Patient Number</th>
        <th>Patient Name</th>
        <th>Specialization</th>
        <th>Doctor Name</th>
        <th>Appointment Date</th>
        <th>Time Slot</th>
        <th>Description</th>
        <th>Current</th>
        <th>Accept</th>
       
      </tr>";

    while ($row = mysqli_fetch_assoc($appointment_result)) {
        $patient_number = $row['pidno'];
        $patient_name = $row['patient_name'];
        $spe_name = $row['spe_name'];
        $doctor_name = $row['doctor_name'];
        $appointment_date = $row['appointment_date'];
        $time_slot = $row['time_slot'];
        $description = $row['description'];
        $current = $row['current'];

        echo "<tr>";
        echo "<td>$patient_number</td>";
        echo "<td>$patient_name</td>";
        echo "<td>$spe_name</td>";
        echo "<td>$doctor_name</td>";
        echo "<td>$appointment_date</td>";
        echo "<td>$time_slot</td>";
        echo "<td>$description</td>";
        echo "<td>$current</td>";
        echo '<td><a href="doctorsuggestion.php?patient_number=' . $patient_number . '&patient_name=' . $patient_name . '" class="btn-accept">Accept</a></td>';
      
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No appointment records found for the current date.";
}

// Close the database connection
mysqli_close($conn);
?>

    </div>
</div>
</body>
</html>
