<?php




session_start();


$code=$_SESSION['code'];

if(!empty($_GET['description'])){

$descrip=$_GET['description'];
require 'dbConfig.php'; 

/* echo "frist";
echo rtrim($descrip, " ");
echo "last"; */
/* echo $descrip; */


$sql2 = "SELECT * FROM plantation, produits, etat WHERE code='$code' AND produits.id= plantation.consommableId AND etat.Id= plantation.etatplant/*  AND description='$descrip' */";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
  // output data of each row
  while($row = $result2->fetch_assoc()) {

?>




 



<?php


    
$d=$row["description"];
  $des=  ltrim($d);

   
 if($des==$descrip){


  ?>


<form action="modifplantation.php" method="post" enctype="multipart/form-data">
    <label>Select Image File:</label>
  
    <input type="file" name="image">
    <input type="date" id="start1" name="trip-start" value="2024-03-22" min="2024-03-01" max="2024-12-31" />
 
    <input type="submit" name="submit" value="Upload">
</form>

<?php
  echo "Description: ";
  echo $row["description"];
  $_SESSION["des"]=$row["description"];

?>




  <form action="modifplantation.php" method="get" class="form-example">
       <div id="finputs">
        
       <textarea id="descript" name="descript" rows="5" cols="33">

</textarea>

<input type="date" id="start2" name="trip-start" value="2024-03-22" min="2024-03-01" max="2024-12-31" />
 
      
  <input type="submit" id="subbut" value="ENVOYER">
   </div>
  </form>
  <?php


echo "<br>";
  echo "Aliment: ";
  echo $row["name"];

  echo "<br>";
  echo " quantite: ";
echo $row["quantity"];

?>
<form action="modifplantation.php" method="get" class="form-example">
     <div id="finputs">
      
     <input type="text" name="quant" id="name" required />
     <input type="date" id="start3" name="trip-start" value="2024-03-22" min="2024-03-01" max="2024-12-31" />
 
<input type="submit" id="subbut" value="ENVOYER">
 </div>
</form>
<?php


echo "<br>";
echo " Etat: ";
echo $row["state"];

?>
<form action="modifplantation.php" method="get" class="form-example">
     <div id="finputs">
      
     <select name="etat" id="pet-select">
  <option value="">--Etat--</option>
  <option value="1">Semis</option>
  <option value="2">germination</option>
  <option value="3">eclaircissage</option>
  <option value="4">plant, repiquage</option>
  <option value="5">mort</option>
 
</select>

<input type="date" id="start4" name="trip-start" value="2024-03-22" min="2024-03-01" max="2024-12-31" />
 
    
<input type="submit" id="subbut" value="ENVOYER">
 </div>
</form>
<?php

echo "<br>";
echo " Parcelle: ";
echo $row["parcelleId"];

echo "<br>";
echo " date cree: ";
echo $row["create_at"];



echo "<br>";
echo " date mise à jour: ";
echo $row["updated_at"];

 } 
  
 


    echo "<br>";

   

}


}
/* } */ else {
echo "0 results";
}
$conn->close();


}







if(!empty($_GET['descript'])){

  $code=$_SESSION['code'];
 
  require 'dbConfig.php'; 

$desc=$_GET['descript'];
  $description1=$_SESSION["des"];

  $updated_at=$_GET["trip-start"];

$sql = "UPDATE plantation SET description='$desc', updated_at='$updated_at' WHERE code='$code' and description='$description1'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";

header('Location: homepage.php?code='.$code);
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();

}













if(!empty($_GET['etat'])){

  $code=$_SESSION['code'];
 
  require 'dbConfig.php'; 

$etat=$_GET['etat'];
  $description1=$_SESSION["des"];
  $updated_at=$_GET["trip-start"];

$sql = "UPDATE plantation SET etatplant='$etat', updated_at='$updated_at' WHERE code='$code' and description='$description1'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";

  header('Location: homepage.php?code='.$code);
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();

}










if(!empty($_GET['quant'])){

  $code=$_SESSION['code'];
 
  require 'dbConfig.php'; 

$quan=$_GET['quant'];
  $description1=$_SESSION["des"];
  $updated_at=$_GET["trip-start"];

$sql = "UPDATE plantation SET quantity='$quan', updated_at='$updated_at' WHERE code='$code' and description='$description1'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";

  header('Location: homepage.php?code='.$code);
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();

}








// Include the database configuration file  
require_once 'dbConfig.php'; 

$bool=0;
// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 

    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         

            $codehome=  substr(sha1(mt_rand()),17,10);
           

            if(filesize($image)>500000){
              echo 'fichier trop grand, dois être moins de 500ko';
            }
            else{
            // Insert image content into database 
            $insert = $conn->query("INSERT into images (image, created, code, codephoto) VALUES ('$imgContent', NOW(), '$code', '$codehome')"); 
            }
            if(isset($insert)){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
                $bool=1;
               
               /*  header('Location: affichageprofil.php?code='.$code); */
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
                
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 

echo $statusMsg; 




if(isset($_POST["submit"])&&$bool==1){

  $code=$_SESSION['code'];
 
  require 'dbConfig.php'; 

$modifcode=$codehome;
  $description1=$_SESSION["des"];
  $updated_at=$_POST["trip-start"];

$sql = "UPDATE plantation SET plantphotocode='$modifcode', updated_at='$updated_at' WHERE code='$code' and description='$description1'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";

  //header('Location: homepage.php?code='.$code);
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();

}








?>



<script>document.getElementById('start1').valueAsDate = new Date();</script>

<script>document.getElementById('start2').valueAsDate = new Date();</script>

<script>document.getElementById('start3').valueAsDate = new Date();</script>

<script>document.getElementById('start4').valueAsDate = new Date();</script>
















