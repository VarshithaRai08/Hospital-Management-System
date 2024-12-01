
<?php  // include first file
require('../Dashboard/navigation.php');

// include second file
require('../Doctor/dcdash.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Previous Treatments</title>
    <style>
             

        h1 {
            color:darkblue;
            margin-left:260px;
            margin-top:-550px;
        }
        h3 {
            color: red;
            margin-left:500px;
            font-size: 30px;
    
        }

        table {
            width: 50%;
            border-collapse: collapse;
            margin-left:400px;
          
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: darkblue;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
  

<?php
include('../Dashboard/db_connection.php');

// Check if the user is logged in
if (!isset($_SESSION['uname'])) {
    // Redirect the user to the login page or handle the unauthorized access in some way
    header("Location:../Dashboard/login.php");
    exit;
}

// Retrieve the patient number and patient name from the URL parameters
$patient_number = isset($_GET['patient_number']) ? $_GET['patient_number'] : '';
$patient_name = isset($_GET['patient_name']) ? $_GET['patient_name'] : '';

// Retrieve the previous treatments for the patient
$query = "SELECT * FROM inpatient_treatment WHERE patient_number = '$patient_number' AND patient_name = '$patient_name'";
$result = mysqli_query($conn, $query);

// Check if any previous treatments found
if (mysqli_num_rows($result) > 0) {

    echo "<h1>Previous Treatments </h1>";
    echo "<h3>Patient: $patient_name ($patient_number)</h3>";
    echo "<table>";
    echo "<tr>
       
            <th>Treatment Date</th>
            <th>Treatment Time</th>
            <th>Treatment</th>
            <th>Other Treatment</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $treatment_date = $row['treatment_date'];
        $treatment_time = $row['treatment_time'];
        $treatment_type = $row['treatment_type'];
        $others = $row['others'];

        echo "<tr>
            
                <td>$treatment_date</td>
                <td>$treatment_time</td>
                <td>$treatment_type</td>
                <td>$others</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No previous treatments found for the patient.";
}
?>

</body>
</html>
