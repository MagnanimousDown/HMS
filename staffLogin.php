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

$message = ""; // Variable to store the login result message

if (isset($_POST['login'])) {
    $staff_id = $_POST['staff_id'];
    $password = $_POST['password'];

    // Secure the input values to prevent SQL injection
    $staff_id = mysqli_real_escape_string($con, $staff_id);
    $password = mysqli_real_escape_string($con, $password);

    $sql = "SELECT * FROM staff_details WHERE staff_id='$staff_id' AND password='$password'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            // Login successful
            // Redirect to the dashboard page
            header("Location: staff_dashboard.html");
            exit(); // Ensure that no further code is executed after the redirection
        } else {
            // Invalid staff_id or password
            $message = "Invalid staff_id or password";
        }
    } else {
        // Query execution failed
        $message = "Error executing query: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Login</title>
    <link rel="stylesheet" href="staffLog.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body{}
    </style>
    <script>
        // This script shows the error message when the login fails
        function showErrorMessage() {
            document.getElementById('errorMessage').style.display = 'block';
        }
    </script>
</head>
<body>
    <!-- Navigation Bar -->
    <ul class="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>

        <ul class="SignLog">
        <li><a href="logins.php">Login</a></li>
        </ul>
    </ul>
    
    <!-- Login Section -->
    <div class="wrapper">
        <form action="staffLogin.php" method="post" onsubmit="showErrorMessage()">
            <h1>Staff Login</h1>
            
            <!-- Error Message Section -->
            <div id="errorMessage" style="color: red; display: <?php echo empty($message) ? 'none' : 'block'; ?>;">
                <?php echo $message; ?>
            </div>

            <div class="input-box">
                <input type="text" name="staff_id" placeholder="Staff ID" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <!-- Forgot Password Section -->
            <div class="forgot-password">
                <a href="#">Forgot Password?</a>
            </div>
            
            <!-- Login Button -->
            <button type="submit" class="btn" name="login">Submit</button>
        </form>
    </div>
</body>
</html>
