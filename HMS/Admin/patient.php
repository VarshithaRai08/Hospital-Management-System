<!DOCTYPE html>
<html>
<head>
    <title>Patient Details</title>
    <style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }

  .container {
    margin: 20px;
    margin-top: -675px;
    margin-left:260px;
  }

  table {
    width: 100%;
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

  tr td {
    color: black;
  }
  p{
    font-size: 30px;
    color:darkred ;
    font-weight: 600;
  }
</style>

</head>
<body>
    <?php
    include("../Dashboard/navigation.php");
    include("../Admin/sider_bar1.php");
    ?>
    <div class="container">
    <p>PATIENT DETAILS </p>
        <?php
        include("../Dashboard/db_connection.php");

        // Fetch data from the 'patient' table
        $sql = "SELECT * FROM patient_details";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Patient ID</th>
                        <th>Doctor Name</th>
                        <th>Patient Name</th>
                        <th>Dob</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Mobile No</th>
                        <th>Department</th>
                        <th>Email ID</th>
                        <th>Patient No</th>
                       
                    </tr>";

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["patient_id"] . "</td>
                    <td>" . $row["doctor_name"] . "</td>
                    <td>" . $row["patient_name"] . "</td>
                    <td>" . $row["dob"] . "</td>
                    <td>" . $row["gender"] . "</td>
                    <td>" . $row["patient_address"] . "</td>
                    <td>" . $row["mobile_no"] . "</td>
                    <td>" . $row["department"] . "</td>
                    <td>" . $row["email_id"] . "</td>
                    <td>" . $row["p_no"] . "</td>
                    
                
                </tr>";
                    
            }

            echo "</table>";
        } else {
            echo "No records found.";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
