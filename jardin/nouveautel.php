<form action="nouveautel.php" method="get" class="form-example">
     <div id="finputs">
      

      <input type="text" id="name" name="tel" placeholder="TELEPHONE" required minlength="5" maxlength="15" size="10">

      <input type="submit" id="subbut" value="ENVOYER">
  </div>






  <?php

if(!empty($_GET['tel'])){

    $tel=$_GET['tel'];

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
echo $tel;



$sql = "UPDATE user SET phone='$tel' WHERE code='$code'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";

  header('Location: affichageprofil.php?code='.$code);
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();


}


?>