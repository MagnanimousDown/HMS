<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "hms";

$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
    die("Connection to this database failed due to" . mysqli_connect_error());
}

$message = ""; // Variable to store the update result message

if (isset($_POST['patient_id'])) {
    $patient_id = $_POST['patient_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $mobile_no = $_POST['mobile_no'];
    $dob = $_POST['dob'];
    $admission_date = $_POST['admission_date'];

    // Secure the input values to prevent SQL injection
    $patient_id = mysqli_real_escape_string($con, $patient_id);
    $first_name = mysqli_real_escape_string($con, $first_name);
    $last_name = mysqli_real_escape_string($con, $last_name);
    $gender = mysqli_real_escape_string($con, $gender);
    $mobile_no = mysqli_real_escape_string($con, $mobile_no);
    $dob = mysqli_real_escape_string($con, $dob);
    $admission_date = mysqli_real_escape_string($con, $admission_date);

    // Update patient details based on patient ID
    $update_query = "UPDATE patient_details SET 
                 pfname='$first_name', 
                 plname='$last_name', 
                 gender='$gender', 
                 mob_no='$mobile_no', 
                 dob='$dob', 
                 admission_dt='$admission_date' 
                 WHERE patient_id='$patient_id'";

    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        $message = "Patient details updated successfully!";
    } else {
        $message = "Error updating patient details: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Patient Details</title>
    <link rel="stylesheet" href="updt_patient.css">
    <script>  /// FOR POPUP
        <?php
            if (!empty($message)) {
                echo "window.onload = function() { alert('$message'); }";
            }
        ?>
    </script>
</head>
<body>
    <!-- Navigation Bar -->
    <ul class="navbar">
        <li><a href="staff_dashboard.html">Home</a></li>

        <ul class="SignLog">
        <li><a href="logins.php">LogOut</a></li>
        </ul>
    </ul>

    <div class="wrapper">
        <form action="updt_patient.php" method="post">
            <h1>Update Patient Details</h1>

            <h3>Enter the ID to be Updated</h3>
            <div class="input-box">
                <input type="text" name="patient_id" placeholder="Patient-ID" required>
            </div>
            <br>
            <div class="input-box">
                <input type="text" name="first_name" placeholder="First Name" required>
            </div>
            <div class="input-box">
                <input type="text" name="last_name" placeholder="Last Name" required>
            </div>
            <div class="input-box">
                <span class="gender-label">Gender:</span>
                <div class="gender-options">
                    <label><input type="radio" name="gender" value="Male" required> Male</label>
                </div>
                <div class="gender-options">
                    <label><input type="radio" name="gender" value="Female" required> Female</label>
                </div>
            </div>

            <div class="input-box">
                <input type="tel" name="mobile_no" placeholder="Mobile No." pattern="\d{10}" required>
            </div>
            
            <div class="input-box">
                <span class="gender-label">DOB: </span>
                <input type="date" name="dob" placeholder="Date of Birth" required>
            </div>

            <div class="input-box">
                <span class="gender-label">Admission Date: </span>
                <input type="date" name="admission_date" placeholder="Admission Date" required>
            </div>

            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</body>
</html>
