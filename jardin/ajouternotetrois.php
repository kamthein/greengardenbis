<?php 

session_start();
$code=$_SESSION["code"];


if(!empty($_GET['description'])){

   
    $description=$_GET['description'];
    $description=trim($description);
   
    $parcelleid=$_GET['parcelleid'];
    $aliment=$_GET['nameconso'];
    $created=$_GET["trip-start"];



    require 'dbConfig.php'; 
$imgcode=$_GET["photoid"];


$sql = "INSERT INTO note (code, productsconso, descriptionnote, parcellenote, createnote, updatenote, imgcodenote) 
VALUES ('$code', '$aliment','$description', '$parcelleid', '$created','$created', '$imgcode')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
 header('Location: homepage.php?code='.$code);
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}






$conn->close();


}


?>