<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Jardins event</title>
 
</head>






<body>




<?php

require '../src/bootstrap.php';


require '../src/calendar/events.php';



$pdo=get_pdo();

$events = new calendar\Events($pdo);

if(!isset($_GET['id'])){
echo 'test';
    header('location: ../jardin/404.php'); 
}
try{
$event=$events->find($_GET['id']);
} catch(\Exception $e){
    e404();
}

require '../views/header.php';

?>

<h1><?= h($event->getName());?></h1>

<ul>

<li>Date: <?= $event->getStart()->format('d/m/Y');?></li>



<li>Description:<br>
 <?= h($event->getDescription());?></li>


<?php

$code=$_SESSION["code"];

$des=h($event->getCodename());



 require 'dbConfig.php'; 

 $sql2 = "SELECT produit, prix, quantite, description, typ, created, code, parcellename, depphotocode, namecode FROM depenses, type WHERE namecode='$des' AND code='$code' AND type.Id= depenses.type";
 $result2 = $conn->query($sql2);
 
 if ($result2->num_rows > 0) {
   // output data of each row
   while($row = $result2->fetch_assoc()) {


    
 
 /* if($row["code"]==$code){ */
  
 echo "<li>";
 echo " prix: ";
 echo $row["prix"];
 echo " euros";
 echo "</li>";
 
 echo "<li>";
 echo " quantite: ";
 echo $row["quantite"];
 echo "</li>";
 
 
 echo "<li>";
 echo " type: ";
 echo $row["typ"];
 echo "</li>";
 

 
 echo "<li>";
 echo " parcelle: ";
 echo $row["parcellename"];
 echo "</li>";
 
 
     echo "<br>";
 
    

     require 'dbConfig.php'; 
     // Get image data from database 
     $result3 = $conn->query("SELECT image, code, codephoto FROM images ORDER BY id DESC"); 
     
     ?>
     

     
     <!-- Display images with BLOB data from database -->
     <?php if($result3->num_rows > 0){ ?> 
         <div class="gallery"> 
             <?php while($row2 = $result3->fetch_assoc()){               if($row2['code']==$code&&$row['depphotocode']==$row2['codephoto']){ ?> 
                 <img  width="300" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row2['image']); ?> " /> 
             <?php  }     } ?> 
         </div> 
     <?php }else{ ?> 
         <p class="status error">Image(s) not found...</p> 
     <?php } 


 
 }
 
 
 }
 /* } */ else {
 //echo "0 results";
 }
 $conn->close();






 require 'dbConfig.php'; 


