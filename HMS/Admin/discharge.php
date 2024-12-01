<!DOCTYPE html>
<html>
<head>
  <title>Appointment Form</title>
  <style>
    h2 {
      margin-left: 260px;
      margin-top: -640px;
      font-weight: 600;
      font-size: 30px;
     
      color: darkred;
    }

    .centered-form {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 50vh;
      margin-right: 500px;
    }
    input[type="date"] {
        border: 3px solid darkred; /* Set border color to darkred */
        border-radius: 10px;
        padding: 10px;
    }


    .centered-form form {
      text-align: center;
      margin-left: 300px;
    }

    .centered-form label {
      font-size: 1.5em;
      margin-right: 100px;
      font-weight: 600;
    }

    .centered-form input[type="date"] {
      font-size: 1em;
      padding: 10px;
    }

    .centered-form input[type="submit"] {
      display: block;
      margin-top: 50px;
      background-color: darkred;
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
  require('../Admin/sider_bar1.php');
?>
<h2>DISCHARING DATE</h2>
<div class="centered-form">
  <form action="../Admin/dischargedate.php" method="post">
    <label for="discharge-date">Date:</label>
    <input type="date" id="discharge_date" name="discharge_date" required>

    <br>
    <input type="submit" value="Submit">
  </form>
</div>
</body>
<script>
  // Get the input date element
  var dischargeDateInput = document.getElementById("discharge_date");

  // Calculate the previous day, the current day, and one future day
  var currentDate = new Date();
  var previousDay = new Date();
  previousDay.setDate(currentDate.getDate() - 1);
  var futureDay = new Date();
  futureDay.setDate(currentDate.getDate() + 1);

  // Format the dates to match the input field format (YYYY-MM-DD)
  var formattedCurrentDate = currentDate.toISOString().split("T")[0];
  var formattedPreviousDay = previousDay.toISOString().split("T")[0];
  var formattedFutureDay = futureDay.toISOString().split("T")[0];

  // Set the min and max attributes of the input date field
  dischargeDateInput.setAttribute("min", formattedPreviousDay);
  dischargeDateInput.setAttribute("max", formattedFutureDay);

  // Set the initial value to the current date
  dischargeDateInput.value = formattedCurrentDate;
</script>


