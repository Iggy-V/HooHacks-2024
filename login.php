<?php
session_start();

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
    $user = $_POST['username'];
    $pass = $_POST['password'];
    
    // SQL query to fetch user data based on username
    $sql = "SELECT * FROM your_table_name WHERE username='$user'";
    echo "SQL: " . $sql . "<br>"; // Debugging statement
    $result = $conn->query($sql);
    
    if ($result === FALSE) {
        echo "Error: " . $conn->error; // Debugging statement
    }
    
    if ($result->num_rows == 1) {
        // User found, check password
        $row = $result->fetch_assoc();
        if ($pass == $row['password']) {
            // Password matches, redirect to index.php
            $_SESSION['username'] = $user; // Store username in session for future use
            header("Location: index.php");
            exit();
        } else {
            // Incorrect password, redirect back to log-in.html
            header("Location: log-in.html");
            exit();
        }
    } else {
        // User not found, redirect back to log-in.html
        header("Location: log-in.html");
        exit();
    }
    
    $conn->close();
}
?>
