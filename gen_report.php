<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Report</title>
    <link rel="stylesheet" href="gen_report.css">
</head>
<body>

    <ul class="navbar">
        <li><a href="staff_dashboard.html">Home</a></li>

        <ul class="SignLog">
        <li><a href="logins.php">LogOut</a></li>
        </ul>
    </ul>
       
     <div class="wrapper">
        <form action="">
            <h1>Generate Report</h1>
            <div class="input-box">
                <input type="text" placeholder="Patient Report ID" required>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Patient-ID" required>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Staff-ID" required>
            </div>

            <div class="input-box">
                <input type="text" placeholder="Disease" required>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Diagnosis" required>
            </div>

            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</body>
</html>