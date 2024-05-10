
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Vente</title>

</head>






<body>




<form action="vente.php" method="get" class="form-example">

<select name="produits" id="pet-select">
  <option value="">--produits--</option>


<?php
require 'dbConfig.php'; 
$i=1;
$sql = "SELECT name FROM produits";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    ?>  <option value="<?php echo $i; ?>" ><?php

echo $row["name"]; 

$sql2 = "SELECT * FROM recolte";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
  // output data of each row
  while($row2 = $result2->fetch_assoc()) {

    if($row2["conso"]==$i&&$row2["qtygramme"]>0){
        echo ' -- Disponible';
    }

    
  }
}
$i++;

  }
}
?>

</option>
 
</select>


<input type="submit" id="subbut" value="select produit">


</form>
<?php
if(!empty($_GET['produits'])){

 $cons= $_GET['produits'];



  $sql = "SELECT * FROM recolte WHERE conso='$cons'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

 
if($row["qtygramme"]>0)
{

// Get image data from database 
$result2 = $conn->query("SELECT image, code, codephoto FROM images ORDER BY id DESC"); 
?>

<!-- Display images with BLOB data from database -->
<?php if($result2->num_rows > 0){ ?> 
    <div class="gallery"> 
        <?php while($row2 = $result2->fetch_assoc()){               if($row2['codephoto']==$row['recolteimgcode']){ ?> 
            <img  width="270" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row2['image']); ?> " /> 
        <?php  }     } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } 

echo 'description: '; 
echo $row["description"]; 
echo '<br>Poids: ';   
echo $row["qtygramme"]/1000;
echo 'kg <br>prix par kg: ';
echo $row["prixparkg"];
echo ' euros <br>';

$cod=$row["code"];

$sql = "SELECT * FROM user WHERE code='$cod'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

   echo 'pseudo: '; 
echo $row["nickname"]; 
echo '<br>mail: ';
echo $row["email"]; 



?>
<br>
<a href="ventetoututi.php?cod=<?php echo $row['code']?>">Tous les produits de l'utilisateur</a>


<?php




echo '<hr>';



  }
}
}


}
}






}


?>


</body>


</html>