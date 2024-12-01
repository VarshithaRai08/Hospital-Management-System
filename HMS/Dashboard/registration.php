
<!DOCTYPE html>
<html>
<head>
<title>Registration Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
body {
    font-family: 'Cabin', sans-serif;
    background-image: url('../img/img5.jpg');
    background-repeat: no-repeat;
    background-size: cover;
}

h1.header {
    font-size: 40px;
    color: white;
    text-align: center;
    margin-top: 30px;
}


.content {
    margin: 30px auto;

    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.8);

    padding: 30px;
    
    margin: 50px auto;
    background-color: rgba(255, 255, 255, 0.1);
    padding: 40px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgb(0 0 0 / 20%);
    width: 500px;
}

.form {
    margin-top: 20px;
}
   

.form-control {
    margin-bottom: 20px;
}

.form-control label.header {
    font-size: 16px;
    color:white;
    margin-bottom:10px;
    font-weight: bold;
}
.select-style {
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 1em;
  width:470px;
}


.form-control input[type="text"],
.form-control input[type="email"],
.form-control input[type="password"],
.form-control input[type="tel"],
.form-control input[type="date"],
.form-control textarea {
    width: 90%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
}


.form-control input[type="radio"] {
    margin-right: 5px;
    color:white;
}

.form-control input[type="radio"] {
    margin-right: 5px;
    appearance: none;
    -moz-appearance: none;
    -webkit-appearance: none;
    background-color: white;
    border: 2px solid white;
    border-radius: 50%;
    width: 14px;
    height: 14px;
    cursor: pointer;
}

.form-control input[type="radio"] + label {
    color: white;
}

.form-control input[type="radio"]:checked {
    background-color: green;
}

.register {
    margin-top:-10px;
    display: block;
    width: 92%;
    padding: 10px;
    background-color: #337ab7;
    color: #fff;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
}

.register:hover {
    background-color: red;
}
.register1 {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #337ab7;
    color: #fff;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
}

.register1:hover {
    background-color: red;
}

.required {
        color: red;
    }

    .toggle-password {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
}

.password-input-container {
    position:relative;
}

.password-input-container .fas {
    position: absolute;
    top: 50%;
    right: 1px;
    transform: translateY(-50%);
    font-size: 14px;
    color: #999;
}

</style>

</head>
<body>
<h1 class="header">Patient Registration Form</h1>

<div class="content">
    <div class="form">
    <?php
include('db_connection.php');

// Get the latest patient number
$sql = "SELECT pidno FROM registration ORDER BY CAST(SUBSTRING(pidno, 4) AS UNSIGNED) DESC LIMIT 1";

$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($res);
$latestPidNo = $row['pidno'] ?? '';

// Extract the numeric part of the latest patient number
preg_match('/(\d+)$/', $latestPidNo, $matches);
$latestNumber = $matches[1] ?? 0;

// Increment the numeric part to generate the next patient number
$nextNumber = intval($latestNumber) + 1;

// Generate the next patient number
$nextPidNo = 'PNO' . $nextNumber;
?>

        <form action="patient_insert.php" id="formID" method="post" onsubmit="return validateForm();" id="registrationForm">

            <div class="form-control">

				<label class="header">First Name <span>*</span> </label>
				<input type="text" id="name" name="name" placeholder="First Name" maxlength="15" title="Please enter your firstname Name" class="validate[required,custom[onlyLetter]]  form-control" required>
			
			</div>
			
			<div class="form-control"> 
				<label class="header">Last Name <span>*</span> </label>
				<input type="text" id="last_name" name="last_name" placeholder="Last Name"  maxlength="10"  title="Please enter Last Name" class="validate[required,custom[onlyLetter]]  form-control">
			
			</div>
			
			<div class="form-control"> 
    <label class="header">Gender<span>*</span></label>
    <input name="gender" type="radio" value="Male" id="gender-male" required>
<label for="gender-male">Male</label>

<input name="gender" type="radio" value="Female" id="gender-female" required>
<label for="gender-female">Female</label>

<input name="gender" type="radio" value="Other" id="gender-other" required>
<label for="gender-other">Other</label>

    <div class="clear"></div>
</div>

		
		
			<div class="form-control">	
				<label class="header">Email <span>*</span> </label>
				<input type="email" id="email" name="email" placeholder="Mail@example.com" title="Please enter a Valid Email Address" required>
				<div class="clear"></div>
			</div>
		
			<div class="form-control">	
    <label class="header">Address <span>*</span> </label><div>
    <textarea id="bill" name="address" placeholder="Your Address" title="Please enter Your Address"  style="font-family :sans-serif"required></textarea>
    <div class="clear"></div>
</div>

		
			<div class="form-control">	
				<label class="header">Phone Number <span>*</span> </label>	
				<input type="tel" id="usrtel" name="contact_no" placeholder="Your Phone Number" title="Please enter Your Phone Number"  maxlength="10">
				<div class="clear"></div>
			</div>	
			<div class="form-control">
    <label class="header">Date of Birth <span>*</span></label>
    <input type="date" id="dob" name="dob" placeholder="Enter the Date" title="Please enter Your Date" max="<?= date('Y-m-d'); ?>" required>
    <div class="clear"></div>
</div>


<div class="form-control">	
        <label class="header">Patient No <span>*</span></label>	
        <input type="text" id="usrtel" name="pidno" value="<?php echo $nextPidNo; ?>" readonly placeholder="patient No" title="Please enter Your Patient No">
        <div class="clear"></div>
    </div>	
            

            <div class="form-control">	
    <label class="header">Password <span>* </span> </label>	
    <div class="password-input-container">
        <input type="password" id="password" name="password" maxlength="12" placeholder="Enter the Password" title="Please enter Your Password">
        <span id="togglePassword" class="toggle-password" onclick="togglePasswordVisibility()"><i class="fas fa-eye"></i></span>
    </div>
    <div class="clear"></div>
