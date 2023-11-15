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
        $p_report_id = $_POST['p_report_id'];
        $patient_id = $_POST['patient_id'];
        $staff_id = $_POST['staff_id'];
        $disease = $_POST['disease'];
        $diagnosis = $_POST['diagnosis'];

        $sql = "INSERT INTO `patient_report` (`p_report_id`, `patient_id`, `staff_id`, `disease`, `diagnosis`) 
                VALUES ('$p_report_id', '$patient_id', '$staff_id', '$disease', '$diagnosis');";

        $result = mysqli_query($con, $sql);

        if ($result) {
            $message = "Patient Report Generated successfully!";
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
    <title>Generate Report</title>
    <link rel="stylesheet" href="gen_report.css">

    <script>
        <?php
            if (!empty($message)) {
                echo "window.onload = function() { alert('$message'); }";
            }
        ?>
    </script>

</head>
<body>

    <ul class="navbar">
        <li><a href="staff_dashboard.html">Home</a></li>

        <ul class="SignLog">
        <li><a href="logins.php">LogOut</a></li>
        </ul>
    </ul>
       
     <div class="wrapper">
        <form action="gen_report.php" method="post">
            <h1>Generate Report</h1>
            <div class="input-box">
                <input type="text" name="p_report_id" placeholder="Patient Report ID" required>
            </div>
            <div class="input-box">
                <input type="text" name="patient_id" placeholder="Patient-ID" required>
            </div>
            <div class="input-box">
                <input type="text" name="staff_id" placeholder="Staff-ID" required>
            </div>
            <div class="input-box">
                <input type="text" name="disease" placeholder="Disease" required>
            </div>
            <div class="input-box">
                <input type="text" name="diagnosis" placeholder="Diagnosis" required>
            </div>

            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</body>
</html>
