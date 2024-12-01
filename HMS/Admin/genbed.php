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
            margin-top: -625px;
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
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
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
            margin-top:-675px;
            
            margin-left: 290px; /* Add the desired left margin */
        }
        td {
            font-size: 26px;
        }
        h3{
            color: darkred;
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
    <form action="your_action.php" method="POST">
    <table>
    <?php
include('../Dashboard/db_connection.php');

$sql = "SELECT * FROM room WHERE room_number LIKE 'GB%'";
$res = mysqli_query($conn, $sql);

?>

<table>
    <tr>
        <td colspan="2">
            <h3>BOOKED AND AVAILABLE ROOMS FOR GENERAL WARD</h3>
            <?php
            while ($row = mysqli_fetch_array($res)) {
                $room_number = $row['room_number']; // Modify the column name here

                // Check if the room is already booked
                $bookedSql = "SELECT * FROM bed_allotment WHERE room_number = '$room_number' AND status='Booked'";
                $bookedRes = mysqli_query($conn, $bookedSql);
                $isBooked = mysqli_num_rows($bookedRes) > 0;

                // Set the background color based on the booking status
                $backgroundColor = $isBooked ? 'background-color: red;' : '';

                ?>
                <div class="column">
                    <label style="<?php echo $backgroundColor; ?>">
                        <input type="radio" name="room_number" value="<?php echo $room_number; ?>" required onclick="changeBackgroundColor(this)">
                        <?php echo $room_number; ?>
                    </label>
                </div>
                <?php
            }
            ?>
        </td>
    </tr>
</table>