<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details</title>
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
        <form action="">
            <h1>New Staff Details</h1>
            <div class="input-box">
                <input type="text" placeholder="First Name" required>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Last Name" required>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Staff-ID" required>
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
                    <option value="option1">Doctor</option>
                    <option value="option2">Nurse</option>
                    <option value="option3">Ward Boy</option>
                </select>
            </div>

            <div class="input-box">
                <input type="tel" placeholder="Mobile No." pattern="\d{10}" required>
            </div>
            
            <div class="input-box">
                <span class="gender-label">DOB: </span>
                <input type="date" placeholder="Date of Birth" required>
            </div>

            <div class="input-box">
                <input type="number" placeholder="Salary" required>
            </div>

             <!-- Password and Confirm Password fields -->
             <div class="input-box">
                <input type="password" placeholder="Password" id="password" required>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Confirm Password" id="confirmPassword" required>
            </div>

            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</body>
</html>
