<!DOCTYPE html>
<html lang="en">
  <head>
  <style>
  #container{
	  
	  margin-left:240px;
	  margin-top:-550px;
	  
  }
  #container p{
	  font-size:30px;
	  font-weight:900;
	  font-family:sans-serif;
	  margin-bottom:30px;
	  color:green;
  }
  .btn {
  display: inline-block;
  padding: 10px 20px;
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  text-decoration: none;
  background-color: #007bff;
  color: #fff;
  border-radius: 5px;
  border: none;
  cursor: pointer;
  margin-left:10px;
}

.btn:hover {
  background-color:red;
}

.btn:active {
  background-color:green;
}
h1{
	font-size:30px;
	font-family:sans-serif;
}
  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }
  
  table th, table td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }
  
  table th {
    background-color: #f5f5f5;
    font-weight: bold;
  }
  
  table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
  }
  
  table tbody tr:hover {
    background-color: #e0e0e0;
  }
  
  table img {
    max-width: 100px;
    max-height: 120px;
  }



  </style>
   </head>

  <body>
  <?php
  // include first file
  require('navigation.php');

  // include second file
  require('dcdash.php');
?>



  <section id="container" >
    
      <!--main content start-->
      <p>patient Details </p>
      <section id="main-content"><section class="wrapper">
      <div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
					  
					  <a href="patientForm.php" class="btn btn-theme">Add New </a><br>
					  <br>
                          <section id="unseen">

<div align="center">
<h1>Patient deatils </h1>
<table class="table">
  <thead>
    <tr>
      <th>Sl No</th>
      <th>Doctor Name</th>
      <th>patient Name</th>
      <th>Date Of Birth</th>
      <th>gender</th>
      <th>Patient Address</th>
      <th>Mobile Number</th>
      <th>PNO</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
 <!-- <tbody>
    <?php
    include('db_connection.php');
    $sl_no = 1;
    $sql = "SELECT * FROM doctor_details";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($res)) {
    ?>
    <tr>
      <td>&nbsp;<?php echo $sl_no++; ?></td>
      <td>&nbsp;<?php echo $row['doctor_name']; ?></td>
      <td>&nbsp;<?php echo $row['gender']; ?></td>
      <td>&nbsp;<?php echo $row['dob']; ?></td>
      <td>&nbsp;<?php echo $row['date_of_joining']; ?></td>
      <td>&nbsp;<?php echo $row['qualification_name']; ?></td>
      <td>&nbsp;<?php echo $row['spe_name']; ?></td>

      <td>&nbsp;<?php echo $row['doctor_address']; ?></td>
      <td>&nbsp;<?php echo $row['mobile_number']; ?></td>
      <td>&nbsp;<?php echo $row['email_id']; ?></td>
      <td>&nbsp;<img src="upload/<?php echo $row['doctor_photo']; ?>" width="100" height="120"></td>
      <td>
        <a href="Doctordetails_edit.php?doctor_id=<?php echo $row['doctor_id']; ?>">
          <img src="edit.png" width="37" height="31" title="EDIT">
        </a>
      </td>
      <td>
        <a href="Doctordetails_delete.php?doctor_id=<?php echo $row['doctor_id']; ?>">
          <img src="delete.png" width="37" height="31" title="DELETE">
        </a>
      </td>
    </tr>
    <?php
    }
    ?>
  </tbody>-->
</table>

 </section>
        </div><!-- /content-panel -->
      </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->

		</section><! --/wrapper -->
      </section>

 </section>
 </body>
 </html>
        