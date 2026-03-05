<?php
$servername = "localhost";
$username = "rsoa_rsoa278_20";
$password = "123456";
$dbname = "rsoa_rsoa278_20";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
