<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Jardins depenses</title>

</head>






<body>

<?php




session_start();





$code=$_SESSION['code'];



?>

<?php

  if(isset($_GET['codephoto'])) {
    $photocode=$_GET['codephoto'];
    }else{
      $photocode='none';
    } 

?>




<form action="ajouterdepensetwo.php" method="get" class="form-example">
     <div id="finputs">
      
     <input type="hidden" id="name" name="photoid" value="<?php echo $photocode;?>">
     

      <input type="text" id="name" name="produit" placeholder="PRODUITS" required minlength="2" maxlength="30" size="30">
      <input type="text" id="name" name="prix" placeholder="PRIX" required minlength="1" maxlength="30" size="30">
      <input type="text" id="name" name="quantite" placeholder="QUANTITÉ" required minlength="1" maxlength="30" size="30">

      <textarea id="description" name="description" rows="5" cols="33">

</textarea>


      <select name="type" id="pet-select">
  <option value="">--Type--</option>
  <option value="1">Construction</option>
  <option value="2">Système d'arrosage</option>
  <option value="3">Paillage</option>
  <option value="4">Enrichissement sol</option>
  <option value="5">Graines</option>
  <option value="6">Plantons</option>
  <option value="7">Outils</option>
 
</select>


<input type="date" id="start" name="trip-start" value="2024-03-22"  />



<select name="parcelleid" id="pet-select">






<option value="<?php echo 'toute parcelle'; ?>" ><?php

echo 'toute parcelle';    


?>

</option>


<?php





require 'dbConfig.php'; 

$sql = "SELECT name FROM parcelle WHERE code='$code'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    ?>  <option value="<?php echo $row["name"]; ?>" ><?php

echo $row["name"];    


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



  <?php 




$code=$_SESSION["code"];








if(!empty($_GET['produit'])){

    $prod=$_GET['produit'];
    $prix=$_GET['prix'];
    $quantite=$_GET['quantite'];
    $description=$_GET['description'];
    $type=$_GET['type'];
    $parcelleid=$_GET['parcelleid'];
    $created=$_GET['trip-start'];

    $photocode=$_GET['photoid'];

   $description=trim($description);


   $codenamedep =  substr(sha1(mt_rand()),17,10);
    /* if(isset($_GET['codephoto'])) {
    $photocode=$_GET['codephoto'];
    }else{
      $photocode='none';
    } */
    //$created=date('Y-m-d H:i:s');


    require 'dbConfig.php'; 



$sql = "INSERT INTO depenses (produit, prix, quantite, description, type, created, code, parcellename, depphotocode, namecode) 
VALUES ('$prod', '$prix', '$quantite', '$description','$type', '$created', '$code', '$parcelleid', '$photocode', '$codenamedep')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  // header('Location: homepage.php?user='.$nickname);
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}






$conn->close();


require 'dbConfig2.php'; 





$sql = "INSERT INTO events (name, description, start, end, code, typaction, codename) 
VALUES ('$prod', '$description', '$created', '$created', '$code', 'Depense', '$codenamedep')";

if ($conn2->query($sql) === TRUE) {
  echo "New record created successfully";
   header('Location: homepage.php?code='.$code);
} else {
  echo "Error: " . $sql . "<br>" . $conn2->error;
}






$conn2->close();




}






?>







<script>document.getElementById('start').valueAsDate = new Date();</script>






</body>




</html>