<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Procedure</title>
    <link rel="stylesheet" href="med_pro.css">
</head>
<body>
    <!-- Navigation Bar -->
    <ul class="navbar">
        <li><a href="staff_dashboard.html">Home</a></li>


        <ul class="SignLog">
        <li><a href="logins.php">LogOut</a></li>
        </ul>
    </ul>

    
    <div class="wrapper">
        <form action="">
            <h1>Medical Procedure</h1>
            <div class="input-box">
                <input type="text" placeholder="procedure-ID" required>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Staff-ID" required>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Patient-ID" required>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Procedure Name" required>
            </div>
            <div class="input-box">
                <span class="gender-label">Procedure Date: </span>
                <input type="date" placeholder="Procedure Date" required>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Procedure Description" required>
            </div>
            
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</body>
</html>