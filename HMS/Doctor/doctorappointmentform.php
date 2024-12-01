<!DOCTYPE html>
<html>
<head>
    <title>Appointment Form</title>
    <style type="text/css">
        /* CSS styles */

        /* Add your custom styles here */
        label,
        input[type="radio"] {
            position: relative;
            display: inline-block;
            margin-right: 20px; /* Add spacing between buttons */
        }
        input[type="radio"] {
            z-index: 12;
            display: none;
        }
        #container {
            margin-left: 230px;
            margin-top: -520px;
        }
        label {
            z-index: 6;
            padding: 15px;
            padding-left: 45px;
            margin-left: -35px;
            border-radius: 5px;
            font-size: 20px;
        }
        input[type="radio"]:checked + label {
            background-color: #66FF99;
            box-sizing: border-box;
        }
        .column {
            float: left;
            width: 15%; /* Display four time slots per row */
            padding: 5px;
        }
        /* Clearfix (clear floats) */
        .row::after {
            content: "";
            clear: both;
            display: table;
        }
        /* Custom styles for select and input */
        select,
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 3px solid darkblue;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        
    input[type="date"] {
      
      padding: 10px;
      border: 3px solid darkblue;
      border-radius: 10px;
    }
        /* Styles for button */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #45a049;
        }
        /* Styles for heading */
        h4 {
            font-size: 24px;
        }
        /* Styles for form */
        .row{
            margin-top:-520px;
            
            margin-left: 290px; /* Add the desired left margin */
        }
        td {
            font-size: 26px;
        }
    </style>
</head>
<body>
    <?php
      // include first file
      require('../Dashboard/navigation.php');

      // include second file
      require('../Doctor/dcdash.php');
    ?>
       <div class="row">
    <form action="your_action.php" method="POST">
    <table>
    
    <?php
include('../Dashboard/db_connection.php');

// Assuming you have a session mechanism in place, retrieve the logged-in user's information
// Replace the session variable name and the column names in the query with the actual ones you're using

$uname = $_SESSION['uname']; // Replace 'uname' with the actual session variable name

if (isset($_POST['appointment_date'])) {
    $appointment_date = $_POST['appointment_date'];
} else {
    // Set a default value or handle the case when the appointment_date is not set
    $appointment_date = null;
}

$sql = "SELECT * FROM time_slot";
$res = mysqli_query($conn, $sql);

?>

<table>
    <tr>
        <td>Appointment Date</td>
        <td>
            <input name="appointment_date" value="<?php echo isset($_POST['appointment_date']) ? $_POST['appointment_date'] : ''; ?>" readonly class="form-control" type="date" id="appointment_date">
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <h3>Sort by Time:</h3>
            <?php
            while ($row = mysqli_fetch_array($res)) {
                $time = $row['time_slot']; // Modify the column name here

                // Check if the time slot is already booked by the logged-in doctor
                $bookedSql = "SELECT * FROM doctor_appointments WHERE time_slot = '$time' AND doctor_name = '$uname' AND appointment_date = '$appointment_date'";
                $bookedRes = mysqli_query($conn, $bookedSql);
                $isBooked = mysqli_num_rows($bookedRes) > 0;

                // Set the background color based on the booking status
                $backgroundColor = $isBooked ? 'background-color: red;' : '';

                ?>
                <div class="column">
                    <label style="<?php echo $backgroundColor; ?>">
                        <input type="radio" name="time_slot" value="<?php echo $time; ?>" required onclick="changeBackgroundColor(this)">
                        <?php echo $time; ?>
                    </label>
                </div>
                <?php
            }
            ?>
        </td>
    </tr>
</table>

        </form>
                        </div>
        
    </body>
    </html>
