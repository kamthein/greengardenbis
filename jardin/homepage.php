<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Jardins home</title>
  <link href="stylehome.css" rel="stylesheet">
</head>






<body>





<?php

require 'dbConfig.php'; 


session_start();



if(!empty($_GET['code'])){

    
    $code=$_GET['code'];
    $_SESSION["code"]=$code;

}

$sql = "SELECT nickname, code FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

if($row["code"]==$code){
    $nickname=$row["nickname"];
}

//echo " - Name: " . $row["nickname"]. " " . $row["password"]. "<br>";
}
} else {
echo "0 results";
}
$conn->close();




echo "bienvenue ".$nickname. " !";

echo '<a href="affichageprofil.php?code='.$code.'">Afficher profil</a>';

?>

<?php
 require 'dbConfig.php'; 
  // Get image data from database 
  $result2 = $conn->query("SELECT image, code, codephoto FROM images ORDER BY id DESC"); 
  ?>
  
  <!-- Display images with BLOB data from database -->
  <?php if($result2->num_rows > 0){ ?> 
      <div class="gallery"> 
          <?php while($row2 = $result2->fetch_assoc()){               if($row2['code']==$code&&$row2['codephoto']=='home'){ ?> 
              <img  width="100" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row2['image']); ?> " /> 
          <?php  }     } ?> 
      </div> 
  <?php }else{ ?> 
      <p class="status error">Image(s) not found...</p> 
  <?php } ?>


<a href="ajouterplantationone.php">Ajouter une plantation</a>

<a href="ajouterdepenseone.php">Ajouter une depense</a>

<a href="ajouterparcelleone.php">Ajouter une parcelle</a>

<a href="ajoutertraitementone.php">Ajouter un traitement</a>

<a href="ajouternoteone.php">Ajouter une note</a>

<a href="calendar2.php">Calendrier</a>

<br>
<br>
<br>
<br>


<hr>


<p>Parcelles:</p>

<table>

<tr id="parcellehead">
  <td>
    image
  </td>
  <td>
    nom
  </td>
  <td>
    description
  </td>
  <td>
    exposition
  </td>
  <td>
    date crée
  </td>


  </tr>

<?php

require 'dbConfig.php'; 

$sql2 = "SELECT code, name, description, expositionId, created_at, updated_at, Exposition, codeimgparcelle FROM parcelle, exposition WHERE code='$code' AND exposition.Id= parcelle.expositionId";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
  // output data of each row
  while($row = $result2->fetch_assoc()) {

/* if($row["code"]==$code){ */




  require 'dbConfig.php'; 
  // Get image data from database 
  $result3 = $conn->query("SELECT image, code, codephoto FROM images ORDER BY id DESC"); 
  ?>
  


<tr>
<td>

  <!-- Display images with BLOB data from database -->
  <?php if($result3->num_rows > 0){ ?> 
      <div class="gallery"> 
          <?php while($row2 = $result3->fetch_assoc()){               if($row2['code']==$code&&$row['codeimgparcelle']==$row2['codephoto']){ ?> 
              <img  width="100" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row2['image']); ?> " /> 
          <?php  }     } ?> 
      </div> 
  <?php }else{ ?> 
      <p class="status error">Image(s) not found...</p> 
  <?php } 

?>
</td>

<td>
<?php
  
   
 
  echo $row["name"];
  ?>
  </td>
  
  <td>
  <?php


echo $row["description"];
?>
</td>

<td>
<?php


echo $row["Exposition"];

?>
</td>

<td>
<?php

echo $row["created_at"];

?>
</td>



<td>



 <a href="parcellesuppr.php?name=<?php echo $row["name"]?>& imgid=<?php echo $row["codeimgparcelle"]?>"><img src="cross.jpg" alt="pen" width="20"/> </a>
 
  </td>

</tr>


<?php
    echo "<br>";

   

}


}
/* } */ else {
//echo "0 results";
}
$conn->close();



?>

</table>








<hr>


<p>Depenses:</p>

<table>

