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
                        $sql = "SELECT pd.patient_id, pd.pfname, pd.plname, pr.disease, pr.diagnosis, mp.procedure_name, mp.procedure_desc
                                FROM patient_details pd
                                JOIN patient_report pr ON pd.patient_id = pr.patient_id
                                JOIN medical_procedure mp ON pr.patient_id = mp.patient_id
                                WHERE pd.patient_id = '$patient_id'";
                        
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
                echo "<tr><th>Patient ID</th><th>First Name</th><th>Last Name</th><th>Disease</th><th>Diagnosis</th><th>Procedure Name</th><th>Procedure Description</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["patient_id"] . "</td>";
                    echo "<td>" . $row["pfname"] . "</td>";
                    echo "<td>" . $row["plname"] . "</td>";
                    echo "<td>" . $row["disease"] . "</td>";
                    echo "<td>" . $row["diagnosis"] . "</td>";
                    echo "<td>" . $row["procedure_name"] . "</td>";
                    echo "<td>" . $row["procedure_desc"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No Records found</p>";
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
