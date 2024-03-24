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
    
    // Retrieve form data
    $event_name = $_POST['event_name'];
    $location = $_POST['location'];
    $event_date = $_POST['event_date'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $num_people = $_POST['num_people'];
    
    // SQL query to insert data into database
    $sql = "INSERT INTO event_details (event_name, location, event_date, category, description, num_people)
            VALUES ('$event_name', '$location', '$event_date', '$category', '$description', '$num_people')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
header("Location: index.php");
exit();
    ?>
    