<tr id="parcellehead">
  <td>
    image
  </td>
  <td>
    produit
  </td>
  <td>
    prix
  </td>
  <td>
    quantité
  </td>
  <td>
    description
  </td>
  <td>
    type
  </td>
  <td>
    date
  </td>
  <td>
    parcelle
  </td>

  </tr>

<?php

require 'dbConfig.php'; 

$sql2 = "SELECT produit, prix, quantite, description, typ, created, code, parcellename, depphotocode FROM depenses, type WHERE code='$code' AND type.Id= depenses.type";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
  // output data of each row
  while($row = $result2->fetch_assoc()) {



    
    require 'dbConfig.php'; 
     // Get image data from database 
     $result3 = $conn->query("SELECT image, code, codephoto FROM images ORDER BY id DESC"); 
     ?>
     

<tr>

<td>


     
     <!-- Display images with BLOB data from database -->
     <?php if($result3->num_rows > 0){ ?> 
         <div class="gallery"> 
             <?php while($row2 = $result3->fetch_assoc()){               if($row2['code']==$code&&$row['depphotocode']==$row2['codephoto']){ ?> 
                 <img  width="100" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row2['image']); ?> " /> 
             <?php  }     } ?> 
         </div> 
     <?php }else{ ?> 
         <p class="status error">Image(s) not found...</p> 
     <?php } 

?>
</td>

<td>
<?php




/* if($row["code"]==$code){ */
   
  
  echo $row["produit"];

  ?>
  </td>
  
  <td>
  <?php


echo $row["prix"];

?>
</td>

<td>
<?php


echo $row["quantite"];

?>
</td>

<td>
<?php


echo $row["description"];

?>
</td>

<td>
<?php



echo $row["typ"];

?>
</td>

<td>
<?php


echo $row["created"];

?>
</td>

<td>
<?php


echo $row["parcellename"];

?>
</td>

<td>
<a href="depensesuppr.php?name=<?php echo $row["description"]?>&imgid=<?php echo $row["depphotocode"]?>"><img src="cross.jpg" alt="pen" width="20"/> </a>
</td>
</tr>

<?php
    echo "<br>";
   
   

}


}
/* } */ else {
//echo "0 results";
}
$conn->close();



?>

</table>



<hr>


<p>Plantation:</p>


<table>

<tr id="parcellehead">
  <td>
    edit
  </td>
  <td>
    photo
  </td>
  <td>
    description
  </td>
  <td>
    aliment
  </td>
  <td>
    quantité
  </td>
  <td>
    etat
  </td>
  <td>
    parcelle
  </td>
  <td>
    date planté
  </td>

  <td>
    date mise à jour
  </td>

  <td>
   recolter
  </td>

  </tr>

<tr>

<?php

require 'dbConfig.php'; 


$sql2 = "SELECT description, consommableId, quantity, state, parcelleId, create_at, updated_at, plantphotocode, name, state FROM plantation, produits, etat WHERE code='$code' AND produits.id= plantation.consommableId AND etat.Id= plantation.etatplant";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
  // output data of each row
  while($row = $result2->fetch_assoc()) {

    $des=$row["description"];
    ?><td>
      
    <a href="modifplantation.php?description=<?php echo $des?>&aliment=<?php echo $row["name"]?>"><img src="pencil.jpg" alt="pen" width="20"/> </a>
    </td>
    <td>
    <?php
  
  
  
    
    require 'dbConfig.php'; 
     // Get image data from database 
     $result3 = $conn->query("SELECT image, code, codephoto FROM images ORDER BY id DESC"); 
     ?>
     
     <!-- Display images with BLOB data from database -->
     <?php if($result3->num_rows > 0){ ?> 
         <div class="gallery"> 
             <?php while($row2 = $result3->fetch_assoc()){               if($row2['code']==$code&&$row['plantphotocode']==$row2['codephoto']){ ?> 
                 <img  width="100" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row2['image']); ?> " /> 
             <?php  }     } ?> 
         </div> 
     <?php }else{ ?> 
         <p class="status error">Image(s) not found...</p> 
     <?php } 







