<?php  // include first file
require('../Dashboard/navigation.php');

// include second file
require('../Doctor/dcdash.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
</head>
<style>
        /* Apply basic styling to form elements */
        form {
            max-width: 300px;
            margin: 0 auto;
            margin-top: -500px;
            margin-left: 600px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-size: 25px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 10px;
            border: 3px solid darkblue;
            border-radius: 10px;
        }

        input[type="submit"] {
            background-color:darkblue;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
<body>
    <?php
        // Assuming you have access to the currently logged-in username in the session
        
        $username = $_SESSION['uname'];
    ?>
    <form action="../Doctor/changepassword.php" method="POST">
        <label for="new_username">Username:</label>
        <input type="text" name="new_username" id="new_username" value="<?php echo $username; ?>" readonly><br>
        
        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" id="new_password" required><br>
        
        <input type="submit" value="Change Password">
    </form>
</body>
</html>
