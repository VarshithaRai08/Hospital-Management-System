<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<style>
		.container {
			display: flex;
			justify-content: space-between;
			margin: 0;
			padding: 0;
		}

		.circle-container {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-top: -95px;
		}

		.circle-box {
			width: 130px;
			height: 130px;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			border-radius: 50%;
			border: 7px solid;
			overflow: hidden;
			position: relative;
			margin-bottom: -50px;
			z-index: 3;
		}

		.blue {
			border-color: #2196f3;
			margin-
		}

		.green {
			border-color: #4caf50;
		}

		.orange {
			border-color: #ff9800;
		}

		.icon {
			font-size: 50px;
			color: #000;
			  display: inline-block;
  width: 130px;
  height: 130px;
  cursor: pointer;
background-color: white;
  border-radius: 50%;
  font-size: 32px;
  color: black;
  text-align: center;
  line-height: 60px;
  margin-top: 35px;
		}

		.rectangular-box {
			background-color: #fff;
			padding: 10px;
			top:85px;
			height: 400px;
			width: 500px;
			text-align: center;
			position: relative;
			z-index: 1;
			margin-bottom: 40px;
		}

		.blue-box {
			background-color: #2196f3;
			color: #fff;
		}

		.green-box {
			background-color: #4caf50;
			color: #fff;
		}

		.orange-box {
			background-color: #ff9800;
			color: #fff;
		}

		.text {
			font-family: serif;
			margin-top:45px;
			font-size: 30px;
			font-weight: bold;
			text-align: center;
			color:black;
		}
		p{
			font-size: 26px;
			font-family:serif;
			text-align: justify;
			margin-left: 12px;
			margin-right:12px;
		}


.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 15px;
}

.hero-wrap {
  position: relative;
  height: 400px;
  background-size: cover;
  background-position: center center;
  background-repeat:no-repeat;
  margin-bottom: 20px;
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
  color: #249fad;
  font-size: 18px;
  margin: 0;
  padding: 15px;
  margin-left: 20px;;
}
/* center the h1 and span elements */
.hero-wrap .ftco-animate {
  display: flex;
  flex-direction: column;
  justify-content: left;
  align-items: left;


}
.hero-wrap .ftco-animate h1 {
  color: #249fad;
  margin-top: 80px; /* Adjust the margin-top value as needed */
  font-size: 70px;
  font-weight: 900;
  margin-left: 40px;

  text-shadow: 4px 4px 8px white; /* Add text shadow */
}




</style>
</head>
<body>
	<?php include('nav.php'); ?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('../img/about.jpg');">
<div class="overlay"></div>
<div class="container">
    <div class="row">
        <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">ABOUT US</h1>
            
        </div>
    </div>
</div>
</section>

	<div class="container">
		<div class="rectangular-box blue-box">
			<div class="circle-container">
				<div class="circle-box blue">
					<div class="icon"><i class="fa-solid fa-eye fa-fade fa-xl" style="color:#2196f3;"></i></div>
				</div>
			</div>
			<div class="text">VISION</div>
			<p>To build a universally respected medical institution</p>
		</div>

		<div class="rectangular-box green-box">
			<div class="circle-container">
				<div class="circle-box green">
					<div class="icon"><i class="fa-solid fa-rocket fa-fade fa-xl" style="color: #4caf50;"></i></div>
				</div>
			</div>
			<div class="text">MISSION</div>
			<p>To bring hope to patients through empathetic healthcare and our commitment towards medical excellence.</p>
		</div>

		<div class="rectangular-box orange-box">
			<div class="circle-container">
				<div class="circle-box orange">
					<div class="icon"><i class="fa-solid fa-hand-holding-medical fa-fade fa-xl" style="color: #ff9800;"></i></div>
				</div>
			</div>
			<div class="text">VALUES</div>
			<p><i class="fa-solid fa-circle fa-2xs" style="color: #000714;"></i> We empathise with every single patient and their every need, fearand hope.We understand their pain and we do our very best to alleviate it.</p>
			<p><i class="fa-solid fa-circle fa-2xs" style="color: #000714;"></i> Our first and only duty is to the patient's well-being, over-riding any other consideration.</p>
		</div>
	</div>
	<?php include('footer.php'); ?>
</body>
</html>
