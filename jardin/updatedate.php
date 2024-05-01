<?php



require_once 'dbConfig.php'; 


session_start();



$code=$_SESSION["code"];

$created_at=date('l jS \of F Y h:i:s A');



$sql = "UPDATE user SET last_connexion='$created_at' WHERE code='$code'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";

  header('Location: affichageprofil.php?code='.$code);
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();





?>