<?php


$code=$_GET['code'];

require 'dbConfig.php'; 



$sql = "UPDATE user SET is_verified='1' WHERE code='$code'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";

header('Location: homepage.php?code='.$code);
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();

?>