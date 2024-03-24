<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to MySQL database (replace with your database credentials)
    include 'config.php';

    // Database connection
    $conn = new mysqli($servername, $username, $password, $dbnametwo);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Retrieve form data
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Hash the password for security
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // SQL query to insert data into database
    $sql = "INSERT INTO your_table_name (email, username, password)
            VALUES ('$email', '$username', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
header("Location: log-in.html"); // Redirect to sign-in page after sign-up
exit();
?>
