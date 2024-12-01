<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <style>
        /* Apply basic styling to form elements */
        form {
            max-width: 300px;
            margin: 0 auto;
            margin-top: -550px;
            margin-left: 350px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-size: 22px;
            font-weight: 600;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 10px;
            border: 3px solid #4CAF50; /* Green border color */
            border-radius: 10px;
            font-size: 16px; /* Increased font size */
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        
        /* Style for the big message icon */
        .message-icon {
            position: absolute;
            top: 20%;
            right: 20px;
            font-size: 40px;
            color: #3f9122;
            cursor: pointer;
        }
        
        .message-form {
            display: none;
            position: absolute;
            top: 50%;
            left: 80%;
            transform: translate(-50%, -50%);
            background-color: #f9f9f9;
            padding: 20px;
            border: 3px solid red;
            border-radius: 10px;
        }
    </style>
    
    <!-- Font Awesome library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
</head>
<body>
    <?php
        // include first file
        require('../Dashboard/navigation.php');

        // include second file
        require('../Patient/pcpanel.php');

        // Assuming you have access to the currently logged-in username in the session
        $username = $_SESSION['uname'];

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve the entered password
            $enteredPassword = $_POST['new_password'];

            // Assuming you have a database connection established

            // Query the bed_allotment table to check if the username (uname) exists
            $query = "SELECT * FROM bed_allotment WHERE patient_number = '$username'";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                // Username already exists in bed_allotment table
                $errorMessage = '<script>alert("already alloted");</script>'; // Display "already alloted" message
            } else {
                // Username doesn't exist, continue with the password check

                // Query the inpatients table to check if the password matches
                $query = "SELECT bed_number_password FROM inpatients WHERE bed_number_password = '$enteredPassword'";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    // Password matches, redirect to bedallotment.php
                    echo '<script>window.location.href = "../Patient/bedallotment.php";</script>';
                    exit();
                } else {
                    $errorMessage = '<script>alert("Incorrect password");</script>'; // Message to be displayed if password doesn't match
                }
            }
        }

        // Fetch the password from the inpatients table based on the username
        $passwordQuery = "SELECT bed_number_password FROM inpatients WHERE patient_number = '$username'";
        $passwordResult = mysqli_query($conn, $passwordQuery);
        $passwordRow = mysqli_fetch_assoc($passwordResult);
        $bedBookingPassword = $passwordRow ? $passwordRow['bed_number_password'] : "No notification found";
    ?>

    <form action="" method="POST">
        <label for="new_username">Patient Number:</label>
        <input type="text" name="new_username" id="new_username" value="<?php echo htmlspecialchars($username); ?>" readonly><br>
        
        <label for="new_password">Password:</label>
        <input type="password" name="new_password" id="new_password"placeholder="Access Pasword from Notification" required><br>
        
        <input type="submit" value="Submit">
    </form>

    <?php
        if (isset($errorMessage)) {
            echo "<p>$errorMessage</p>";
        }
    ?>

    <div class="message-icon" onclick="toggleMessageForm()">
        <i class="fas fa-comment-medical fa-2x" style="color: #3f9122;"></i>
    </div>

    <div class="message-form" id="messageForm" style="display: none;">
        <?php if ($bedBookingPassword !== "No notification found"): ?>
            <p>Bed Booking Password for Patient <?php echo $username; ?> is: <?php echo $bedBookingPassword; ?></p>
        <?php else: ?>
            <p>No notification found</p>
        <?php endif; ?>
    </div>

    <script>
        function toggleMessageForm() {
            var messageForm = document.getElementById("messageForm");
            if (messageForm.style.display === "none") {
                messageForm.style.display = "block";
            } else {
                messageForm.style.display = "none";
            }
        }
    </script>
</body>
</html>
