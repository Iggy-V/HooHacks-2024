<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        /* Add your CSS styles here */
        .container {
            max-width: 600px; /* Adjust as needed */
            margin: 0 auto; /* Center content */
            padding: 20px;
        }
            .image-container {
        max-width: 500px; /* Adjust as needed */
        max-height: 500px; /* Adjust as needed */
        overflow: hidden;
        margin-bottom: 10px; /* Add spacing between image and other content */
    }

    .image-container img {
        width: 100%; /* Ensure the image fills the container */
        height: auto; /* Maintain aspect ratio */
        display: block; /* Ensure the image behaves as a block element */
    }

        .event-block {
            border: 1px solid #00B98E;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .event-block h2 {
            margin-top: 0;
            color: #00B98E; /* Change heading color to match primary color */
            font-size: 24px; /* Increase font size */
            font-weight: bold; /* Add font weight */
        }

        .event-block p {
            margin-bottom: 10px;
            color: #333; /* Change paragraph text color */
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #00B98E; /* Primary color */
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #009c73; /* Darker shade for hover effect */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Search Results</h1>
        <div class="row">
            <?php
            // Include database connection
            include 'config.php';

            // Retrieve search criteria from the form
            $keyword = $_GET['keyword'] ?? '';
            $eventType = $_GET['eventType'] ?? '';
            $location = $_GET['location'] ?? '';

            // Construct SQL query
            $sql = "SELECT * FROM event_details WHERE 1";

            if (!empty($keyword)) {
                $sql .= " AND event_name LIKE '%$keyword%'";
            }

            if (!empty($eventType)) {
                $sql .= " AND category = '$eventType'";
            }

            if (!empty($location)) {
                $sql .= " AND location = '$location'";
            }

            // Connect to the database
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Perform the search query
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    // Display search results in formatted blocks
                    echo "<div class='col-md-6'>";
                    echo "<div class='event-block'>";
                    echo "<h2>" . $row["event_name"] . "</h2>";
                    echo "<p><strong>Location:</strong> " . $row["location"] . "</p>";
                    echo "<p><strong>Date:</strong> " . $row["event_date"] . "</p>"; // Display event date
                    echo "<p><strong>Category:</strong> " . $row["category"] . "</p>"; // Display event category
                    echo "<p><strong>Number of People:</strong> " . $row["num_people"] . "</p>";
                    echo "<p><strong>Description:</strong> " . $row["description"] . "</p>";
                    echo "<div class = 'image-container'>";
                    echo "<img src='" . $row["image_url"] . "' alt='Event Image' style='max-width: 100%; height: auto;'>";
                    echo "</div>";                    echo "<form action='eventSignUp.php' method='post'>";
                    echo "<input type='hidden' name='id' value=". $row["id"] .">"; 
                    echo "<input type='submit' value = 'RSVP'>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<div class='col-md-12'>";
                echo "<p>No events found.</p>";
                echo "</div>";
            }

            // Close database connection
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
