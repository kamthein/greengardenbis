<?php 


session_start(); 

$code=$_SESSION["code"];


$addpic=$_GET["add"];

require_once 'dbConfig.php'; 


$sql = "DELETE FROM images WHERE code='$code' AND codephoto='$addpic'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header('Location: addpicture.php?add='.$addpic);
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close(); 



?>