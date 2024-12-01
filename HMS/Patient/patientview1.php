<!DOCTYPE html>
<html>
<head>
    <title>Patient Details</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 20px;
            margin-left :270px;
            margin-top:-500px;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color:darkblue;
            margin-left:240px;
            margin-top:-600px;
        }

        table {
            width: 50%;
            border-collapse: collapse;
           
          
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

        .edit-button, .delete-button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .delete-button {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <?php
    include("navigation.php");
    include("dcdash.php");
    ?>
    <div class="container">
        <h1>PATIENT DETAILS</h1>
        <?php
        include("db_connection.php");
        $uname=$_SESSION['uname'];

        // Fetch data from the 'patient' table
        $sql = "SELECT * FROM patient_details WHERE doctor_name='$uname'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                      
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
                   
                    <td>" . $row["doctor_name"] . "</td>
                    <td>" . $row["patient_name"] . "</td>
                    <td>" . $row["dob"] . "</td>
                    <td>" . $row["gender"] . "</td>
                    <td>" . $row["patient_address"] . "</td>
                    <td>" . $row["mobile_no"] . "</td>
                    <td>" . $row["department"] . "</td>
                    <td>" . $row["email_id"] . "</td>
                    <td>" . $row["p_no"] . "</td>
                   
               
                       
                            </form>
                        </div>
                    </td>
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
