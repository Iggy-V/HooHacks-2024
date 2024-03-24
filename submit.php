<?php
// Check if form is submitted
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if image file is uploaded
   // Check if image file is uploaded
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        // Specify directory to store uploaded images
        $target_dir = "uploads/";

        // Generate a unique filename to prevent overwriting
        $target_file = $target_dir . uniqid() . '_' . basename($_FILES["image"]["name"]);

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // File uploaded successfully, set the image path
            $image_path = $target_file;
        } else {
            // Error handling if file upload fails
            echo "Sorry, there was an error uploading your file.";
            exit(); // Exit script if file upload fails
        }
    } else {
        // If no file is uploaded or there's an error, set default image path or handle accordingly
        $image_path = "uploads/default.jpg"; // Adjust as needed
    }


    // Connect to MySQL database (replace with your database credentials)
    include 'config.php';

    // Database connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare an SQL statement
    $stmt = $conn->prepare("INSERT INTO event_details (event_name, location, event_date, category, description, num_people, image_url) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("sssssis", $event_name, $location, $event_date, $category, $description, $num_people, $image_path);

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
    header("Location: index.php"); 
    exit();
}

?>
