<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Doctor Details</title>
     <style>
      /* Insert the CSS code here */
      /* Global styles */
body {
  background-color: white;
  font-family: Arial, sans-serif;
  font-size: 16px;
  
}
h1{
  font-size: 20px;
  font-weight: 600px;
  color: darkred;
}

/* Section styles */
#container {
  width: 100%;
  margin-left:240px;
  margin-top:-675px;
  
  padding: 0 20px;
}

#main-content {
  background-color: #fff;
  padding: 40px 20px;
}

.wrapper {
  max-width: 900px;
}

/* Form styles */
form {
  margin-top: 40px;
}

label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}
input[type="text"],
input[type="email"],
select,
textarea {
    width: 70%;
    padding: 8px;
    margin-bottom: 10px;
    border-radius: 10px;
 
    font-size: 14px;
    border: 3px solid darkred;
}

select {
    height: 36px;
}

input[type="radio"] {
  margin-right: 10px;
}

select {
  height: 40px;
}

textarea {
  height: 100px;
}

input[type="submit"] {
  background-color: darkred;
  color: #fff;
  border: none;
  padding: 10px 20px;
  
  border-radius: 10px;
  font-size: 16px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #3aa03f;
}

/* Table styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
	
	
}

td {
    padding: 8px;
    border: 1px solid #ccc;
}

td:first-child {
    width: 250px;
    font-weight: bold;
    background-color: #f2f2f2;
    font-size: 14px;
}

h4 {
    margin-bottom: 20px;
    font-size: 20px;
    font-weight: bold;
}


.fa-angle-right {
  margin-right: 10px;
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

<section id="container">
    <section id="main-content">
      <section class="wrapper">
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
          	<h1><i class="fa fa-angle-right"></i><span class="style1">TREATMENT</span></h1>

            <form action="../Admin/Treatdb.php" id="formID" method="post" enctype="multipart/form-data" name="form1">
  <div align="center">
    <table width="463" border="0">
      <tr>
        <td width="222" height="60">Treatment Name</td>
        <td width="225"><input name="treatment_name" type="text" id="treatment_name"></td>
      </tr>
      <tr>
        <td height="80">Treatment Specialization</td>
        <td>
          <select name="spe_id" id="spe_id">
            <option value="">Specialization Name</option>
            <?php
            include('../Dashboard/db_connection.php');

            $sql = "SELECT * FROM specialization";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($res)) {
              ?>
              <option value="<?php echo $row['spe_id']; ?>"><?php echo $row['spe_name']; ?></option>
              <?php
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td height="80">Treatment Description</td>
        <td><textarea name="treatment_description" id="treatment_description"></textarea></td>
      </tr>
     
      <tr>
        <td height="80">Treatment Fees</td>
        <td><input name="treatment_fees" type="text" id="treatment_fees"></td>
      </tr>
     
      <tr>
        <td height="80" colspan="2">
          <div align="center">
            <input type="submit" name="Submit" class="btn btn-primary" value="Submit">
          </div>
        </td>
      </tr>
    </table>
  </div>
</form>
