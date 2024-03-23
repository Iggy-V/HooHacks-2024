<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to MySQL database (replace with your database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "QaZWSX123!@#";
    $dbname = "events";

    echo "Name: " . $_POST['name'] . "<br>";
    echo "Email: " . $_POST['email'] . "<br>";

    echo "RUNS";
    $conn = new mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO events (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);

    // Set parameters and execute
    $name = $_POST['name'];
    $email = $_POST['email'];
    $stmt->execute();

    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Redirect back to form
    header("Location: add-event.html");
    exit();
}
?>
