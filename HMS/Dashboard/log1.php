<!DOCTYPE html>
<html>
  <head>
    <title>Login Form</title>
    <style>
      body {
        font-family: Arial, sans-serif;
		background-image:url('../img/images2.avif');
		background-repeat:no-repeat;
		background-size:cover;
      }

      h2 {
        text-align: center;
		font-size:45px;
      }

      form {
        max-width: 300px;
        margin: 0 auto;
        margin: 50px auto; /* Center the form horizontally */
        background-color: rgba(255, 255, 255, 0.1); /* Form background color with opacity */
        padding: 40px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.8);
        width: 500px; /* Updated width value */
      }

      label {
        display: block;
        margin-bottom: 10px;
        font-size:24px;
        font-weight:900;
      }

      input[type="text"],
      input[type="password"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 20px;
      }

      input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color:darkblue;
        color:white;
        font-size: 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

      input[type="submit"]:hover {
        background-color: #23527c;
      }

      .error-message {
        color: red;
        font-size: 15px;
        margin-top: -10px;
        margin-bottom: 10px;
      }
    </style>
    <script>
      function validateForm() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var errorMessage = "";

        if (username.trim() === "") {
          errorMessage += "Username is required.<br>";
        }

        if (password.trim() === "") {
          errorMessage += "Password is required.<br>";
        }

        if (errorMessage !== "") {
          document.getElementById("error-container").innerHTML = errorMessage;
          return false;
        }

        return true;
      }
  
    </script>
  </head>
  <body>
  <h2>Login Form</h2>
  <form method="post" action="logcheck.php" onsubmit="return validateForm()">
    <label for="username">
      <i class="fa fa-user"></i> <!-- Font Awesome user icon -->
      Username
    </label>
    <input type="text" id="username" name="username" placeholder="Username/Patient Number">
    <label for="password">
      <i class="fa fa-lock"></i> <!-- Font Awesome lock icon -->
      Password
    </label>
    <input type="password" id="password" name="password">
    <div id="error-container" class="error-message"></div>
    <input type="submit" value="Login">
  </form>

  <!-- Don't forget to include the Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</body>

</html>
