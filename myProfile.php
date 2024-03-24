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
        .container {
            margin: 50px auto; /* Center the container horizontally */
            max-width: 800px; /* Adjust as needed */
        }

        .event-block {
            border: 1px solid #00B98E;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex; /* Display as flex container */
            align-items: center; /* Align items vertically */
        }

        .event-block h2 {
            color: #00B98E;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px; /* Add margin to separate from details */
        }

        .event-details {
            flex: 1; /* Occupy remaining space */
            padding-right: 20px; /* Add padding to separate from image */
        }

        .event-details p {
            margin-bottom: 10px;
            color: #333;
        }

        .event-details img {
            max-width: 50%; /* Limit image width */
            max-height: 50%; /* Limit image height */
            height: auto; /* Maintain aspect ratio */
            float: right; /* Float the image to the right */
            margin-left: 20px; /* Add margin to separate from text */
        }
        .event-image {
            max-height: 300px; /* Restrict image height */
        }
    </style>
</head>
<body>
<h1>Welcome to Your Profile, <?php echo $user; ?>!</h1>
<h2>Events You Have Registered For:</h2>

<?php foreach ($events as $event): ?>
    <div class="container">
        <div class="event-block">
            <div class="event-details"> <!-- Wrap event details in a separate div -->
                <h2><?php echo $event["event_name"]; ?></h2>
                <p><strong>Location:</strong> <?php echo $event["location"]; ?></p>
                <p><strong>Date:</strong> <?php echo $event["event_date"]; ?></p>
                <p><strong>Category:</strong> <?php echo $event["category"]; ?></p>
                <p><strong>Number of People:</strong> <?php echo $event["num_people"]; ?></p>
                <p><strong>Description:</strong> <?php echo $event["description"]; ?></p>
            </div>
            <img src="<?php echo $event["image_url"]; ?>" alt="Event Image" style="max-height: 400px;"> <!-- Move image to the right -->
        </div>
    </div>
<?php endforeach; ?>

</body>
</html>
