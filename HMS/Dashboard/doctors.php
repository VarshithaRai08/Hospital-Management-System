<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Doctors</title>
    <!-- Your metatag.php content here -->
  </head>
  <style>/* Add your desired styles here */

body {
  font-family: Arial, sans-serif;

}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 15px;
}

.hero-wrap {
  position: relative;
  height: 300px;
  background-size: cover;
  background-position: center center;
  background-repeat:no-repeat;
}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.6);
}

.hero-wrap .breadcrumbs {
  color: #fff;
  font-size: 18px;
  margin: 0;
  padding: 15px;
}
/* center the h1 and span elements */
.hero-wrap .ftco-animate {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;


}
.hero-wrap .ftco-animate h1{
  color:white;
  margin-top: 150px; /* Adjust the margin-top value as needed */
  font-size:40px;
  font-weight: 900;
}

.hero-wrap .ftco-animate span {
  color: blue;
}


.ftco-section {
  padding: 50px 0;
}
.course {
  margin-bottom: 50px;
  width: calc(20% - 20px); /* Adjust the width as needed */
  display: inline-block;
  vertical-align: top;
  box-sizing: border-box;
  padding: 10px;
  text-align: center;
  margin-right:15px;
}


.img {
  width: 100%;
  height: auto;
  max-height: 200px; /* Adjust the maximum height as needed */
  background-size: cover;
  background-position: center center;
}


.course .img {
  width: 100%;
  height: 200px;
  background-size: cover;
  background-position: center center;
}

.course .text {
  padding: 20px;
}

.course h3 {
  margin-top: 0;
  margin-bottom: 10px;
  font-size: 24px;
  font-weight: bold;
  color: darkblue;
}
.course h4{
  margin-top:3px;
  font-size: 22px;
  font-weight: bold;
  color: red;
}
.course h6{
  font-size: 15px;
 margin-top: -20px;
  font-weight: bold;
  color: red;
}

.course p {
  margin: 0;
  font-size: 16px;
}

.text.bg-light {
  background-color: #f8f9fa;
}
h1.mb-2.bread {
    color: paleyellow;
}


/* Additional styles you may need */

/* Add your additional styles here */

</style>
  <body>

<?php include('nav.php'); ?>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('../img/doctors.png');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">OUR DOCTORS</h1>
                
            </div>
        </div>
    </div>
</section>

    
    <section class="ftco-section">
      <div class="container">
        <div class="row">
        <?php
$sn = 1;
include('db_connection.php');
$sql = "SELECT * FROM doctor_details";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($res)) {
?>
<div class="col-md-6 course d-lg-flex">
  <div class="img" style="background-image: url(../upload/<?php echo $row['doctor_photo']; ?>)"></div>
  <div class="text bg-light p-4">
    <h3><?php echo $row['doctor_name']; ?></h3>
    <p class="subheading"> <?php echo $row['email_id']; ?></p>
    <p class="sub"><span>Contact No:</span><?php echo $row['mobile_number']; ?></p>
    <?php
    $doctor_id = $row['doctor_id'];
    $spe_query = "SELECT specialization.spe_name
                  FROM doctor_details
                  INNER JOIN specialization ON doctor_details.spe_name = specialization.spe_name
                  WHERE doctor_details.doctor_id = '$doctor_id'";
    $spe_result = mysqli_query($conn, $spe_query);
    
    while ($spe_row = mysqli_fetch_assoc($spe_result)) {
      $specialization_name = $spe_row['spe_name'];
      ?>
      <p>Specialization: <?php echo $specialization_name; ?></p>
      <?php
    }

    if ($row['status'] == 'Available') {
      // Do nothing if status is "Available"
    } else {
      ?>
      <h4><?php echo $row['status']; ?></h4>
      <h6>Until <?php echo $row['date']; ?></h6>
      <?php
    }
    ?>
  </div>
</div>
<?php
}
?>

  </div>
</div>


       
        </div>
      </div>
    </section>

    <?php include('footer.php'); ?>
  </body>
</html>
