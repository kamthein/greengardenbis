<?php

require 'dbConfig.php'; 


session_start();




    $code=$_SESSION["code"];
    echo $code;
/* $surface=$_GET["surface"];
$nickname=$_GET["nickname"];
$description=$_GET["story"];
$created_at=date('l jS \of F Y h:i:s A');
$updated_at=date('l jS \of F Y h:i:s A');

    $sql = "INSERT INTO parcelle (code, name, description, expositionId,  created_at, updated_at) 
    VALUES ('$code', '$nickname', '$description', '$surface',  '$created_at', '$updated_at')";
    
    if ($conn->query($sql) === TRUE) {
        
      echo "New record created successfully";
      
       //header('Location: homepage.php?code='.$code);
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
    
    
    
    
    $conn->close(); */


    $descrip2=$_GET["story"];
    $descrip=trim($descrip2);
$conso=$_GET["nameconso"];
$quanti=$_GET["quantity"];
$etat=$_GET["etat"];
//$surface=$_GET["surface"];
$parcelle=$_GET["parcelleid"];

    require 'dbConfig.php'; 

    $created_at=$_GET["trip-start"];
$updated_at=$_GET["trip-start"];
$photocode=$_GET['photoid'];

$codenameplant =  substr(sha1(mt_rand()),17,10);

    $sql = "INSERT INTO plantation (code, description, consommableId, quantity, etatplant, parcelleId, create_at, updated_at, plantphotocode, plantnamecode) 
    VALUES ('$code', '$descrip', '$conso', '$quanti','$etat', '$parcelle', '$created_at', '$updated_at', '$photocode', '$codenameplant')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
     
       //header('Location: homepage.php?code='.$code);
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
 

    $conn->close();




    require 'dbConfig2.php'; 
    
    
    
    
    
    $sql = "INSERT INTO events (name, description, start, end, code, typaction, codename) 
    VALUES ('$descrip', '$descrip', '$created_at', '$created_at', '$code', 'Plantation', '$codenameplant')";
    
    if ($conn2->query($sql) === TRUE) {
      echo "New record created successfully";
       header('Location: homepage.php?code='.$code);
    } else {
      echo "Error: " . $sql . "<br>" . $conn2->error;
    }
    
    
    
    
    
    
    $conn2->close();








    ?>