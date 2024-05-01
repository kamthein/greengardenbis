<form action="nouveaupseudo.php" method="get" class="form-example">
     <div id="finputs">
      

      <input type="text" id="name" name="pseudo" placeholder="PSEUDO" required minlength="3" maxlength="15" size="10">

      <input type="submit" id="subbut" value="ENVOYER">
  </div>






  <?php

if(!empty($_GET['pseudo'])){

    $pseudo=$_GET['pseudo'];

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



$sql3 = "SELECT nickname FROM user";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
  // output data of each row
  while($row3 = $result3->fetch_assoc()) {

if($row3["nickname"]== $pseudo){
    echo "Pseudo existe dejà";
    $i=1;
    header('Location: affichageprofil.php?user="already"&code='.$code);

}




  }
}









$code=$_SESSION["code"];

echo $code;
echo $pseudo;



$sql = "UPDATE user SET nickname='$pseudo' WHERE code='$code'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";

  header('Location: affichageprofil.php?code='.$code);
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();


}


?>