/* if($row["code"]==$code){ */

  

   ?>
  </td>
  <td>
  <?php
  

 
  echo $row["description"];

  ?>
</td>
<td>
  <?php


echo $row["name"];

?>
</td>
<td>
  <?php


echo $row["quantity"];

?>
</td>
<td>
  <?php


echo $row["state"];

?>
</td>
<td>
  <?php



echo $row["parcelleId"];

?>
</td>
<td>
  <?php


echo $row["create_at"];

?>
</td>
<td>
  <?php


echo $row["updated_at"];

?>
</td>
<td>
  <?php

?>
 <a href="recolte.php?description=<?php echo $row["description"]?>& parcelle=<?php echo $row["parcelleId"]?>& consoId=<?php echo $row["consommableId"]?>& quanti=<?php echo $row["quantity"]?>&aliment=<?php echo $row["name"]?>"><img src="shovel.jpg" alt="pen" width="20"/> </a>
  <?php

?>
</td>

 

<td>
<a href="plantationsuppr.php?name=<?php echo $row["description"]?>&imgid=<?php echo $row["plantphotocode"]?>"><img src="cross.jpg" alt="pen" width="20"/> </a>
</td>
</tr>


    
      <?php
   

}
?>
</table>
<?php
}
/* } */ else {
//echo "0 results";
}
$conn->close();

?>

<hr>
<p>Traitement:</p>


<table>



<tr id="parcellehead">
  
  <td>
    photo
  </td>
  <td>
    description
  </td>
  <td>
    aliment
  </td>
  <td>
    type
  </td>
 
  <td>
    parcelle
  </td>
  <td>
    date crée
  </td>

 

  

  </tr>

<tr>

<?php

require 'dbConfig.php'; 


$sql2 = "SELECT description, Idparcelle, createdat, updateat, typ, name, traitphotocode FROM traitement, produits, type WHERE code='$code' AND produits.id= traitement.consommation  AND type.Id= traitement.type";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
  // output data of each row
  while($row = $result2->fetch_assoc()) {

/* if($row["code"]==$code){ */


?>
<tr>
<td>
<?php


  require 'dbConfig.php'; 
  // Get image data from database 
  $result3 = $conn->query("SELECT image, code, codephoto FROM images ORDER BY id DESC"); 
  ?>
  
  <!-- Display images with BLOB data from database -->
  <?php if($result3->num_rows > 0){ ?> 
      <div class="gallery"> 
          <?php while($row2 = $result3->fetch_assoc()){               if($row2['code']==$code&&$row['traitphotocode']==$row2['codephoto']){ ?> 
              <img  width="100" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row2['image']); ?> " /> 
          <?php  }     } ?> 
      </div> 
  <?php }else{ ?> 
      <p class="status error">Image(s) not found...</p> 
  <?php } 





?>
</td>
<td>
<?php







   
  
  echo $row["description"];

  ?>
  </td>
  <td>
  <?php


echo $row["name"];

?>
</td>
<td>
<?php


echo $row["typ"];


?>
</td>
<td>
<?php

echo $row["Idparcelle"];

?>
</td>
<td>
<?php


echo $row["createdat"];

?>
</td>


<td>
<a href="traitementsuppr.php?name=<?php echo $row["description"]?>&imgid=<?php echo $row["traitphotocode"]?>"><img src="cross.jpg" alt="pen" width="20"/> </a>
</td>

    </tr>
    
    <?php

}


}
/* } */ else {
//echo "0 results";
}
$conn->close();

?>
</table>

<?php
?>


<hr>
<p>Recolte:</p>

<table>

<tr id="parcellehead">

<td>
    photo
  </td>
  
  <td>
    aliment
  </td>
  <td>
    methode
  </td>
 
  <td>
    poid
  </td>

  <td>
   quantité
  </td>
  <td>
    Prix par kg
  </td>
  <td>
    Parcelle
  </td>
  <td>
    date crée
  </td>

  

  

  </tr>

