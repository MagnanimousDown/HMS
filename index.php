<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>H M S</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
    <div class="wrappert">
        <form action="" method="post">
            <h1>View Patient Report & Medical Treatment Procedure</h1>

            <div class="input-box">
                <input type="text" name="patient_id" placeholder="Patient ID" required>
            </div>

            <div class="button-container">
                <button type="submit" name="patient_records" class="btn">Patient Records</button>
            </div>
        </form>
    </div>

    <div class="wrapperb">
        <?php

        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hms";

        // Create connection
        $conn = new mysqli($server, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if the form has been submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_POST["patient_records"])) {
                // Fetch and display patient records only if patient ID is provided
                if (isset($_POST["patient_id"])) {
                    $patient_id = $_POST["patient_id"];
                    if (!empty($patient_id)) {
                        $sql = "SELECT sd.staff_id, sd.fname, sd.lname, sd.gender, sd.designation, sd.mob_no, sd.dob, sd.salary FROM staff_details sd 
                                JOIN patient_report pr ON sd.staff_id = pr.staff_id
                                WHERE pr.patient_id = '$patient_id'";
                        $result = $conn->query($sql);
                        displayResults($result);
                    } else {
                        echo "Please enter a valid Patient ID.";
                    }
                } else {
                    echo "Please enter a valid Patient ID.";
                }
            }

            // Close the database connection
            $conn->close();
        }

        // Function to display query results in a table
        function displayResults($result)
        {
            if ($result->num_rows > 0) {
                echo "<table class='coach-table'>";
                echo "<tr><th>Staff ID</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Designation</th><th>Mobile No</th><th>Date of Birth</th><th>Salary</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["staff_id"] . "</a></td>";
                    echo "<td>" . $row["fname"] . "</td>";
                    echo "<td>" . $row["lname"] . "</td>";
                    echo "<td>" . $row["gender"] . "</td>";
                    echo "<td>" . $row["designation"] . "</td>";
                    echo "<td>" . $row["mob_no"] . "</td>";
                    echo "<td>" . $row["dob"] . "</td>";
                    echo "<td>" . $row["salary"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No Staff Member found</p>";
            }
        }
        ?>
    </div>

    <!-- Refresh button outside the form -->
    <div class="button-container">
        <form action="" method="post">
            <button type="submit" name="refresh" class="btn">Refresh</button>
        </form>
    </div>

</body>

</html>
