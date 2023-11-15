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
        $procedure_id = $_POST['procedure_id'];
        $staff_id = $_POST['staff_id'];
        $patient_id = $_POST['patient_id'];
        $procedure_name = $_POST['procedure_name'];
        $procedure_desc = $_POST['procedure_desc'];

        $sql = "INSERT INTO `medical_procedure` (`procedure_id`, `staff_id`, `patient_id`, `procedure_name`, `procedure_date`, `procedure_desc`) VALUES ('$procedure_id', '$staff_id', '$patient_id', '$procedure_name', NOW(), '$procedure_desc');";

        $result = mysqli_query($con, $sql);

        if ($result) {
            $message = "Medical Procedure Generated successfully!";
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
    <title>Medical Procedure</title>
    <link rel="stylesheet" href="med_pro.css">

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
        <form action="med_pro.php" method="post">
            <h1>Medical Procedure</h1>
            <div class="input-box">
                <input type="text" name="procedure_id" placeholder="procedure-ID" required>
            </div>
            <div class="input-box">
                <input type="text" name="staff_id" placeholder="Staff-ID" required>
            </div>
            <div class="input-box">
                <input type="text" name="patient_id" placeholder="Patient-ID" required>
            </div>
            <div class="input-box">
                <input type="text" name="procedure_name" placeholder="Procedure Name" required>
            </div>
            <div class="input-box">
                <span class="gender-label">Procedure Date: </span>
                <input type="date" name="procedure_date" placeholder="Procedure Date" required>
            </div>
            <div class="input-box">
                <input type="text" name="procedure_desc" placeholder="Procedure Description" required>
            </div>
            
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</body>
</html>