<?php

require 'dbConfig.php'; 


$sql2 = "SELECT * FROM recolte, produits, methode WHERE code='$code' AND produits.id= recolte.conso AND methode.Id=recolte.methode";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
  // output data of each row
  while($row = $result2->fetch_assoc()) {

/* if($row["code"]==$code){ */
   
  ?>
  <tr>
  <td>
  <?php



  require 'dbConfig.php'; 
  // Get image data from database 
  $result3 = $conn->query("SELECT image, code, codephoto FROM images ORDER BY id DESC"); 
  ?>
  
  <!-- Display images with BLOB data from database -->
  <?php if($result3->num_rows > 0){ ?> 
      <div class="gallery"> 
          <?php while($row2 = $result3->fetch_assoc()){               if($row2['code']==$code&&$row['recolteimgcode']==$row2['codephoto']){ ?> 
              <img  width="100" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row2['image']); ?> " /> 
          <?php  }     } ?> 
      </div> 
  <?php }else{ ?> 
      <p class="status error">Image(s) not found...</p> 
  <?php } 









?>
</td>
<td>
<?php








echo $row["name"];

?>
</td>
<td>
<?php


echo $row["method"];

?>
</td>
<td>
<?php


echo $row["qtygramme"];
echo " grammes ";

?>
</td>
<td>
<?php


echo $row["qtypiece"];

?>
</td>
<td>
<?php


echo $row["prixparkg"];
echo " euros ";

?>
</td>
<td>
<?php


echo $row["parcelleId"];

?>
</td>
<td>
<?php


echo $row["created_at"];

?>
</td>



<td>
<a href="recoltesuppr.php?name=<?php echo $row["description"]?>&poid=<?php echo $row["qtygramme"]?>&imgid=<?php echo $row["recolteimgcode"]?>"><img src="cross.jpg" alt="pen" width="20"/> </a>
</td>



  </tr>
<?php


    

   

}


}



 else {
//echo "0 results";
}
$conn->close();

?>
</table>
<?php

?>


<hr>

<p>Note:</p>

<table>

<tr id="parcellehead">

<td>
    photo
  </td>
  
  <td>
    aliment
  </td>
  <td>
    description
  </td>
 

  <td>
    Parcelle
  </td>
  <td>
    date crée
  </td>

 

  

  </tr>


<?php

require 'dbConfig.php'; 


$sql2 = "SELECT * FROM note, produits WHERE code='$code' AND produits.id= note.productsconso";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
  // output data of each row
  while($row = $result2->fetch_assoc()) {

    ?>
    <tr>
    <td>
    <?php
    require 'dbConfig.php'; 
    // Get image data from database 
    $result3 = $conn->query("SELECT image, code, codephoto FROM images ORDER BY id DESC"); 
    ?>
    
    <!-- Display images with BLOB data from database -->
    <?php if($result3->num_rows > 0){ ?> 
        <div class="gallery"> 
            <?php while($row2 = $result3->fetch_assoc()){               if($row2['code']==$code&&$row['imgcodenote']==$row2['codephoto']){ ?> 
                <img  width="100" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row2['image']); ?> " /> 
            <?php  }     } ?> 
        </div> 
    <?php }else{ ?> 
        <p class="status error">Image(s) not found...</p> 
    <?php } 
  


  ?>
  </td>
  <td>
  <?php
   



echo $row["name"];

?>
</td>
<td>
<?php



echo $row["descriptionnote"];

?>
</td>
<td>
<?php


echo $row["parcellenote"];

?>
</td>
<td>
<?php


echo $row["createnote"];

?>
</td>



<td>
<a href="notesuppr.php?name=<?php echo $row["descriptionnote"]?>&imgid=<?php echo $row["imgcodenote"]?>"><img src="cross.jpg" alt="pen" width="20"/> </a>
</td>


    </tr>
<?php


  

   

}


}
/* } */ else {
//echo "0 results";
}
$conn->close();
?>
</table>








</body>


</html>