<!DOCTYPE html>
<html>
<head>
  <title>Appointment Form</title>
  <style>
    h2 {
      margin-left: 300px;
      margin-top: -530px;
      font-weight: 700;
      font-size: 30px;
     
      color: green;
    }

    .centered-form {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 50vh;
      margin-right: 500px;
    }
    input[type="date"] {
        border: 3px solid #4CAF50; /* Set border color to green */
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
      background-color: #4CAF50;
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
  require('../Patient/pcpanel.php');
?>
<h2>Make Appointment</h2>
<div class="centered-form">
  <form action="appointment_form.php" method="post">
    <label for="appointment-date">Appointment Date:</label>
    <input type="date" id="appointment_date" name="appointment_date" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+10 days')); ?>" required>
    <br>
    <input type="submit" value="Submit">
  </form>
</div>
</body>
