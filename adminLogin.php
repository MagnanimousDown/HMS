<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="staffLog.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body{}
    </style>

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
        <form action="">
            <h1>Admin Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Admin ID" required>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" required>
            </div>

            <!-- Forgot Password Section -->
            <div class="forgot-password">
                <a href="#">Forgot Password?</a>
            </div>
            
            <!-- Login Button -->
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</body>
</html>
