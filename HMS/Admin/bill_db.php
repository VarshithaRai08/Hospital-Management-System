<?php
include('db_connection.php');
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form values
    $patientNumber = $_POST['patientNumber'];
    $patientName = $_POST['patientName'];
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $doctorName = $_POST['doctorName'];
    $roomType = $_POST['roomType'];
    $roomNo = $_POST['roomNo'];
    $noOfDays = $_POST['noOfDays'];
    $totalPrice = $_POST['totalPrice'];

    // Retrieve the treatment information from the inpatient_treatment table
    $result = $conn->query("SELECT it.treatment_type, COUNT(*) AS qty, td.treatment_fees FROM inpatient_treatment AS it INNER JOIN treatment_details AS td ON it.treatment_type = td.treatment_name WHERE it.patient_number = '$patientNumber' GROUP BY it.treatment_type");

    // Prepare an array to store the treatment details
    $treatmentDetails = [];

    // Check if the query was successful and fetch the treatment information
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $treatmentTaken = $row['treatment_type'];
            $qty = $row['qty'];
            $rate = $row['treatment_fees'];
            $amount = $rate * $qty;

            // Add the treatment details to the array
            $treatmentDetails[] = [
                'treatmentTaken' => $treatmentTaken,
                'qty' => $qty,
                'rate' => $rate,
                'amount' => $amount
            ];
        }
    }

    // Convert the treatment details array to a JSON-encoded string
    $treatmentDetailsJSON = json_encode($treatmentDetails);

    // Calculate the tax
    $taxRate = 0.003; // 0.3% tax rate
    $tax = $taxRate * $totalPrice; // Calculate tax based on total price

    // Calculate the total amount including tax
    $totalWithTax = $totalPrice + $tax;

    // Calculate the amount allocated for doctor's salary (10% of totalWithTax)
    $doctorSalary = 0.1 * $totalWithTax;

    // Calculate the remaining amount after deducting the doctor's salary
    $remainingAmount = $totalWithTax - $doctorSalary;

    // Prepare the treatment details for insertion into the bill table
    $treatmentDetailsSQL = '';
    foreach ($treatmentDetails as $treatment) {
        $treatmentTaken = $treatment['treatmentTaken'];
        $qty = $treatment['qty'];
        $rate = $treatment['rate'];
        $amount = $treatment['amount'];
    
        // Concatenate the treatment details as part of the SQL query
        $treatmentDetailsSQL .= "('$patientNumber', '$patientName', '$gender', '$department', '$doctorName', '$roomType', '$roomNo', '$noOfDays', '$totalPrice', '$tax', '$totalWithTax', '$treatmentTaken', '$qty', '$rate', '$amount'),";
    }
    
    // Remove the trailing comma from the SQL string
    $treatmentDetailsSQL = rtrim($treatmentDetailsSQL, ',');
    
    // Insert the data into the "bill" table
    $conn->query("INSERT INTO bill (patient_number, patient_name, gender, department, doctor_name, room_type, room_number, no_of_days, total_price, tax, total_with_tax, treatment_taken, quantity, rate, amount) 
                  VALUES $treatmentDetailsSQL");
    // Update the doctor's salary in the "doctor_details" table
    $conn->query("UPDATE doctor_details SET doctor_salary = doctor_salary + '$doctorSalary' WHERE doctor_name = '$doctorName'");

    // Close the database connection
    $conn->close();

    // Redirect to a success page or perform any additional actions
    // ...

    exit();
}
?>
