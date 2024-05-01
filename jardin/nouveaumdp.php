<form action="nouveaumdp.php" method="get" class="form-example">
     <div id="finputs">
      

      <input type="password" id="name" name="password" placeholder="MOT DE PASSE" required minlength="5" maxlength="50" size="10">

      <input type="submit" id="subbut" value="ENVOYER">
  </div>






  <?php

if(!empty($_GET['password'])){

    $pass=$_GET['password'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jardin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 



session_start();


$code=$_SESSION["code"];

echo $code;
echo $pass;



$sql = "UPDATE user SET password='$pass' WHERE code='$code'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";

  header('Location: affichageprofil.php?code='.$code);
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();






}


?>
