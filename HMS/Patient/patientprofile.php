<!DOCTYPE html>
<html lang="en">
<head>
<style>
  #container {
    margin-left: 300px;
    margin-top: -630px;
  }
  
  #container p {
    font-size: 30px;
    font-weight: 900;
    font-family: sans-serif;
    margin-bottom: 30px;
    color: green;
  }
  h2{
    text-align: center;
    font-size: 40px;
    font-weight: 600;
    color: green;
    margin-left: -60px;
  }
  
  table {
    font-weight: 600;
    border-collapse: collapse;
    width: 90%;
    border: 1px solid #ddd;
    font-size: 17px;
  }

  th, td {
    padding: 20px;
    text-align: left;
    border-bottom: 3px solid green;
    border-top: 3px solid green;
    border-left: 3px solid green;
    border-right: 3px solid green;
  }

  th {
    background-color: #f2f2f2;
  }

  tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  tr:nth-child(odd) {
    background-color: #fff;
  }
</style>

</head>

<body>
  <?php
  // include first file
  require('../Dashboard/navigation.php');

  // include second file
  require('pcpanel.php');
  ?>

  <section id="container">
    <h2>PATIENT PROFILE</h2>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <br>
              <section id="unseen">
                <div class="table-container">
                <?php
include('../Dashboard/db_connection.php');
$sl_no = 1;
$uname = $_SESSION['uname'];
$sql = "SELECT * FROM patient_details WHERE p_no='$uname'";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
  $row = mysqli_fetch_assoc($res);
  ?>
  <table>
    
  <tr>
      <td>Patient Number</td>
      <td><?php echo $row['p_no']; ?></td>
    </tr>
     
    
    <tr>
      <td>Patient Name</td>
      <td><?php echo $row['patient_name']; ?></td>
    </tr>
    <tr>
      <td>Date of Birth</td>
      <td><?php echo $row['dob']; ?></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><?php echo $row['gender']; ?></td>
    </tr>
    <tr>
      <td>Patient Address</td>
      <td><?php echo $row['patient_address']; ?></td>
    </tr>
    <tr>
      <td>Mobile Number</td>
      <td><?php echo $row['mobile_no']; ?></td>
    </tr>
    <tr>
      <td>Department</td>
      <td><?php echo $row['department']; ?></td>
    </tr>
    <tr>
      <td>Email ID</td>
      <td><?php echo $row['email_id']; ?></td>
    </tr>
   
  </table>
  <?php
} else {
  echo "No patient details found.";
}
?>