</div>

			
			<p>&nbsp;</p>
			<div class="form-control">
            <input type="submit" class="register" value="Submit" onclick="clearFormFields()">

                
		</form>
	</div>
</div>
<script>
document.getElementById('name').onkeyup = function(event) {
    var firstNameInput = event.target;
    var firstName = firstNameInput.value.trim();

    if (firstName.length > 0) {
        firstName = firstName.charAt(0).toUpperCase() + firstName.slice(1);
        firstNameInput.value = firstName;
    }
};
document.getElementById('last_name').onkeyup = function(event) {
    var lastNameInput = event.target;
    var lastName = lastNameInput.value.trim();

    if (lastName.length > 0) {
        lastName = lastName.charAt(0).toUpperCase() + lastName.slice(1);
        lastNameInput.value = lastName;
    }
};




    function togglePasswordVisibility() {
    var passwordInput = document.getElementById('password');
    var togglePasswordIcon = document.getElementById('togglePassword');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        togglePasswordIcon.innerHTML = '<i class="fas fa-eye-slash"></i>';
    } else {
        passwordInput.type = 'password';
        togglePasswordIcon.innerHTML = '<i class="fas fa-eye"></i>';
    }
}
// JavaScript validation
function validateForm() {
    // Get form elements
    var firstName = document.getElementById('name');
    var lastName = document.getElementById('last_name');
    var genderMale = document.getElementById('gender-male');
    var genderFemale = document.getElementById('gender-female');
    var genderOther= document.getElementById('gender-other');
    var email = document.getElementById('email');
    var address = document.getElementById('bill');
    var phoneNumber = document.getElementById('usrtel');
    var dateOfBirth = document.getElementById('dob');
    var password = document.getElementById('password');

    if (firstName.value === '') {
    alert('Please enter your First Name');
    firstName.focus();
    return false;
} else if (!/^[A-Z][a-zA-Z]*$/.test(firstName.value)) {
    alert('Please enter a valid First Name starting with a capital letter');
    firstName.focus();
    return false;
}


if (!/^[a-zA-Z]*$/.test(lastName.value) && lastName.value !== '') {
    alert('Please enter a valid Last Name');
    lastName.focus();
    return false;
}

   
    if (!genderMale.checked && !genderFemale.checked && !genderOther.checked) {
        alert('Please select your gender');
        return false;
    }
if (email.value === '') {
        alert('Please enter your email');
        email.focus();
        return false;
    } else if (!email.value.includes('@')) {
        alert('Please enter a valid email address');
        email.focus();
        return false;
    }
    if (address.value === '') {
        alert('Please enter your address');
        address.focus();
        return false;
    } else if (!/^[A-Z][a-zA-Z\s\d]*$/.test(address.value)) {
        alert('Please enter a valid address starting with a capital letter');
        address.focus();
        return false;
    }
    if (phoneNumber.value === '') {
    alert('Please enter your phone number');
    phoneNumber.focus();
    return false;
} else if (!/^\d{10}$/.test(phoneNumber.value)) {
    alert('Please enter a 10-digit phone number');
    phoneNumber.focus();
    return false;
}


    

    if (dateOfBirth.value === '') {
        alert('Please enter your date of birth');
        dateOfBirth.focus();
        return false;
    }

    
    if (password.value === '') {
    alert('Please enter your password');
    password.focus();
    return false;
} else if (password.value.length < 8) {
    alert('Password should be at least 8 characters long');
    password.focus();
    return false;
} else if (!/[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]+/.test(password.value)) {
    alert('Password should contain at least one special character,one number,one capital letter');
    password.focus();
    return false;
} else if (!/\d+/.test(password.value)) {
    alert('Password should contain at least one special character,one number,one capital letter');
    password.focus();
    return false;
} else if (!/[A-Z]+/.test(password.value)) {
    alert('Password should contain at least one special character,one number,one capital letter');
    password.focus();
    return false;
}


    // Rest of the validation code...

    return true;
}
document.getElementById('name').onkeydown = function(event) {
    var keyCode = event.keyCode || event.which;
    var keyValue = String.fromCharCode(keyCode);

    // Allow backspace key
    if (keyCode === 8) {
        return;
    }

    // Block lowercase letters and special characters (except space)
    if (!/^[A-Z\s]+$/.test(keyValue)) {
        event.preventDefault();
    }
};
document.getElementById('usrtel').onkeydown = function(event) {
    var keyCode = event.keyCode || event.which;
    var keyValue = String.fromCharCode(keyCode);

    // Allow backspace key
    if (keyCode === 8) {
        return;
    }

    if (!/^[0-9\s]+$/.test(keyValue)) {
    event.preventDefault();
}

};




document.getElementById('last_name').onkeydown = function(event) {
    var keyCode = event.keyCode || event.which;
    var keyValue = String.fromCharCode(keyCode);
       // Allow backspace key
       if (keyCode === 8) {
        return;
    }

    
    // Block numbers and special characters (except space)
    if (!/^[a-zA-Z\s]+$/.test(keyValue)) {
        event.preventDefault();
    }
};
var addressInput = document.getElementById('bill');

    addressInput.addEventListener('input', function () {
        var address = addressInput.value;

        // Capitalize the first letter
        var capitalizedAddress = address.charAt(0).toUpperCase() + address.slice(1);

        // Update the input value with the capitalized address
        addressInput.value = capitalizedAddress;
    });

function clearFormFields() {
    document.getElementById("registrationForm").reset();
}



</script>
</html>