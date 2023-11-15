<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "hms";

$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
    die("Connection to this database failed due to" . mysqli_connect_error());
}

if (isset($_POST['delete_patient'])) {
    $patient_id = $_POST['patient_id'];

    $patient_id = mysqli_real_escape_string($con, $patient_id);

    // Retrieve patient details for confirmation
    $get_patient_query = "SELECT pfname, plname FROM patient_details WHERE patient_id = $patient_id";
    $get_patient_result = mysqli_query($con, $get_patient_query);

    if ($get_patient_result) {
        $patient_row = mysqli_fetch_assoc($get_patient_result);

        if ($patient_row) {
            $fname = $patient_row['pfname'];
            $lname = $patient_row['plname'];
            
            // Display confirmation message
            echo "Are you sure you want to delete the patient member with ID $patient_id, named $fname $lname?";
            echo '<form action="del_patient.php" method="post">
                    <input type="hidden" name="patient_id" value="' . $patient_id . '">
                    <button type="submit" class="btn" name="confirm_delete">Yes, Delete</button>
                  </form>';
            echo '<a href="delete_patient.php">No, Cancel</a>';
        } else {
            echo "patient member not found with ID $patient_id";
        }
    } else {
        echo "Error retrieving patient details: " . mysqli_error($con);
    }
    
}

// Perform deletion if confirmed
if (isset($_POST['confirm_delete'])) {
    $patient_id = $_POST['patient_id'];

    // Delete patient member with the specified patient ID
    $delete_query = "DELETE FROM patient_details WHERE patient_id = $patient_id";
    $delete_result = mysqli_query($con, $delete_query);

    if ($delete_result) {
        echo "patient with ID $patient_id deleted successfully!";
    } else {
        echo "Error deleting patient : " . mysqli_error($con);
    }
}

mysqli_close($con);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Staff</title>
    <link rel="stylesheet" href="del_staff.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- Navigation Bar -->
    <ul class="navbar">
        <li><a href="staff_dashboard.html">Home</a></li>

        <ul class="SignLog">
            <li><a href="logins.php">LogOut</a></li>
        </ul>
    </ul>
    
    <!-- Delete Staff Section -->
    <div class="wrapper">
        <form action="del_patient.php" method="post">
            <h1>Delete Staff</h1>
            <div class="input-box">
                <input type="text" name="patient_id" placeholder="patient ID" required>
            </div>
                        
            <!-- Delete Button -->
            <button type="submit" class="btn" name="delete_patient">Show and Confirm Deletion</button>
        </form>
    </div>
</body>
</html>
