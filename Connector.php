<?php
// Database credentials
$host = 'localhost';  // usually 'localhost' if the database is on the same server
$username = 'root';
$password = '';
$database = 'execufarm';

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
echo("");
}
?>
