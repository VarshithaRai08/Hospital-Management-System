<!DOCTYPE html>
<html>
<head>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }

  .col-lg-12 {
    margin: 20px;
    margin-top: -675px;
    margin-left:260px;
  }

  .content-panel {
    background-color: #f5f5f5;
    padding: 20px;
    border-radius: 5px;
    max-width: 76%;
    
  }

  .btn-container {
    margin-bottom: 20px;
   
  }

  .btn {
    display: inline-block;
    padding: 8px 12px;
    font-size: 14px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    border-radius: 4px;
    color: #fff;
    background-color: darkred;
    border: 1px solid darkred;
    cursor: pointer;
  }

  .table-container {
    margin-bottom: 20px;
  }

  table {
    width: 80%;
    border-collapse: collapse;
  }

  th,
  td {
    padding: 8px;
    text-align: left;
    border-bottom: 3px solid darkred;
  }

  th {
    background-color: darkred;
    color: #fff;
  }

  tbody tr:nth-child(even) {
    background-color: #f2f2f2;
  }
  
  .btn-accept {
    display: inline-block;
    padding: 8px 12px;
    font-size: 14px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    border-radius: 4px;
    color:white;
    background-color:darkred;
    border: 5px solid darkred;
    cursor: pointer;
  }
  p{
    font-size: 30px;
    color:darkred ;
    font-weight: 600;
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
  require('../Admin/sider_bar1.php');
?>
<div class="col-lg-12">
<p>CURRENT DISCHARGE PATIENT LIST</P>
    <div class="content-panel">
       
        <div class="btn-container">
            <a href="../Admin/discharge.php" class="btn btn-theme">Discharge List</a>
        </div>
    </div>
    <div class="table-container">
    <?php
include('../Dashboard/db_connection.php');
$current_date = date('Y-m-d');

// Fetch patient records with discharge_date equal to current date and no bill generated
$patient_query = "SELECT DISTINCT inpatients.patient_number, inpatients.patient_name, doctor_appointments.spe_name, inpatients.doctor_name 
                  FROM inpatients
                  JOIN doctor_appointments ON inpatients.doctor_name = doctor_appointments.doctor_name
                  WHERE inpatients.discharge_date = '$current_date'
                  AND NOT EXISTS (
                      SELECT 1 FROM discharge
                      WHERE discharge.patient_number = inpatients.patient_number
                      AND discharge.bill_date = '$current_date'
                  )";

$patient_result = mysqli_query($conn, $patient_query);

// Display patient records in a table
if ($patient_result && mysqli_num_rows($patient_result) > 0) {
    echo "<table>";
    echo "<tr>
        <th>Patient Number</th>
        <th>Patient Name</th>
        <th>Department</th>
        <th>Doctor Name</th>
        <th>Actions</th>
      </tr>";

    while ($row = mysqli_fetch_assoc($patient_result)) {
        $patient_number = $row['patient_number'];
        $patient_name = $row['patient_name'];
        $department = $row['spe_name'];
        $doctor_name = $row['doctor_name'];

        echo "<tr>";
        echo "<td>$patient_number</td>";
        echo "<td>$patient_name</td>";
        echo "<td>$department</td>";
        echo "<td>$doctor_name</td>";
        echo "<td><a href=\"bill.php?patient_number=$patient_number\" class=\"btn-accept\">Generate Bill</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No patients found with the discharge date matching the current date.";
}

// Close the database connection
mysqli_close($conn);
?>
</div>
</div>
</body>
</html>
