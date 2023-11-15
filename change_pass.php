<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "hms";

$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
    die("Connection to this database failed due to" . mysqli_connect_error());
}

if (isset($_POST['change_password'])) {
    $staff_id = $_POST['staff_id'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    $staff_id = mysqli_real_escape_string($con, $staff_id);
    $old_password = mysqli_real_escape_string($con, $old_password);
    $new_password = mysqli_real_escape_string($con, $new_password);

    // Check if the entered old password matches the existing password in the database
    $check_password_query = "SELECT * FROM staff_details WHERE staff_id='$staff_id' AND password='$old_password'";
    $check_result = mysqli_query($con, $check_password_query);


    if ($check_result) {
        $row = mysqli_fetch_assoc($check_result);
        if ($row) {
            // Old password matches, update the password in the database
            $update_password_query = "UPDATE staff_details SET password='$new_password' WHERE staff_id='$staff_id'";
            $update_result = mysqli_query($con, $update_password_query);

            if ($update_result) {
                echo "Password updated successfully!";
            } else {
                echo "Error updating password: " . mysqli_error($con);
            }
        } else {
            echo "Invalid old password.";
        }
    } else {
        echo "Error checking old password: " . mysqli_error($con);
    }

    if ($check_result) {  /// FOR POPUP 
        $message = "Password Updated sucessfully !";
    } else {
        $message = "Error: " . mysqli_error($con);
    } 

    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="del_patient.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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
    
    <!-- Change Password Section -->
    <div class="wrapper">
        <form action="change_pass.php" method="post">
            <h1>Change Password</h1>
            <div class="input-box">
                <input type="text" name="staff_id" placeholder="Staff ID" required>
            </div>
            <br>
            <div class="input-box">
                <input type="password" name="old_password" placeholder="Old Password" required>
            </div>
            <div class="input-box">
                <input type="password" name="new_password" placeholder="New Password" required>
            </div>
                        
            <!-- Change Password Button -->
            <button type="submit" class="btn" name="change_password">Change Password</button>
        </form>
    </div>
</body>
</html>
