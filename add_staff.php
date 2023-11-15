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
        $staff_id = $_POST['staff_id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $designation = $_POST['designation'];
        $mob_no = $_POST['mob_no'];
        $dob = $_POST['dob'];
        $salary = $_POST['salary'];
        $password = $_POST['password'];

        $sql = "INSERT INTO `staff_details` (`staff_id`, `fname`, `lname`, `gender`, `designation`, `mob_no`, `dob`, `salary`, `password`) 
                VALUES ('$staff_id', '$fname', '$lname', '$gender', '$designation', '$mob_no', '$dob', '$salary', '$password');";

        $result = mysqli_query($con, $sql);

        if ($result) {
            $message = "Staff details added successfully!";
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
    <title>Staff Details</title>
    <link rel="stylesheet" href="add_staff.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;

            if (password !== confirmPassword) {
                alert("Password and Confirm Password do not match");
                return false;
            }

            return true;
        }

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
        <form action="add_staff.php" method="post" onsubmit="return validatePassword()">
            <h1>New Staff Details</h1>
            <div class="input-box">
                <input type="text" name="fname" placeholder="First Name" required>
            </div>
            <div class="input-box">
                <input type="text" name="lname" placeholder="Last Name" required>
            </div>
            <div class="input-box">
                <input type="text" name="staff_id" placeholder="Staff-ID" required>
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
                <input type="tel" name="mob_no" placeholder="Mobile No." pattern="\d{10}" required>
            </div>
            
            <div class="input-box">
                <span class="gender-label">DOB: </span>
                <input type="date" name="dob" placeholder="Date of Birth" required>
            </div>

            <div class="input-box">
                <input type="number" name="salary" placeholder="Salary" required>
            </div>

            <!-- Password and Confirm Password fields -->
            <div class="input-box">
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="input-box">
                <input type="password" id="confirmPassword" placeholder="Confirm Password" required>
            </div>

            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</body>
</html>
