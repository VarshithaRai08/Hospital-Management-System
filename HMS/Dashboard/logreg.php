<html lang="en">

<head>
	<title>Forgot Password</title>
	<!-- Meta tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<style>
		html, body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
		}

		body {
			background-image: url('../img/im.jpg');
			background-size: cover;
			background-position: center;
		}

		.icon {
			text-align: center;
			margin: 50px auto; /* Center the form horizontally */
			background-color: rgba(255, 255, 255, 0.1); /* Form background color with opacity */
			padding: 40px;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.8);
			width: 500px; /* Updated width value */
		}

		.title {
			font-size: 40px;
			color: orange;
			font-family: sans-serif;
		}

		.icon i {
			font-size: 120px; /* Adjust the icon size as needed */
			margin-left: 20px; /* Add spacing between the icon and text */
		}

		.btn {
			display: inline-block;
			padding: 20px 50px; /* Updated padding values */
			background-color: purple;
			color: #ffffff;
			font-size: 25px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			margin: 10px 0; /* Added margin to create spacing between buttons */
			width: 200px; /* Set a fixed width for the buttons */
		}

		.btn:hover {
			background-color: black;
			color: white;
		}
	</style>

</head>

<body>
	<div class="icon">
		<h2 class="title">ABHAYA HOSPITAL</h2>
		<i class="fa fa-user-circle" style="color: white;"></i>
		<br>
		<div class="user">
			<form name="form1" method="post" action="log1.php">
				<div class="input-group">
					<button type="submit" class="btn">Login</button>
					<br><br><br>
				</div>
			</form>
			<form name="form2" method="post" action="registration.php">
				<div class="input-group">
					<button type="submit" class="btn">Register</button>
				</div>
			</form>
		</div>
	</div>

	<script>
		// JavaScript code goes here
	</script>
</body>

</html>
