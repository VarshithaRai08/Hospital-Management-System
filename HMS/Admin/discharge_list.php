<?php
include('../Dashboard/db_connection.php');

$sql = "SELECT * FROM discharge";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='discharge-table'>";
    echo "<tr>";
    echo "<th>Patient ID</th>";
    echo "<th>Patient Name</th>";
    echo "<th>Discharged Date</th>";
   
    // Add more columns as needed
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["patient_number"] . "</td>";
        echo "<td>" . $row["patient_name"] . "</td>";
        echo "<td>" . $row["bill_date"] . "</td>";
        
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
.discharge-table {
    width: 60%;
    border-collapse: collapse;
 font-size: 17px;
}

.discharge-table th, .discharge-table td {
    padding: 15px;
    border-bottom: 3px solid darkred;
  
}

.discharge-table th {
    background-color: darkred;
    color:white;
    text-align: left;
}

.discharge-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.discharge-table tr:hover {
    background-color: lightslategray;
}
</style>
