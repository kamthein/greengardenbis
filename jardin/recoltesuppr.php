<?php

session_start();

$name=$_GET['name'];

$poid=$_GET['poid'];

$code=$_SESSION['code'];

require 'dbConfig.php'; 




 
$sql = "DELETE FROM recolte WHERE description='$name' AND qtygramme='$poid'";

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
    //header('Location: homepage.php?code='.$code);
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }

$conn->close(); 


}
else{
    echo 'out';
    //header('Location: homepage.php?code='.$code);
}






require 'dbConfig2.php'; 





$sql = "DELETE FROM events WHERE description='$name'";

if (mysqli_query($conn2, $sql)) {
    echo "Record deleted successfully";
   header('Location: homepage.php?code='.$code);
  } else {
    echo "Error deleting record: " . mysqli_error($conn2);
  }






$conn2->close();






?>