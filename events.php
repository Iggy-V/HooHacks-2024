<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Listings</title>
    <style>
        /* Add your CSS styles here */
        .event-block {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .event-block h2 {
            margin-top: 0;
        }
        .event-block p {
            margin-bottom: 10px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Event Listings</h1>
        <?php
        // Connect to your database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "events";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve event data from the database
        $sql = "SELECT * FROM event_details";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                // Display event information in formatted blocks
                echo "<div class='event-block'>";
                echo "<h2>" . $row["event_name"] . "</h2>";
                echo "<p><strong>Location:</strong> " . $row["location"] . "</p>";
                echo "<p><strong>Date:</strong> " . $row["date"] . "</p>";
                echo "<p><strong>Description:</strong> " . $row["description"] . "</p>";
                echo "<a href='#' class='btn'>Sign Up</a>";
                echo "</div>";
            }
        } else {
            echo "No events found.";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
