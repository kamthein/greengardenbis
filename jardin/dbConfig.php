<?php
$servername = "host-1";
$username = "root";
$password = "root";
$dbname = "jardin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
?>