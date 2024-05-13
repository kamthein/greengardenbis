
<?php

require 'dbConfig.php'; 


session_start();

    $code=$_SESSION["code"];

$name=$_GET["nickname"];
$descrip=$_GET["story"];

$expo=$_GET["parcelle"];

$photocode=$_GET['photoid'];

    require 'dbConfig.php'; 

    $created_at=$_GET['trip-start'];
$updated_at=$_GET['trip-start'];


    $sql = "INSERT INTO parcelle (code, name, description, expositionId, created_at, updated_at, codeimgparcelle) 
    VALUES ('$code', '$name', '$descrip','$expo' , '$created_at', '$updated_at', '$photocode')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
     
       header('Location: homepage.php?code='.$code);
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
 


    ?>