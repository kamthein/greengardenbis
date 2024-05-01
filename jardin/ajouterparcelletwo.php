<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>ajouter parcelle</title>

</head>






<body>

<?php

session_start();

$code=$_SESSION["code"];


?>




<?php

  if(isset($_GET['codephoto'])) {
    $photocode=$_GET['codephoto'];
    }else{
      $photocode='none';
    } 

?>

<form action="createparcelle.php" method="get" class="form-example">
     <div id="finputs">

     <input type="hidden" id="name" name="photoid" value="<?php echo $photocode;?>">

     <input type="date" id="start" name="trip-start" value="2024-03-22"  />

     <input type="text" id="nickname" name="nickname" placeholder="NOM DE LA PARCELLE" required minlength="2" maxlength="30" size="30">

     <label for="story">Description:</label>
<textarea id="story" name="story" rows="5" cols="33">

</textarea>



<select name="parcelle" id="pet-select">

<?php


require 'dbConfig.php'; 


$sql = "SELECT Id, Exposition FROM exposition";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    ?>  <option value="<?php echo $row["Id"]; ?>" >
    
    <?php

echo $row["Exposition"];    


?>

</option>
<?php
}
} else {
echo "0 results";
}
$conn->close();



?>










<input type="submit" id="subbut" value="ENVOYER">

</div>



<script>document.getElementById('start').valueAsDate = new Date();</script>




</body>

</html>