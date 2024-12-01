<!DOCTYPE html>
<html lang="en">
  <head>
  <style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }

  #container {
    margin: 0px;
    margin-top: -675px;
    margin-left: 260px;
  }
  p{
    font-size: 30px;
    color:darkred ;
    font-weight: 600;
  }
  #main-content {
    width: 1200px;
    background-color: #f5f5f5;
    padding: 20px;
    border-radius: 10px;
  }

  .btn {
    display: inline-block;
    padding: 8px 12px;
    margin-bottom: 10px;
    font-size: 14px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    border-radius: 4px;
    color: #fff;
    background-color: darkred;
    border: 3px solid darkred;
    cursor: pointer;
  }

  table {
    max-width: 100%;
    border-collapse: collapse;
  }

  th,
  td {
    padding: 5px;
    text-align: left;
    border-bottom: 3px solid darkred;
  }

  th {
    background-color:darkred;
    color: #fff;
  }

  tbody tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  img {
    vertical-align: middle;
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



  <section id="container" >
    
      <!--main content start-->
      <p>DOCTOR DETAILS </p>
      <section id="main-content"><section class="wrapper">
      <div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
					  
					  <a href="../Admin/insertdoctor.php" class="btn btn-theme">Add New Doctor</a><br>
					  <br>
                          <section id="unseen">

<div align="center">
<table class="table">
  <thead>
    <tr>
      <th>Sl No</th>
      <th>Doctor Name</th>
      <th>Gender</th>
      <th>Date Of Birth</th>
      <th>Date Of Joining</th>
      <th>Qualification</th>
      <th>specialization</th>
      <th>Doctor Address</th>
      <th>Mobile Number</th>
      <th>Email Id</th>
      <th>Doctor Photo</th>
    
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include('../Dashboard/db_connection.php');
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
      <td>&nbsp;<img src="../upload/<?php echo $row['doctor_photo']; ?>" width="100" height="120"></td>
      
      <td>
        <a href="../Admin/Doctordetails_delete.php?doctor_id=<?php echo $row['doctor_id']; ?>">
          <img src="../img/delete.png" width="37" height="31" title="DELETE">
        </a>
      </td>
    </tr>
    <?php
    }
    ?>
  </tbody>
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
        