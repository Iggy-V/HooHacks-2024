<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to MySQL database (replace with your database credentials)
    include 'config.php';

    // Database connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare an SQL statement
    $stmt = $conn->prepare("INSERT INTO event_details (event_name, location, event_date, category, description, num_people) VALUES (?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("sssssi", $event_name, $location, $event_date, $category, $description, $num_people);

    // Retrieve form data
    $event_name = $_POST['event_name'];
    $location = $_POST['location'];
    $event_date = $_POST['event_date'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $num_people = $_POST['num_people'];
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
    
    // Redirect to index.php
    header("Location: index.php");
    exit();
}
?>
