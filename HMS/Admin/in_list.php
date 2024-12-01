<?php
include('db_connection.php');

$sql = "SELECT inpatients.patient_number, inpatients.patient_name, inpatients.room_number, inpatients.patient_visit
      FROM inpatients
      LEFT JOIN discharge ON inpatients.discharge_date = discharge.bill_date
      WHERE discharge.bill_date IS NULL";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='inpatients_table'>";
    echo "<tr>";
    echo "<th>Patient ID</th>";
    echo "<th>Patient Name</th>";
    echo "<th>Room Number</th>";
    echo "<th>Admitted Date</th>";
    // Add more columns as needed
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["patient_number"] . "</td>";
        echo "<td>" . $row["patient_name"] . "</td>";
        echo "<td>" . $row["room_number"] . "</td>";
        echo "<td>" . $row["patient_visit"] . "</td>";
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
    color: white;
    text-align: left;
}

.inpatients_table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.inpatients_table tr:hover {
    background-color: lightslategray;
}
</style>
