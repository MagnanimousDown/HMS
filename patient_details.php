<?php
    // Connecting to the Db start
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hms";

    $con = mysqli_connect($server, $username, $password, $dbname);

    if (!$con) {
        die("Connection to this database failed due to" . mysqli_connect_error());
    }

    $message = ""; // Variable to store the insertion result message

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $patient_id = $_POST['patient_id'];
        $pfname = $_POST['pfname'];
        $plname = $_POST['plname'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $mob_no = $_POST['mob_no'];

        $sql = "INSERT INTO `patient_details` (`patient_id`, `pfname`, `plname`, `gender`, `dob`, `mob_no`, `admission_dt`) 
                VALUES ('$patient_id', '$pfname', '$plname', '$gender', '$dob', '$mob_no', NOW());";

        $result = mysqli_query($con, $sql);

        if ($result) {
            $message = "Patient details added successfully!";
        } else {
            $message = "Error: " . mysqli_error($con);
        }
    }

    // Close the database connection
    mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details</title>
    <link rel="stylesheet" href="PD-style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script>
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
        <form action="patient_details.php" method="post">
            <h1>Patient Details</h1>
            <div class="input-box">
                <input type="text" name="pfname" placeholder="First Name" required>
            </div>
            <div class="input-box">
                <input type="text" name="plname" placeholder="Last Name" required>
            </div>
            <div class="input-box">
                <input type="text" name="patient_id" placeholder="Patient-ID" required>
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
                <input type="tel" name="mob_no" placeholder="Mobile No." pattern="\d{10}" required>
            </div>
            
            <div class="input-box">
                <span class="gender-label">DOB: </span>
                <input type="date" name="dob" placeholder="Date of Birth" required>
            </div>

            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</body>
</html>
