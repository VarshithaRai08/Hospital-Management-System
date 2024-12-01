<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Treatment</title>
  <style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }
  p{
    font-size: 30px;
    color:darkred ;
    font-weight: 600;
  }

  #container {
    margin: 20px;
    margin-top: -675px;
    margin-left:260px;
  }

  #main-content {
    background-color: #f5f5f5;
    padding: 20px;
    border-radius: 5px;
    width: 90%;
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
    border: 1px solid red;
    cursor: pointer;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  th,
  td {
    padding: 8px;
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
      <p>TREATMENT DETAILS</p>
      <section id="main-content"><section class="wrapper">
      <div class="row mt">
            <div class="col-lg-12">
                      <div class="content-panel">
            
            <a href="../Admin/TreatmentForm.php" class="btn btn-theme">Add New </a><br>
            <br>
                          <section id="unseen">

<div align="center">
<table class="table">
      <thead>
     <tr>
      <th >sl no </th>
      <th >Treatment Name </th>
      <th>Treatment Specialization</th>
      <th >Treatment Description </th>
 
      <th >Treatment Fees </th>
      
      <th >Delete</th>
    </tr>
      </thead>
     <tbody>
      <?php
	  include('../Dashboard/db_connection.php');
	  $sl_no=1;
	  $sql="select * from treatment_details";
	  $res=mysqli_query($conn,$sql);
	  while($row=mysqli_fetch_array($res))
	  {
	  ?>
    <tr>
      <td>&nbsp;<?php echo $sl_no++;?></td>
      <td>&nbsp;<?php echo $row['treatment_name'];?></td>
      <td>&nbsp;<?php echo $row['treatment_sp'];?></td>
      

      <td>&nbsp;<?php echo $row['treatment_description'];?></td>
      
      <td>&nbsp;<?php echo $row['treatment_fees'];?></td>
      
      <td>
  <a href="../Admin/Treatment_delete.php?treatment_id=<?php echo $row['treatment_id'];?>">
    <img src="../img/delete.png" width="37" height="31" title="DELETE">
  </a>
</td>

    </tr>
    </tr>
	<?php
	}
	?>
      </tbody>
    </table>
  </div>
</section>
          </div><!-- /content-panel -->
        </div><!-- /col-lg-4 -->
      </div><!-- /row -->
    </section><!-- /wrapper -->
  </section><!-- /main-content -->
</section><!-- /container -->

</body>
</html>