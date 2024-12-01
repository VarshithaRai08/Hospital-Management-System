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
  margin: 0 auto;
 
}

#main-content {
  background-color: #fff;

}

.wrapper {
  max-width: 500px;
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
    width: 150px;
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

  <section id="container">
    <section id="main-content">
      <section class="wrapper">
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4><i class="fa fa-angle-right"></i> Doctor Details</h4>

              <form action="Doctordetails_inserted.php" method="post" enctype="multipart/form-data" name="form1">

                <table width="702" height="752" border="0" align="center">
                  <tr>
                    <td width="277">Doctor Name</td>
                    <td width="509">
                      <input name="d_name" type="text" id="d_name">
                    </td>
                  </tr>
                  <tr>
                    <td>Gender</td>
                    <td>
                      <input name="gender" type="radio" value="male">Male
                      <input name="gender" type="radio" value="female">Female
                    </td>
                  </tr>
                  <tr>
                    <td>Date Of Birth</td>
                    <td>
                      <input name="dob" type="date" id="dob">
                    </td>
                  </tr>
                  <tr>
                    <td>Date Of Joining</td>
                    <td>
                      <input name="date_of_joining" type="date" id="date_of_joining">
                    </td>
                  </tr>
                  <tr>
                    <td>Hospital Name</td>
                    <td>
                      <select name="hospital_id" id="hospital_id">
                        <option value="">Select Hospital</option>
                        <?php
                        include('../db_connect/db_connection.php');
                        $sql="select * from hospital_details";
                        $res=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($res))
                        {
                        ?>
                        <option value="<?php echo $row['hospital_id'];?>"><?php echo $row['hospital_name'];?></option>
                        <?php
                        }
                        ?>
                      </select>
                      </tr>
  </tr>
  <tr>
    <td>Qualification </td>
    <td>
      <select name="qualification_id" id="qualification_id">
        <option value="">Select Qualification</option>
        <?php
        include('db_connection.php');
        
        $sql="select * from qualification";
        $res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($res))
        {
        ?>
        <option value="<?php echo $row['qualification_id'];?>"><?php echo $row['qualification_name'];?></option>
        <?php
        }
        ?>
      </select>
    </td>
  </tr>
  <tr>
    <td>Specialization</td>
    <td>
      <select name="spe_id" id="spe_id">
        <option value="">Specialization Name</option>
        <?php
        include('../db_connect/db_connection.php');
        
        $sql="select * from specialization";
        $res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($res))
        {
        ?>
        <option value="<?php echo $row['spe_id'];?>"><?php echo $row['spe_name'];?></option>
        <?php
        }
        ?>
      </select>
    </td>
  </tr>
  <tr>
    <td>Doctor Address</td>
    <td>
      <textarea name="d_address" id="d_address"></textarea>
    </td>
  </tr>
  <tr>
    <td>Doctor Location</td>
    <td>
      <input name="d_location" type="text" id="d_location">
    </td>
  </tr>
  <tr>
    <td>Mobile Number</td>
    <td>
      <input name="m_no" type="text" id="m_no">
    </td>
  </tr>
  <tr>
    <td>Email Id</td>
    <td>
      <input name="email_id" type="email" id="email_id">
    </td>
  </tr>
  <tr>
    <td>Doctor Photo</td>
    <td>
      <input name="d_photo" type="file" id="d_photo">
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
      <input type="submit" name="Submit" value="Submit">
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
