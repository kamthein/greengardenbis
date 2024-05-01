<?php

session_start();

$name=$_GET['name'];

$code=$_SESSION['code'];

require 'dbConfig.php'; 




 
$sql = "DELETE FROM parcelle WHERE name='$name'";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
   
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }

$conn->close(); 


require 'dbConfig.php'; 



if(!empty($_GET['imgid'])){

    $image=$_GET['imgid'];

    $sql = "DELETE FROM images WHERE codephoto='$image'";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    header('Location: homepage.php?code='.$code);
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }

$conn->close(); 

}
else{
    echo 'out';
    header('Location: homepage.php?code='.$code);
}





?>