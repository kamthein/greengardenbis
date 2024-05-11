<form action="nouvellesurface.php" method="get" class="form-example">
     <div id="finputs">
      
     <select name="surface" id="pet-select">
  <option value="">--Taille du terrain--</option>
  <option value="1">Intérieur</option>
  <option value="2">Balcon 0 - 5m2</option>
  <option value="3">Terrasse 5 - 10m2</option>
  <option value="4">Jardin > 10m2</option>
 
</select>
      <input type="submit" id="subbut" value="ENVOYER">
  </div>






  <?php

if(!empty($_GET['surface'])){

    $surface=$_GET['surface'];

// Include the database configuration file  
require 'dbConfig.php'; 



session_start();


$code=$_SESSION["code"];

echo $code;
echo $surface;



$sql = "UPDATE user SET surfaceId='$surface' WHERE code='$code'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";

  header('Location: affichageprofil.php?code='.$code);
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();


}


?>