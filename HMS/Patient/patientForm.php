
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Doctor Details</title>
     <style>
      /* Insert the CSS code here */
      /* Global styles */
body {
  background-color: #f2f2f2;
  font-family: Arial, sans-serif;
  font-size: 16px;
  
}

/* Section styles */
#container {
  width: 100%;
  margin-left:240px;
  margin-top:-560px;
  
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
    border-radius: 4px;
    border: 1px solid #ccc;
    font-size: 14px;
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
  background-color: #008CBA;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 4px;
  font-size: 16px;
  cursor: pointer;
}
input[type="reset"]{
  background-color: red;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 4px;
  font-size: 16px;
  cursor: pointer;
}
input[type="submit"]:hover ,{
  background-color: #3aa03f;
}
input[type="reset"]:hover {
    background-color: lightblue;
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
  require('navigation.php');

  // include second file
  require('dcdash.php');
?>


  <section id="container">
    <section id="main-content">
      <section class="wrapper">
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4><i class="fa fa-angle-right"></i>PATIENT DETAILS</h4>
              <?php
	  include('db_connection.php');

	  $sql="select max(patient_id) as pid from patient_details";
	  $res=mysqli_query($conn,$sql);
	  $row=mysqli_fetch_array($res);
	  
	  $pid=$row['pid']+1;
?>

              <form action="doctordb.php" method="post" enctype="multipart/form-data" name="form1">
			  
<table>
                <tr>
                    <td width="277">Doctor</td>
                    <td width="509">
                    <select name="doctor_id" id="doctor_id" class="form-control form-control form-control form-control validate[required]">
         
         <?php
     $uname=$_SESSION['uname'];
       $sql="select * from doctor_details where email_id='$uname'";
       $res=mysqli_query($conn,$sql);
       while($row=mysqli_fetch_array($res))
       {
       ?>
       <option value="<?php echo $row['doctor_id'];?>"><?php echo $row['doctor_name'];?></option>
              <?php
          }
          ?>
           </select></td>
         </tr>
                  <tr>
                  <td>patient Name </td>
        <td><input name="patient_name" type="text" class="form-control form-control form-control validate[required],custom[onlyLetter]" id="patient_name"></td>
      </tr>
                    <td>Gender</td>
                    <td>
                      <input name="gender" type="radio" value="male">Male
                      <input name="gender" type="radio" value="female">Female
                      <input name="gender" type="radio" value="orthers">others

                    </td>
                  </tr>
                  <tr>
                    <td>Date Of Birth</td>
                    <td>
                      <input name="dob" type="date" id="dob">
                    </td>
                  </tr>
                  <tr>
              
    <td>patient Address</td>
    <td>
      <textarea name="patient_address" id="patient_address"></textarea>
    </td>
  </tr>
  <tr>
  <tr>
    <td>Mobile Number</td>
    <td>
      <input name="m0bile_no" type="text" id="mobile_no">
    </td>
  </tr>
  <tr>
    <td>Email Id</td>
    <td>
      <input name="email_id" type="email" id="email_id">
    </td>
  </tr>
  <tr>
        <td height="79">Patient Number </td>
        <td><input name="patient_number" readonly="" value="PNO<?php echo $pid;?>" type="text" class="form-control form-control form-control validate[required]" id="patient_number"></td>
      </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
      <input type="submit" name="Submit" value="Submit">
      <input type="reset" name="Reset" value="Reset">

    </td>
  </tr>
</table>
</form>
</div>
</div>
</div>
</section>

</section>

<!--main content end-->
</section>

</body>
</html>
