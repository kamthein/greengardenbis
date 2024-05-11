
<?php



$servername = "host-1";
    $username = "root";
    $password = "root";
    $dbname = "tutocalendar";
    
    // Create connection
    $conn2 = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn2->connect_error) {
      die("Connection failed: " . $conn2->connect_error);
    } 


    ?>