
<?php



$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tutocalendar";
    
    // Create connection
    $conn2 = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn2->connect_error) {
      die("Connection failed: " . $conn2->connect_error);
    } 


    ?>