<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: login.html");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if event ID is provided
    if (!isset($_POST['id'])) {
        echo "Event ID is missing.";
        exit();
    }

    // Connect to MySQL database (replace with your database credentials)
    include 'config.php';

    // Database connection
    $conn = new mysqli($servername, $username, $password, $dbnametwo);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $event_id = $_POST['id'];
    $user = $_SESSION['username']; // Get username from session

    // SQL query to update user's list of event IDs
    $sql_check_empty = "SELECT list_of_numbers FROM your_table_name WHERE username = '$user'";
    $result = $conn->query($sql_check_empty);
    $row = $result->fetch_assoc();
    $event_ids = $row['list_of_numbers'];

    if (empty($event_ids)) {
        // If event IDs list is empty, directly add the new event ID
        $sql = "UPDATE your_table_name SET list_of_numbers = '$event_id' WHERE username = '$user'";
    } else {
        // If event IDs list is not empty, concatenate the new event ID
        $sql = "UPDATE your_table_name SET list_of_numbers = CONCAT(list_of_numbers, ',', '$event_id') WHERE username = '$user'";
    }
    if ($conn->query($sql) === TRUE) {
        echo "Event ID added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: index.php"); 
    exit();


}
?>
