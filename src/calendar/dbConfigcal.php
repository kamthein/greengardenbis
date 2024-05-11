<?php
$servername = "host-1";
$username = "root";
$password = "root";
$dbname = "tutocalendar";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 


?>