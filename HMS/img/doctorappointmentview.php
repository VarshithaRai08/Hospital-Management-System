<!DOCTYPE html>
<html>
<head>
<style>
    /* CSS styles omitted for brevity */
    #container{
        margin-left: 300px;
        margin-top: -600px;
    }
    h1{
        text-align: center;
        color: green;
    }
    /* CSS for the table */
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 3px solid green;
    border-top: 3px solid green;
    border-left: 3px solid green;
    border-right: 3px solid green;
    }
    #container p{
        font-size: 30px;
        font-weight: 900;
        font-family: sans-serif;
        margin-bottom: 30px;
        color: green;
    }
    th {
        background-color: #f2f2f2;
        margin-left: 100px;
    }
    /* Additional styles */
    div.align-center {
        text-align: center;
    }
  
</style>
</head>
<body>

<?php
include('db_connection.php');
  // include first file
  require('navigation.php');

  // include second file
  require('pcpanel.php');
  ?>
<div id="container">
    <h1>Appointment View</h1>
<?php
$uname = $_SESSION['uname'];

// Fetch appointment records for the specific patient
$appointment_query = "SELECT * FROM doctor_appointments WHERE pidno = '$uname'" ;

$appointment_result = mysqli_query($conn, $appointment_query);

// Display appointment records in a table
if (mysqli_num_rows($appointment_result) > 0) {
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
            <th>Cancel</th>
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
        echo '<td><a href="DoctorAppointment_delete.php?ap_id=' . $row['ap_id'] . '"><img src="delete.png" width="37" height="31" title="DELETE"></a></td>';

        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No appointment records found.";
}
?>
</div>