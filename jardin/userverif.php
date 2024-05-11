<?php
// Include the database configuration file  
require 'dbConfig.php'; 


if(!empty($_GET['user'])){

    $password=$_GET['motdepasse'];
    $nickname=$_GET['user'];

}

$i=0;


$sql = "SELECT nickname, password, code FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

if($row["nickname"]==$nickname&&$row["password"]==$password){
  $code=$row["code"];
  session_start();
  $_SESSION["code"]=$code;
  require_once 'updatedate.php'; 
    header('Location: homepage.php?code='.$code);
    echo "bienvenue ".$nickname. " !";
    $i=1;

}

    //echo " - Name: " . $row["nickname"]. " " . $row["password"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();

if($i==0){
    echo "error";
    header('Location: index.php?user=error');
}
?>