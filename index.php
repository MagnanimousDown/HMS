<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Records and Treatment</title>
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
                <button type="submit" name="treatment_procedure" class="btn">Patient Treatment Procedure</button>
            </div>
        </form>
    </div>

    <div class="wrapperb">
        <?php
        // Check if the form has been submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

            $patient_id = $_POST["patient_id"];

            if (isset($_POST["patient_records"])) {
                // Fetch and display patient records only if patient ID is provided
                if (!empty($patient_id)) {
                    $result = $conn->query("SELECT * FROM patient_report WHERE patient_id = '$patient_id'");
                    displayResults($result);
                } else {
                    echo "Please enter a valid Patient ID.";
                }
            } elseif (isset($_POST["treatment_procedure"])) {
                // Fetch and display treatment procedures only if patient ID is provided
                if (!empty($patient_id)) {
                    $result = $conn->query("SELECT * FROM medical_procedure WHERE patient_id = '$patient_id'");
                    displayResults($result);
                } else {
                    echo "Please enter a valid Patient ID.";
                }
            }

            // Close the database connection
            $conn->close();
        }

        // Function to display query results in a table
        function displayResults($result) {
            echo "<table border='1'>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>$value</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>
    </div>

</body>
</html>
