<!DOCTYPE html>
<html>
<head>
  <title>Appointment Form</title>
  <style>
    h2 {
      margin-left: 260px;
      margin-top: -530px;
      color: darkblue;
    }

    .centered-form {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 50vh;
      margin-right: 500px;
    }

    .centered-form form {
      text-align: center;
      margin-left: 300px;
    }

    .centered-form label {
      font-size: 1.5em;
      margin-right: 100px;
    }

    .centered-form input[type="date"] {
      font-size: 1em;
      padding: 10px;
      border: 3px solid darkblue;
      border-radius: 10px;
    }

    .centered-form input[type="submit"] {
      display: block;
      margin-top: 50px;
      background-color: darkblue;
      color: white;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
    }

    .centered-form input[type="submit"]:hover {
      background-color: red;
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
<h2>DOCTOR APPOINTMENT HISTORY</h2>
<div class="centered-form">
  <form action="doctorappointmentform.php" method="post">
    <label for="appointment-date">Appointment Date:</label>
    <input type="date" id="appointment_date" name="appointment_date" required>
    <br>
    <input type="submit" value="Submit">
  </form>
</div>

<script>
  // Get the current date
  var currentDate = new Date();

  // Calculate the maximum selectable date (10 days from the current date)
  var maxDate = new Date();
  maxDate.setDate(currentDate.getDate() + 10);

  // Format the maximum date as YYYY-MM-DD for the date input
  var formattedMaxDate = maxDate.toISOString().split("T")[0];

  // Set the maximum selectable date for the date input
  document.getElementById("appointment_date").setAttribute("max", formattedMaxDate);
</script>

</body>
</html>
