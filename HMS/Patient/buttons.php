<!DOCTYPE html>
<html>
<head>
  <style>
    .button-container {
      display: flex;
      margin-left: 300px;
      margin-top:-450px;
    }

    .add-appointment-button {
      padding: 70px 200px;
      margin-top: -300px;
      margin-left: 20px;
      color: white;
      border: none;
      border-radius: 20px;
      border: 3px solid green;
      cursor: pointer;
      font-size: 16px;
      background-image: url("../img/appoint.jpg"); /* Replace with the path to your add appointment button image */
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }

    .view-appointment-button {
      padding: 70px 200px;
      margin-top: -300px;
      color: white;
      border: none;
      border-radius: 20px;
      border: 3px solid darkorange;
      cursor: pointer;
      font-size: 16px;
      background-image: url("../img/view1.jpg"); /* Replace with the path to your view appointment button image */
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      margin-left: 50px;
    }

    .add-appointment-button:hover {
      background-color: red;
    }

    .view-appointment-button:hover {
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
  <div class="button-container">
    <a href="../Patient/appointment.php">
      <button class="add-appointment-button"></button>
    </a>

    <a href="../Doctor/doctorappointmentview.php">
      <button class="view-appointment-button"></button>
    </a>
  </div>
</body>
</html>