$sql2 = "SELECT * FROM plantation , produits, etat  WHERE plantnamecode='$des' AND code='$code' AND produits.id= plantation.consommableId AND etat.Id=plantation.etatplant ";
 $result2 = $conn->query($sql2);
 
 if ($result2->num_rows > 0) {
   // output data of each row
   while($row = $result2->fetch_assoc()) {
 
 /* if($row["code"]==$code){ */
  
 echo "<li>";
 echo " quantité: ";
 echo $row["quantity"];
 echo "</li>";
 
  echo "<li>";
 echo " Etat: ";
 echo $row["state"];
 echo "</li>";
 
 
 echo "<li>";
 echo " produits: ";
 echo $row["name"];
 echo "</li>";
 
 
 echo "<li>";
 echo " parcelle: ";
 echo $row["parcelleId"];
 echo "</li>";
 
 
     echo "<br>";
 

    require 'dbConfig.php'; 
    // Get image data from database 
    $result3 = $conn->query("SELECT image, code, codephoto FROM images ORDER BY id DESC"); 
    ?>
    
    <!-- Display images with BLOB data from database -->
    <?php if($result3->num_rows > 0){ ?> 
        <div class="gallery"> 
            <?php while($row2 = $result3->fetch_assoc()){               if($row2['code']==$code&&$row['plantphotocode']==$row2['codephoto']){ ?> 
                <img  width="300" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row2['image']); ?> " /> 
            <?php  }     } ?> 
        </div> 
    <?php }else{ ?> 
        <p class="status error">Image(s) not found...</p> 
    <?php } 
    
 
 }
 
 
 }
 /* } */ else {
 //echo "0 results";
 }
 $conn->close();











 require 'dbConfig.php'; 




 $sql2 = "SELECT * FROM recolte , produits, methode  WHERE recoltecode='$des'  AND produits.id= recolte.conso AND recolte.methode=methode.Id";
  $result2 = $conn->query($sql2);
  
  if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
  
  /* if($row["code"]==$code){ */
   
    /* echo "<li>";
    echo " description: ";
    echo $row["description"];
    echo "</li>"; */


  echo "<li>";
  echo "produits: ";
  echo $row["name"];
  echo "</li>";
  
   echo "<li>";
  echo " Methode: ";
  echo $row["method"];
  echo "</li>";
  
  
  echo "<li>";
  echo " gramme: ";
  echo $row["qtygramme"];
  echo "</li>";

  echo "<li>";
  echo " quantité: ";
  echo $row["qtypiece"];
  echo "</li>";
  
  echo "<li>";
  echo " prix par kg: ";
  echo $row["prixparkg"];
  echo "</li>";
  
  echo "<li>";
  echo " parcelle: ";
  echo $row["parcelleId"];
  echo "</li>";
  
  
      echo "<br>";
  
     
  require 'dbConfig.php'; 
  // Get image data from database 
  $result3 = $conn->query("SELECT image, code, codephoto FROM images ORDER BY id DESC"); 
  ?>
  
  <!-- Display images with BLOB data from database -->
  <?php if($result3->num_rows > 0){ ?> 
      <div class="gallery"> 
          <?php while($row2 = $result3->fetch_assoc()){               if($row2['code']==$code&&$row['recolteimgcode']==$row2['codephoto']){ ?> 
              <img  width="300" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row2['image']); ?> " /> 
          <?php  }     } ?> 
      </div> 
  <?php }else{ ?> 
      <p class="status error">Image(s) not found...</p> 
  <?php } 


  
  }
  
  
  }
  /* } */ else {
  //echo "0 results";
  }
  $conn->close();




 










  require 'dbConfig.php'; 


  $sql2 = "SELECT * FROM traitement , produits, type  WHERE traitcode='$des'  AND produits.id= traitement.consommation AND traitement.type=type.Id";
   $result2 = $conn->query($sql2);
   
   if ($result2->num_rows > 0) {
     // output data of each row
     while($row = $result2->fetch_assoc()) {
   
 
 
   echo "<li>";
   echo "parcelle: ";
   echo $row["Idparcelle"];
   echo "</li>";
   
    echo "<li>";
   echo " produits: ";
   echo $row["name"];
   echo "</li>";
   
   
   echo "<li>";
   echo " type: ";
   echo $row["typ"];
   echo "</li>";
 
   
   
       echo "<br>";
   
      
   require 'dbConfig.php'; 
   // Get image data from database 
   $result3 = $conn->query("SELECT image, code, codephoto FROM images ORDER BY id DESC"); 
   ?>
   
   <!-- Display images with BLOB data from database -->
   <?php if($result3->num_rows > 0){ ?> 
       <div class="gallery"> 
           <?php while($row2 = $result3->fetch_assoc()){               if($row2['code']==$code&&$row['traitphotocode']==$row2['codephoto']){ ?> 
               <img  width="300" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row2['image']); ?> " /> 
           <?php  }     } ?> 
       </div> 
   <?php }else{ ?> 
       <p class="status error">Image(s) not found...</p> 
   <?php } 
 
 
   
   }
   
   
   }
   /* } */ else {
   //echo "0 results";
   }
   $conn->close();










 
?>








</ul>


<?php require '../views/footer.php';  ?>


</body>


</html>