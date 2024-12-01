<?php
include('../Dashboard/db_connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        label,
input[type="radio"] {
    position: relative;
    display: inline-block;
    margin-right: 19px; /* Add spacing between buttons */
}
        input[type="radio"] {
            z-index: 12;
        }
        #container{
        margin-left: 230px;
        margin-top: -650px;
    }
    h4{
        color:darkgreen;
    }

        label {
            z-index: 6;
            padding: 15px;
            padding-left: 45px;
            margin-left: -35px;
            border-radius: 5px;
            font-size: 20px;
        }

        input[type="radio"]:checked + label {
            background-color: #66FF99;
            box-sizing: border-box;
        }
        
        input[type="date"] {
        border: 3px solid #4CAF50; /* Set border color to green */
        border-radius: 10px;
        padding: 10px;
    }



        .column {
            float: left;
            width: 25%;
            padding: 5px;
        }

        /* Clearfix (clear floats) */
        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        /* Custom styles for select and input */
        select,
    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 3px solid #4CAF50; /* Set border color to green */
        border-radius: 10px;
        box-sizing: border-box;
        font-size: 16px;
    }

        /* Styles for button */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #45a049;
        }

        /* Styles for heading */
        h4 {
            font-size: 24px;
        }

        /* Styles for form */
        .form-panel {
            width: 100%;
            margin-left: 90px;
        }

        td {
            font-size: 20px;
            font-weight: 600;
        }
    </style>
    
</head>
<body>
    
<?php

  // include first file
  require('../Dashboard/navigation.php');

  // include second file
  require('../Patient/pcpanel.php');
  ?>
   <section id="container">
    <section id="main-content">
        <section class="wrapper">
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> DOCTOT APPOINTMENT DETAILS </h4>
                        <form name="form1" id="formID" method="post" action="../Patient/appointmentinserted.php" class="left-form">
                            <table width="673" height="630" border="0" align="left">
                                <tr>
                                    <td>Patient Number</td>
                                    <td>
                                        <?php
                                        $p_no = $_SESSION['uname'];
                                        echo '<input name="patient_number" type="text" id="patient_number" value="' . $p_no . '" readonly>';
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                <td>Patient</td>
<td>
  <?php
  $uname = $_SESSION['uname'];
  $sql = "SELECT * FROM patient_details WHERE p_no = '$uname'";
  $res = mysqli_query($conn, $sql);

  if ($row = mysqli_fetch_array($res)) {
    ?>
    <input type="text" name="patient_name" id="patient_name" value="<?php echo $row['patient_name']; ?>" readonly>
    <?php
  }
  ?>
</td>
</tr>
<tr>
                                    <td>Department</td>
                                    <td>
                                        <select name="spe_id" id="spe_id">
                                            <option value="">Specialization Name</option>
                                            <?php
                                            include('db_connection.php');

                                            $sql = "SELECT * FROM specialization";
                                            $res = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_array($res)) {
                                                ?>
                                                <option value="<?php echo $row['spe_id']; ?>"><?php echo $row['spe_name']; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Select Doctor</td>
                                    <td>
                                        <select name="doctor_id" id="doctor_id" required>
                                            <option value="">Select Doctor</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Appointment Date</td>
                                    <td>
                                        <?php
                                        $appointment_date = isset($_POST['appointment_date']) ? $_POST['appointment_date'] : '';
                                        ?>
                                        <input name="appointment_date" value="<?php echo $appointment_date; ?>" class="form-control" type="date" id="appointment_date" readonly>
                                    </td>
                                </tr>
                                <tr>
                                
                                    <td colspan="2">
                                        <h4>TIME SLOTS</h4>
                                        <div id="time_slots_container"></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Description</td>
                                    <td>
                                        <textarea name="description" id="description" ></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Current Date</td>
                                    <td>
                                        <input name="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" readonly="" type="date" id="date">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div align="center">
                                            <input type="submit" name="Submit" class="btn btn-primary" value="Submit">
                                            <input type="reset" name="Reset" class="btn btn-danger" value="Reset">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div><!-- col-lg-12-->
            </div><!-- /row -->
        </section><!-- /wrapper -->
    </section><!-- /MAIN CONTENT -->
</section>


    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- AJAX request to fetch doctors based on specialization -->
    <script>
$(document).ready(function() {
    $('#spe_id').change(function() {
        var specialization = $(this).val();
        $.ajax({
            url: '../Patient/get_doctors.php',
            type: 'GET',
            data: { specialization: specialization },
            dataType: 'json',
            success: function(response) {
                var doctorsDropdown = $('#doctor_id');
                doctorsDropdown.empty();
                doctorsDropdown.append($('<option>').text('Select Doctor').attr('value', ''));

                $.each(response, function(index, doctor) {
                    var option = $('<option>').text(doctor.doctor_name).attr('value', doctor.doctor_id);

                    if (!doctor.is_available) {
                        option.prop('disabled', true);
                    }

                    doctorsDropdown.append(option);
                });

                $('#time_slots_container').empty(); // Clear the time slots container
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });



            $('#doctor_id').change(function() {
                var doctorId = $(this).val();
                var appointmentDate = $('#appointment_date').val();
                $.ajax({
                    url: 'get_time_slots.php',
                    type: 'GET',
                    data: { doctor_id: doctorId, appointment_date: appointmentDate },
                    dataType: 'json',
                    success: function(response) {
                        var timeSlotsContainer = $('#time_slots_container');
                        timeSlotsContainer.empty();
                        $.each(response, function(index, timeSlot) {
                            var timeSlotLabel = $('<label>')
                                .attr('for', 'time_slot_' + index)
                                .text(timeSlot.time_slot);

                            var timeSlotInput = $('<input>')
                                .attr({
                                    type: 'radio',
                                    name: 'time_slot',
                                    id: 'time_slot_' + index,
                                    value: timeSlot.time_slot
                                });

                            if (timeSlot.is_booked) {
                                timeSlotLabel.css('background-color', 'red');
                                timeSlotInput.prop('disabled', true);
                            }

                            timeSlotsContainer.append(timeSlotInput);
                            timeSlotsContainer.append(timeSlotLabel);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
     function changeBackgroundColor(radio) {
  var labels = document.querySelectorAll('label');
  for (var i = 0; i < labels.length; i++) {
    labels[i].style.backgroundColor = ''; // Reset background color of all labels
    labels[i].style.padding = ''; // Reset padding of all labels
    labels[i].style.margin = ''; // Reset margin of all labels
  }
  if (radio.checked) {
    radio.parentNode.style.backgroundColor = 'lightgreen'; // Change background color of selected label

     radio.parentNode.style.margin = '10px'; // Adjust the margin to prevent color extension
  }
}


    </script>

</body>
</html>
