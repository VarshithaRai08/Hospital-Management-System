
<!DOCTYPE html>
<html>
  <head>
    <title>Navigation Bar with Logo and Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
	
	.hs-carousel {
  position: relative;
  height: 500px;
  overflow: hidden;
}

.slide {
  position: relative;
  height: 100%;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
}

.cntr {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.slider-txt {
  text-align:left;
  color: white;
}

.txt-cntr {
  padding: 100px;
}

.hs-heading h1{
  color:white;
  font-size:75px;
  font-weight: 900;
  font-family: sans-serif;
  display: inline-block;
  margin-bottom:40px;
  margin-left:-280px;

  
}

.btn-secondary {
  background-color: #2E8B57;;
  color: #fff;
  border-radius:50px;
  padding: 15px 30px;
  text-decoration: none;
  transition: background-color 0.3s ease-in-out;
}
.btn-secondary:hover {
  background-color: red;
  color:white;
}


    </style>
  </head>
  <body>
  <?php include('nav.php'); ?>
   <section class="hs-carousel">
  <div class="slide" style="background-image:url(../img/bg.jpg);">
    <div class="overlay"></div>
    <div class="cntr">
     <div class="row" data-scrllax-parent="true">
  <span class="hs-heading"><h1>Abhaya Hospital Management</h1></span>
  <p><a href="about.php" class="btn-secondary">Read More</a></p>
</div>

    </div>
  </div>
</section>
<?php include('footer.php');
 ?>

  </body>
</html>
