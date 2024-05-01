<?php 


session_start();

$code=$_SESSION["code"];








if(!empty($_GET['description'])){

   
    $description=$_GET['description'];
    $description=trim($description);
    $type=$_GET['type'];
    $parcelleid=$_GET['parcelleid'];
    $aliment=$_GET['nameconso'];
    $created=$_GET["trip-start"];

    $photocode=$_GET['photoid'];

    $codenametrait =  substr(sha1(mt_rand()),17,10);


    require 'dbConfig.php'; 



$sql = "INSERT INTO traitement (code, description, consommation, type, Idparcelle, createdat, updateat, traitphotocode, traitcode) 
VALUES ('$code', '$description','$aliment','$type', '$parcelleid', '$created','$created', '$photocode', '$codenametrait')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  // header('Location: homepage.php?user='.$nickname);
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}






$conn->close();






require 'dbConfig2.php'; 





$sql = "INSERT INTO events (name, description, start, end, code, typaction, codename) 
VALUES ('$description', '$description', '$created', '$created', '$code', 'Traitement', '$codenametrait')";

if ($conn2->query($sql) === TRUE) {
  echo "New record created successfully";
   header('Location: homepage.php?code='.$code);
} else {
  echo "Error: " . $sql . "<br>" . $conn2->error;
}






$conn2->close();


}





?>