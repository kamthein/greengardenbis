<?php
require 'dbConfig.php'; 

if(!empty($_GET['email'])){

$email=$_GET['email'];
$password=$_GET['password'];
$nickname=$_GET['user'];
$age=$_GET['year'].'-'.$_GET['mois'].'-'.$_GET['jour'];
$tel=$_GET['tel'];
$surface=$_GET['surface'];
$isverified=0;
//$lastconnexion=1;
$resttoken=1;
$flagtoken=1;
$localisation=$_GET['localisation'];
$created_at=date('l jS \of F Y h:i:s A');
$str =  substr(sha1(mt_rand()),17,10);


$i=0;




$sql3 = "SELECT email, nickname FROM user";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
  // output data of each row
  while($row3 = $result3->fetch_assoc()) {

if($row3["nickname"]== $nickname){
    echo "Pseudo existe dejà";
    $i=1;
    header('Location: createuser.php?user=already');

}

if($row3["email"]== $email){
  echo "votre email existe dejà";
  $i=1;
  header('Location: createuser.php?user=mailalready');

}


  }
}




if($i==0){

$sql = "INSERT INTO user  (email, password, nickname, age, phone, surfaceId, is_verified, last_connexion, reset_token, flag_token, localisation, created_at, code) 
VALUES ('$email', '$password', '$nickname', '$age','$tel','$surface','$isverified','$created_at', '$resttoken','$flagtoken','$localisation','$created_at', '$str')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
   header('Location: homepage.php?code='.$str);
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


}



$conn->close();



}

require 'contact.php';

?>