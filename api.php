<?php
// phpinfo();
$hostname = 'localhost:3306';
$username = 'root';
$password = 'development';
$database = 'php_assignment';

// Create a MySQLi connection
$mysqli = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

echo "Connected successfully";

// ... (perform database operations)

// Close the connection when done
$mysqli->close();