<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Staff Details</title>
    <link rel="stylesheet" href="view_staff-det.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <!-- Navigation Bar -->
    <ul class="navbar">
        <li><a href="admin_dashboard.html">Home</a></li>
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
            <h1>View Staff Details</h1>

            <div class="input-box">
                <input type="text" name="staff_id" placeholder="Staff ID" required>
            </div>

            <div class="button-container">
                <button type="submit" name="staff_details" class="btn">View Staff Details</button>
            </div>
        </form>
    </div>

    <div class="wrapperb">
        <?php
        session_start();

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

            // Check which button was clicked
            if (isset($_POST["staff_details"])) {
                $staff_id = $_POST["staff_id"];
                // Fetch and display staff records only if staff ID is provided
                if (!empty($staff_id)) {
                    $sql = "SELECT staff_id, fname, lname, gender, designation, mob_no, dob, salary FROM staff_details 
                            WHERE staff_id = '$staff_id'";
                    $result = $conn->query($sql);
                    displayResults($result);
                } else {
                    echo "Please enter a valid staff ID.";
                }
            } elseif (isset($_POST["refresh"])) {
                // Clear displayed data by unsetting the session variable
                unset($_SESSION['result']);
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

    <div class="button-containert">
        <form action="" method="post">
            <button type="submit" name="refresh" class="btn-refresh">Refresh</button>
        </form>
    </div>



</body>

</html>
