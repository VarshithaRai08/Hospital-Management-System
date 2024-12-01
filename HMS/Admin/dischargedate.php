<!DOCTYPE html>
<html>
<head>
    <title>discharge list</title>
    <style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }

  .row{
    margin: 20px;
    margin-top: -600px;
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

</head>
<body>
    <?php
        // include first file
        require('../Dashboard/navigation.php');

        // include second file
        require('../Admin/sider_bar1.php');
    ?>
    <div class="row">
        <table>
        <?php
        include('../Dashboard/db_connection.php');

        if (isset($_POST['discharge_date'])) {
            $discharge_date = $_POST['discharge_date'];
        } else {
            // Set a default value or handle the case when the discharge_date is not set
            $discharge_date = null;
        }

        // Query the database to retrieve patients with matching discharge_date
        $query = "SELECT * FROM inpatients WHERE discharge_date = '$discharge_date'";
        $patient_result = mysqli_query($conn, $query);

        // Display patient records in a table
        if ($patient_result && mysqli_num_rows($patient_result) > 0) {
            echo "<table>";
            echo "<tr>
                <th>Patient Number</th>
                <th>Patient Name</th>
                <th>Doctor Name</th>
           
            </tr>";

            while ($row = mysqli_fetch_assoc($patient_result)) {
                $patient_number = $row['patient_number'];
                $patient_name = $row['patient_name'];
                $doctor_name = $row['doctor_name'];

                echo "<tr>";
                echo "<td>$patient_number</td>";
                echo "<td>$patient_name</td>";
                echo "<td>$doctor_name</td>";
             
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No patients found with the discharge date matching the selected date.";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
