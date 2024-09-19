<?php
// Database connection details
$servername = "localhost"; // Change to your server's name
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "login"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Successfully ";
// Get form data
$email = $_POST['email'];
$query_type = $_POST['query_type'];
$is_member = isset($_POST['is_member']) ? 1 : 0; // Checkbox value
$is_professor = isset($_POST['is_professor']) ? 1 : 0; // Checkbox value
$is_coder = isset($_POST['is_coder']) ? 1 : 0; // Checkbox value
$self_description = $_POST['self_description'];
$elaborate_concern = $_POST['elaborate_concern'];

// SQL query to insert the data
$sql = "INSERT INTO contacts (email, query_type, is_member, is_professor, is_coder, self_description, elaborate_concern)
VALUES ('$email', '$query_type', '$is_member', '$is_professor', '$is_coder', '$self_description', '$elaborate_concern')";

if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
