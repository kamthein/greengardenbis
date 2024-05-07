

<?php

session_start();


if(!empty($_GET['description'])){

$code=$_SESSION['code'];

require 'dbConfig.php'; 

$desc=$_GET['description'];
$j=0;



$updated_at=date('o-m-d');

$sql = "UPDATE plantation SET  updated_at='$updated_at' WHERE code='$code' and description='$desc'";

if ($conn->query($sql) === TRUE) {
echo "Record updated successfully";

//header('Location: homepage.php?code='.$code);
} else {
echo "Error updating record: " . $conn->error;
}

$conn->close();




$cons=$_GET['consoId'];
$quant=$_GET['quanti'];
$par=$_GET['parcelle'];
$desc=$_GET['description'];
$_SESSION["des"]=$desc;

}





?>

<form action="recolte.php" method="get" class="form-example">
     <div id="finputs">

    
    
     <label for="story">Note:</label>

<textarea id="story" name="descrip" rows="5" cols="33">

</textarea>



     <input type="hidden" name="conso" id="conso" value= "<?php echo $cons ?>" required />
     <input type="hidden" name="quantity" id="conso" value= "<?php echo $quant ?>" required />
     <input type="hidden" name="parcelle" id="conso" value= "<?php echo $par ?>" required />

     <input type="text" name="poid" id="name" placeholder="poids en grammes" required />

     <input type="text" name="prix" id="name" placeholder="prix par kg" required />
      
     <select name="methode" id="pet-select">
  <option value="">--Methode--</option>
  <option value="1">Butte</option>
  <option value="2">Pleine terre</option>
  <option value="3">Jardinière / Pot</option>
  <option value="4">Cueillette sauvage</option>
  <option value="5">Serre</option>
  <option value="6">Hydro/Aquaponie</option>
  <option value="7">Autre</option>
 
</select>
    
<input type="date" id="start" name="trip-start" value="2024-03-22"  />



<input type="submit" id="subbut" value="ENVOYER">
 </div>
</form>


<form action="recolte.php" method="post" enctype="multipart/form-data">
    <label>Select Image File:</label>
  
    <input type="file" name="image">
    <input type="date" id="start2" name="trip-start" value="2024-03-22"  />
 
    <input type="submit" name="submit" value="Upload">
</form>




<?php



if(!empty($_GET['methode'])){

    $code=$_SESSION['code'];

    $conso=$_GET['conso'];
    $metho=$_GET['methode'];
    $poid=$_GET['poid'];

echo $conso;



    $quantity=$_GET['quantity'];
    $prixparkg=$_GET['prix'];
    $parcelle=$_GET['parcelle'];

    $desc=$_GET['descrip'];
$desc=trim($desc);
    echo $quantity;
    echo $parcelle;


    $created_at=$_GET["trip-start"];
    $updated_at=$_GET["trip-start"];

    $codehome=  substr(sha1(mt_rand()),17,10);

    $coderec=  substr(sha1(mt_rand()),17,10);







    require 'dbConfig.php'; 

    
$_SESSION['imgcode']=$codehome;

    $sql = "INSERT INTO recolte (code, description, conso, methode, qtygramme, qtypiece, prixparkg, parcelleId, created_at, updated_at, recolteimgcode, recoltecode) 
    VALUES ('$code', '$desc', '$conso', '$metho','$poid', $quantity, '$prixparkg', '$parcelle', '$created_at', '$updated_at', '$codehome', '$coderec')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
     
       //header('Location: homepage.php?code='.$code);
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();







    require 'dbConfig2.php'; 
    
    
    
    
    
    $sql = "INSERT INTO events (name, description, start, end, code, typaction, codename) VALUES ('$desc', '$desc', '$created_at', '$created_at', '$code', 'Recolte', '$coderec')";
    
    if ($conn2->query($sql) === TRUE) {
      echo "New record created successfully";
      // header('Location: homepage.php?user='.$nickname);
    } else {
      echo "Error: " . $sql . "<br>" . $conn2->error;
    }
    
    
    
    
    
    
    $conn2->close();









}  










// Include the database configuration file  
require_once 'dbConfig.php'; 


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
         

            //$codehome=  substr(sha1(mt_rand()),17,10);
            $code=$_SESSION['code'];

            $create=$_POST['trip-start'];
$codehome=$_SESSION['imgcode'];


if(filesize($image)>500000){
  echo 'fichier trop grand, dois être moins de 500ko';
}
else{
            // Insert image content into database 
            $insert = $conn->query("INSERT into images (image, created, code, codephoto) VALUES ('$imgContent', '$create', '$code', '$codehome')"); 
}
            if(isset($insert)){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
               
                 header('Location: homepage.php?code='.$code); 
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




/* if(isset($_POST["submit"])){

  $code=$_SESSION['code'];
 
  require 'dbConfig.php'; 

$modifcode=$codehome;
  $description1=$_SESSION["des"];
  $updated_at=$_POST["trip-start"];

$sql = "UPDATE recolte SET recolteimgcode='$modifcode', updated_at='$updated_at' WHERE code='$code' and description='$description1'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";

} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();

} */








?>



<script>document.getElementById('start').valueAsDate = new Date();
document.getElementById('start2').valueAsDate = new Date();</script>

</body>

</html>




