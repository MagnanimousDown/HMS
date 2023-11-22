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
    $admin_id = $_POST['admin_id'];
    $password = $_POST['password'];

    // Secure the input values to prevent SQL injection
    $admin_id = mysqli_real_escape_string($con, $admin_id);
    $password = mysqli_real_escape_string($con, $password);

    $sql = "SELECT * FROM admin_login WHERE admin_id='$admin_id' AND password='$password'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            // Login successful
            // Redirect to the dashboard page
            header("Location: admin_dashboard.html");
            exit(); // Ensure that no further code is executed after the redirection
        } else {
            // Invalid admin_id or password
            $message = "Invalid admin_id or password";
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
    <title>Admin Login</title>
    <link rel="stylesheet" href="staffLog.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
            }

            body {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                background-image: url('Images/admin_dashboard.jpg');
                background-color: #cccccc;
                background-size: cover;
                background-position: center;
                margin: 0;
            }


            .wrapper { 
                margin-top: 40px;
                width: 420px;
                background: transparent;
                border: 2px solid rgba(255, 255, 255, 0.2);
                backdrop-filter: blur(20px);
                border-radius: 10px;
                padding: 30px 40px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);    color: #333;
            }

            .wrapper h1 {
                font-size: 36px;
                text-align: center;
                color: #333;
                margin-bottom: 20px;
            }

            .wrapper .input-box {
                position: relative;
                width: 100%;
                margin-bottom: 20px;
            }

            .input-box input {
                width: 100%;
                height: 40px;
                background: transparent;
                border: 2px solid #aaa;
                border-radius: 5px;
                font-size: 16px;
                color: #333;
                padding: 10px;
                outline: none;
            }

            .input-box input::placeholder {
                color: #888;
            }

            .wrapper .gender-label {
                display: block;
                margin-bottom: 10px;
                color: #333;
            }

            /* Display Male and Female options with radio buttons and labels on the same line */
            .wrapper .gender-options label {
                display: inline-flex;
                align-items: center;
                margin-bottom: 5px;
            }

            .wrapper .input-box input[type="radio"] {
                transform: scale(0.9); /* Adjust the scale factor as needed */
                margin-right: 5px; /* Optional: Add some spacing between the radio button and label */
            }

            .wrapper .btn {
                width: 100%;
                height: 45px;
                background: #3dffa8;
                background: transparent;
                border: none;
                outline: none;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border: 2px solid rgba(255, 255, 255, .2);
                cursor: pointer;
                font-size: 16px;
                color: #fff;
                font-weight: 600;
                transition: background 0.3s ease-in-out;
            }

            .wrapper .btn:hover {
                background: rgb(131, 124, 230); 
            }

            /* ... Your existing CSS rules ... */

            .input-box select {
                width: 100%;
                height: 40px;
                background-color: transparent;
                border: 2px solid #aaa;
                border-radius: 5px;
                font-size: 16px;
                color: #333;
                outline: none;
                padding: 5px; /* Adjust the padding as needed */
                appearance: none; /* Remove default arrow in some browsers */
                background-image: url('path-to-your-arrow-icon.png'); /* Optional: Custom arrow icon */
                background-position: right center;
                background-repeat: no-repeat;
            }

            .input-box select option {
                background: #333;
                color: #fff;
            }


            .input-box input::placeholder {
                color: #ebe4e4;
            }

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
        <form action="adminLogin.php" method="post" onsubmit="showErrorMessage()">
            <h1>Admin Login</h1>
            
            <!-- Error Message Section -->
            <div id="errorMessage" style="color: red; display: <?php echo empty($message) ? 'none' : 'block'; ?>;">
                <?php echo $message; ?>
            </div>

            <div class="input-box">
                <input type="text" name="admin_id" placeholder="Admin ID" required>
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
