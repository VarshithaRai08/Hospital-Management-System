<?php
// Check if the necessary parameters are present
if (isset($_POST['uname']) && isset($_POST['imageData'])) {
  $uname = $_POST['uname'];
  $imageData = $_POST['imageData'];

  // Decode the base64 image data
  $decodedImage = base64_decode($imageData);

  // Define the destination directory where you want to save the image
  $uploadDir = 'uploads/';

  // Generate a unique filename for the image
  $filename = uniqid() . '.jpg';
  $targetFilePath = $uploadDir . $filename;

  // Save the image to the server
  if (file_put_contents($targetFilePath, $decodedImage)) {
    // Image saved successfully

    // Update the database with the image file path or data
    include('db_connection.php');

    // If you want to save the file path in the database
    $sql = "UPDATE patient_details SET image_path='$targetFilePath' WHERE p_no='$uname'";

    // If you want to save the image data in the database
    // $sql = "UPDATE patient_details SET image_data='$decodedImage' WHERE p_no='$uname'";

    if (mysqli_query($conn, $sql)) {
      echo "Image saved and database updated successfully.";
    } else {
      echo "Error: Failed to update the database.";
    }
  } else {
    // Failed to save the image
    echo "Error: Failed to save the image.";
  }
} else {
  // Required parameters are missing
  echo "Error: Invalid request.";
}
?>
