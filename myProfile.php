<?php
session_start();

// Check if the user is logged in (username is stored in session)
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page if not logged in
    header("Location: log-in.html");
    exit();
}

// Retrieve the username from the session
$user = $_SESSION['username'];

// Connect to MySQL database (replace with your database credentials)
include 'config.php';

// Database connection
$conn = new mysqli($servername, $username, $password, $dbnametwo);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch user data based on username
$sql_user = "SELECT * FROM your_table_name WHERE username='$user'";
$result_user = $conn->query($sql_user);

if ($result_user->num_rows == 1) {
    // User found, fetch user data
    $row_user = $result_user->fetch_assoc();

    // Retrieve event IDs from the list_of_numbers column
    $event_ids = explode(',', $row_user['list_of_numbers']);

    // Query to fetch event details based on event IDs
    $events = array();

    $conn-> close();
    $conn = new mysqli($servername, $username, $password, $dbname);

    foreach ($event_ids as $event_id) {
        $sql_event = "SELECT * FROM event_details WHERE id = $event_id";
        $result_event = $conn->query($sql_event);
        if ($result_event->num_rows == 1) {
            $events[] = $result_event->fetch_assoc();
        }
    }
} else {
    // User not found or multiple users with the same username (which shouldn't happen)
    // You can handle this scenario as needed, such as displaying an error message
    echo "User not found or multiple users with the same username.";
    exit(); // Stop further execution
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <style>
        /* Add your CSS styles here */
        .container {
            max-width: 600px; /* Adjust as needed */
            margin: 0 auto; /* Center content */
            padding: 20px;
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
    <h1>Welcome to Your Profile, <?php echo $user; ?>!</h1>
    <h2>Events You Have Registered For:</h2>
    <ul>
        <?php foreach ($events as $event): ?>
                    <?php
                    echo "<container>";
                    echo "<div class='col-md-6'>";
                    echo "<div class='event-block'>";
                    echo "<h2>" . $event["event_name"] . "</h2>";
                    echo "<p><strong>Location:</strong> " . $event["location"] . "</p>";
                    echo "<p><strong>Date:</strong> " . $event["event_date"] . "</p>"; // Display event date
                    echo "<p><strong>Category:</strong> " . $event["category"] . "</p>"; // Display event category
                    echo "<p><strong>Number of People:</strong> " . $event["num_people"] . "</p>";
                    echo "<p><strong>Description:</strong> " . $event["description"] . "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</container>";
                    // If the current count is odd, close the row and start a new one
                   
                    ?>
        <?php endforeach; ?>
    </ul>
</body>
</html>
