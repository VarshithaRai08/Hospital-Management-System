<!DOCTYPE html>
<html>
<head>
  <title>Select Specialization</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }

    h2 {
      font-size: 30px;
      color: green;
      margin-bottom:50px;
    }

    select,
    input[type="text"]
     {
        width: 100%;
        padding: 10px;
        border: 3px solid #4CAF50; /* Set border color to green */
        border-radius: 10px;
        box-sizing: border-box;
        font-size: 16px;
    }

    form {
      margin-top: -550px;
      margin-left:300px;
    }

    label {
      font-weight: bold;
      font-size:25px;
    }

    select {
    padding: 16px;
    font-size: 16px;
    border: 3px solid #4CAF50; /* Set border color to green */
    border-radius: 10px;
    width: 250px;
  }

    input[type="submit"] {
        margin-top:100px;
      padding: 10px 20px;
      font-size: 16px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
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
 

 <form action="../Patient/doctor_result.php" method="post">

  <h2>About Doctors</h2>
    <label for="spe_id">Select Specialization:</label>
    <select name="spe_id" id="spe_id">
      <option value="">Specialization Name</option>
      <?php
        include('../Dashboard/db_connection.php');

        $sql = "SELECT * FROM specialization";
        $res = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($res)) {
          echo '<option value="' . $row['spe_id'] . '">' . $row['spe_name'] . '</option>';
        }
      ?>
    </select>
    <br>
    <input type="submit" value="Submit">
  </form>

</body>
</html>
