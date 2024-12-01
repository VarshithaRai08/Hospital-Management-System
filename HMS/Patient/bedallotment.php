<?php
session_start();
include('../Dashboard/db_connection.php');
?>



<!DOCTYPE html>
<html>
<head>
  <title>Bed Allotment</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
  body {
    font-family: Arial, sans-serif;
    margin: 20px;
  }

  h1 {
    text-align: center;
  }

  form {
    display: flex;
    flex-direction: column;
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    
    border-radius: 5px;

  }

  input[type="text"],
  input[type="number"],
  select {
    padding: 8px;
    margin-bottom: 10px;
    border: 3px solid #4CAF50;
    border-radius: 10px;
    width: 100%; /* Set the width to 100% */
    box-sizing: border-box; /* Include padding and border in the width calculation */
  }

  /* Update radio button styles */
  input[type="radio"] {
  padding: 5px;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    border: 2px solid gray; /* Update border color to green */
    border-radius: 75%;
    width: 10px;
    height: 10px;
    outline: none;
  }

  input[type="radio"]:checked {
    background-color: #4CAF50;
    /* Set background color to green when selected */
    border-radius: 75%;
  }

  label {
    font-size: 15px;
    
    font-weight: bold;
  }

  input[type="submit"] {
    padding: 10px;
    background-color: #4caf50;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
  }

  #room_numbers input[type="radio"] {
    margin-right: 10px;
  }

  #room_numbers label {
    margin-right: 20px;
  }

  input[type="submit"]:hover {
    background-color: #45a049;
  }

  td {
    font-size: 20px;
  }

  p {
    margin-top: 10px;
  }

  a {
    color: #1e88e5;
    text-decoration: none;
  }

  a:hover {
    text-decoration: underline;
  }


</style>

</head>
<body>
  <h1>Bed Allotment System</h1>

  <form method="post" action="../Patient/bedinsert.php">
    <table>
      <tr>
        <td>Patient Number</td>
        <td>
          <?php
          $p_no = $_SESSION['uname'];
          echo '<input name="patient_number" type="text" id="patient_number" value="' . $p_no . '" readonly>';
          ?>
        </td>
      </tr>
      <tr>
        <td>Patient Name:</td>
        <td>
          <?php
          $uname = $_SESSION['uname'];
          $sql = "SELECT * FROM inpatients WHERE patient_number= '$uname'";
          $res = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_array($res)) {
              echo '<input type="text" name="patient_name" value="' . $row['patient_name'] . '" readonly>';
          }
          ?>
        </td>
      </tr>
      <tr>
        <td>Doctor Name</td>
        <td>
          <?php
          $uname = $_SESSION['uname'];
          $sql = "SELECT doctor_name FROM doctor_appointments WHERE pidno = '$uname'";
          $res = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($res);
          $doctorName = isset($row['doctor_name']) ? $row['doctor_name'] : '';
          ?>
          <input type="text" id="doctor_name" name="doctor_name" value="<?php echo $doctorName; ?>" readonly>
        </td>
      </tr>
      <tr>
        <td>Patient Type:</td>
        <td>
          <input type="text" id="patient_type" name="patient_type" value="Inpatient" required readonly>
        </td>
      </tr>
      <tr>
        <td>Specialization </td>
        <td>
          <?php
          $uname = $_SESSION['uname'];
          $sql = "SELECT spe_name FROM doctor_appointments WHERE pidno = '$uname'";
          $res = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($res);
          $speName = isset($row['spe_name']) ? $row['spe_name'] : '';
          ?>
          <input type="text" id="spe_name" name="spe_name" value="<?php echo $speName; ?>" readonly>
        </td>
      </tr>
      <tr>
        <td>Room Type:</td>
        <td>
        <label for="room_type_general">
        <input type="radio" id="room_type_general" name="room_type" value="General Ward" required onclick="fetchRoomNumbers(); fetchRoomPrice();">
        General Ward
      </label>
      <label for="room_type_special">
        <input type="radio" id="room_type_special" name="room_type" value="Special Ward" required onclick="fetchRoomNumbers(); fetchRoomPrice();">
        Special Ward
      </label>
        </td>
      </tr>
      <tr>
        <td>Room Number:</td>
        <td>
          <div id="room_numbers"></div>
          <input type="hidden" id="room_number" name="room_number[]">
        </td>
      </tr>
      <tr>
      <tr>
        <td>Room Price:</td>
        <td>
          <input type="text" id="room_price" name="room_price" readonly>
        </td>
      </tr>
        <td></td>
        <td>
          <input type="submit" name="bed_allotment_submit" value="Book Bed">
        </td>
      </tr>
    </table>
  </form>

  <script>

    function fetchRoomNumbers() {
      var roomType = document.querySelector('input[name="room_type"]:checked').value;
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          var roomNumbersDiv = document.getElementById("room_numbers");
          roomNumbersDiv.innerHTML = xhr.responseText;

          // Add event listeners to room number radio buttons
          var roomNumberRadios = document.querySelectorAll('input[name="room_number"]');
          roomNumberRadios.forEach(function(radio) {
            radio.addEventListener('change', function() {
              var selectedRoomNumber = this.value;
              document.getElementById("room_number").value = selectedRoomNumber;
            });
          });
        }
      };
      xhr.open("GET", "get_room_number.php?room_type=" + roomType, true);
      xhr.send();
    }

    function fetchRoomPrice() {
      var roomType = document.querySelector('input[name="room_type"]:checked').value;
      
      // AJAX request to fetch the room price based on room type
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            var roomPriceInput = document.getElementById("room_price");
            roomPriceInput.value = xhr.responseText;
          } else {
            console.error("Error: " + xhr.status);
          }
        }
      };
      
      xhr.open("GET", "fetch_room_price.php?room_type=" + encodeURIComponent(roomType), true);
      xhr.send();
    }

    fetchRoomNumbers();
    fetchRoomPrice();
  </script>
</body>
</html>