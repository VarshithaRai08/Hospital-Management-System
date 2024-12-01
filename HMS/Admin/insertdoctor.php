<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Doctor Details</title>
     <style>
      /* Insert the CSS code here */
      /* Global styles */
    
  /* Global styles */
  body {
    font-family: Arial, sans-serif;
    font-size: 16px;
  }

  /* Section styles */
  #container {
    width: 100%;
    margin-left: 240px;
    margin-top: -675px;
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
    border: 3px solid darkred;
    font-size: 14px;
  }

  select {
    height: 36px;
    border: 3px solid darkred;
  }

  input[type="radio"] {
    margin-right: 10px;
    border: 3px solid darkred;
  }

  input[type="date"] {
    padding: 8px;
    margin-bottom: 10px;
    border-radius: 10px;
    border: 3px solid darkred;
    font-size: 14px;
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
    width: 250px;
    font-weight: bold;
    background-color: #f2f2f2;
    font-size: 14px;
  }

  h4 {
    margin-bottom: 20px;
    font-size: 20px;
    font-weight: bold;
    color:darkred ;
  }

  .fa-angle-right {
    margin-right: 10px;
  }

  .select-wrapper select {
    height: 100px;
    font-size: 14px;
    padding: 10px;
    border: 3px solid darkred;
    border-radius: 10px;
  }

  /* Custom radio button styles */
  .radio-label {
    display: inline-block;
    margin-right: 10px;
    position: relative;
    padding-left: 25px;
    cursor: pointer;
  }

  .radio-label input[type="radio"] {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    border: 3px solid darkred;
    
  }

  .radio-label span {
    position: absolute;
    top: 3px;
    left: 0;
    height: 18px;
    width: 18px;
    border: 3px solid darkred;
    border-radius: 50%;
  }

  .radio-label span:after {
    content: "";
    position: absolute;
    display: none;
  }

  .radio-label input[type="radio"]:checked + span:after {
    display: block;
    border-radius: 50%;
    background-color: darkred;
    height: 10px;
    width: 10px;
    top: 4px;
    left: 4px;
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
              <h4><i class="fa fa-angle-right"></i>DOCTOR DETAILS</h4>

              <form action="../Admin/doctordb.php" method="post" enctype="multipart/form-data" name="form1"onsubmit="return validateForm()">
			  
<table>
                <tr>
                    <td width="277">Doctor Name</td>
                    <td width="509">
                      <input name="d_name" type="text" id="d_name" required>
                    </td>
                  </tr>
                  <tr>
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
                      <input name="dob" type="date" id="dob" required>
                    </td>
                  </tr>
                  <tr>
                    <td>Date Of Joining</td>
                    <td>
                      <input name="date_of_joining" value="<?php echo date('Y-m-d'); ?>" readonly="" type="date" id="date_of_joining" required>
                    
                    </td>
                  </tr>
                  <tr>
                  <td>Qualification</td>
<td>
  <div class="select-wrapper">
    <select name="qualification_id[]" id="qualification_id" multiple required>
      <option value="" disabled>Select Qualification</option>
      <?php
      include('../Dashboard/db_connection.php');

      $sql = "SELECT * FROM qualification";
      $res = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_array($res)) {
        ?>
        <option value="<?php echo $row['qualification_id']; ?>"><?php echo $row['qualification_name']; ?></option>
        <?php
      }
      ?>
    </select>
    <div class="arrow"></div>
  </div>
</td>

  <tr>
    <td>Specialization</td>
    <td>
      <select name="spe_id" id="spe_id" required>
      <option value="" disabled selected>Specialization Name</option>
              <?php
	  include('../Dashboard/db_connection.php');
	
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
      <textarea name="d_address" id="d_address" required></textarea>
    </td>
  </tr>
  <tr>
  <tr>
    <td>Mobile Number</td>
    <td>
    <input name="m_no" type="text" id="m_no" pattern="[0-9]+" required>
    </td>
  </tr>
  <tr>
    <td>Email Id</td>
    <td>
      <input name="email_id" type="email" id="email_id" required>
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
<script>
  function validateForm() {
  // Validation for Doctor Name
  var doctorName = document.getElementById("d_name").value;
  if (doctorName.trim() == "") {
    alert("Doctor Name is required.");
    return false;
  }

  // Check if the doctor name contains any non-alphabetic characters
  var regex = /^[A-Za-z\s]+$/;
if (!regex.test(doctorName)) {
  alert("Doctor Name should only contain alphabetic characters.");
  return false;
}

    // Validation for Gender
    var genderOptions = document.getElementsByName("gender");
    var genderSelected = false;
    for (var i = 0; i < genderOptions.length; i++) {
      if (genderOptions[i].checked) {
        genderSelected = true;
        break;
      }
    }
    if (!genderSelected) {
      alert("Gender is required.");
      return false;
    }



    // Validation for Mobile Number
    var mobileNumber = document.getElementById("m_no").value;
    if (mobileNumber.length !== 10 || isNaN(mobileNumber)) {
      alert("Mobile Number should be a 10-digit number.");
      return false;
    }

    // Add more validations for other fields if needed

    return true; // Submit the form if all validations pass
  }
</script>


</body>
</html>
