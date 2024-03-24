<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to MySQL database (replace with your database credentials)
    include 'config.php';

    // Initialize variables to store form data
    $eventName = $_POST['event_name'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $numPeople = $_POST['num_people'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO event_details (event_name, location, description, num_people) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $eventName, $location, $description, $numPeople);

    // Execute SQL statement
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Redirect back to form
    header("Location: index.php");
    exit();
}
?>
