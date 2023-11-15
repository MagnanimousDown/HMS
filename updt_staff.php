
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

if (isset($_POST['staff_id'])) {
    $staff_id = $_POST['staff_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $designation = $_POST['designation'];
    $mobile_no = $_POST['mobile_no'];
    $dob = $_POST['dob'];
    $salary = $_POST['salary'];

    // Secure the input values to prevent SQL injection
    $staff_id = mysqli_real_escape_string($con, $staff_id);
    $first_name = mysqli_real_escape_string($con, $first_name);
    $last_name = mysqli_real_escape_string($con, $last_name);
    $gender = mysqli_real_escape_string($con, $gender);
    $designation = mysqli_real_escape_string($con, $designation);
    $mobile_no = mysqli_real_escape_string($con, $mobile_no);
    $dob = mysqli_real_escape_string($con, $dob);
    $salary = mysqli_real_escape_string($con, $salary);

    // Update staff details based on staff ID
    $update_query = "UPDATE staff_details SET 
                     fname='$first_name', 
                     lname='$last_name', 
                     gender='$gender', 
                     designation='$designation', 
                     mob_no='$mobile_no', 
                     dob='$dob', 
                     salary='$salary' 
                     WHERE staff_id='$staff_id'";

    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        $message = "Staff details updated successfully!";
    } else {
        $message = "Error updating staff details: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details</title>
    <link rel="stylesheet" href="updt_staff.css">
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

    <ul class="navbar">
        <li><a href="admin_dashboard.html">Home</a></li>

        <ul class="SignLog">
            <li><a href="logins.php">LogOut</a></li>
        </ul>
    </ul>

    <div class="wrapper">
        <form action="updt_staff.php" method="post">
            <h1>Update Staff Details</h1>

            <h3>Enter the ID to be Updated</h3>
            <div class="input-box">
                <input type="text" name="staff_id" placeholder="Staff-ID" required>
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
                <label for="designation">Choose an option:</label>
                <select id="designation" name="designation" required>
                    <option value="Doctor">Doctor</option>
                    <option value="Nurse">Nurse</option>
                    <option value="Ward Boy">Ward Boy</option>
                </select>
            </div>

            <div class="input-box">
                <input type="tel" name="mobile_no" placeholder="Mobile No." pattern="\d{10}" required>
            </div>
            
            <div class="input-box">
                <span class="gender-label">DOB: </span>
                <input type="date" name="dob" placeholder="Date of Birth" required>
            </div>

            <div class="input-box">
                <input type="number" name="salary" placeholder="Salary" required>
            </div>

            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</body>
</html>
