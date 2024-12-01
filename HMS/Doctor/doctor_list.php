<?php
include('db_connection.php');
$currentDate = date("Y-m-d");

$sql = "SELECT * 
      FROM doctor_details";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='inpatients_table'>";
    echo "<tr>";
    
    echo "<th>Doctor Name</th>";
    echo "<th>Gender</th>";
    echo "<th>Department</th>";
    echo "<th>Qualification</th>";
    echo "<th>Status</th>";

   
    // Add more columns as needed
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["doctor_name"] . "</td>";
        echo "<td>" . $row["gender"] . "</td>";
        echo "<td>" . $row["spe_name"] . "</td>";
        echo "<td>" . $row["qualification_name"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";


        
        // Add more columns as needed
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No patients found.";
}

$conn->close();
?>

<style>
.inpatients_table {
    width: 60%;
    border-collapse: collapse;
    font-size: 18px;
}

.inpatients_table th, .inpatients_table td {
    padding: 15px;
    border-bottom: 3px solid darkred;
}

.inpatients_table th {
    background-color: darkred;
    color:white;
    text-align: left;
}

.inpatients_table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.inpatients_table tr:hover {
    background-color: lightslategray;
}
</style>
