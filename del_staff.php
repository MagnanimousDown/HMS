<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "hms";

$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
    die("Connection to this database failed due to" . mysqli_connect_error());
}

if (isset($_POST['delete_staff'])) {
    $staff_id = $_POST['staff_id'];

    $staff_id = mysqli_real_escape_string($con, $staff_id);

    // Retrieve staff details for confirmation
    $get_staff_query = "SELECT fname, lname FROM staff_details WHERE staff_id = $staff_id";
    $get_staff_result = mysqli_query($con, $get_staff_query);

    if ($get_staff_result) {
        $staff_row = mysqli_fetch_assoc($get_staff_result);

        if ($staff_row) {
            $fname = $staff_row['fname'];
            $lname = $staff_row['lname'];

            // Display confirmation message
            echo '<div class="echo">';
            echo '<style> .echo{color: #fff;}</style>';
            echo "Are you sure you want to delete the staff member with ID $staff_id, named $fname $lname?";
            echo '<form action="del_staff.php" method="post">
                    <input type="hidden" name="staff_id" value="' . $staff_id . '">
                    <button type="submit" class="btn" name="confirm_delete">Yes, Delete</button>
                </form>';
            echo '<a href="del_staff.php">No, Cancel</a>';
            echo '</div>';
        } else {
            echo "Staff member not found with ID $staff_id";
        }
    } else {
        echo "Error retrieving staff details: " . mysqli_error($con);
    }
}

// Perform deletion if confirmed
if (isset($_POST['confirm_delete'])) {
    $staff_id = $_POST['staff_id'];

    // Delete staff member with the specified staff ID
    $delete_query = "DELETE FROM staff_details WHERE staff_id = $staff_id";
    $delete_result = mysqli_query($con, $delete_query);

    if ($delete_result) {
        echo "Staff with ID $staff_id deleted successfully!";
    } else {
        echo "Error deleting staff: " . mysqli_error($con);
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
        <li><a href="admin_dashboard.html">Home</a></li>

        <ul class="SignLog">
            <li><a href="logins.php">LogOut</a></li>
        </ul>
    </ul>
    
    <!-- Delete Staff Section -->
    <div class="wrapper">
        <form action="del_staff.php" method="post">
            <h1>Delete Staff</h1>
            <div class="input-box">
                <input type="text" name="staff_id" placeholder="Staff ID" required>
            </div>
                        
            <!-- Delete Button -->
            <button type="submit" class="btn" name="delete_staff">Show and Confirm Deletion</button>
        </form>
    </div>
</body>
</html>
