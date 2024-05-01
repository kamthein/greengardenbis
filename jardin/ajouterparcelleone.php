<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Jardins parcelle</title>

</head>






<body>




<?php

require 'dbConfig.php'; 


session_start();





$code=$_SESSION['code'];

?>



<form action="ajouterparcelleone.php" method="post" enctype="multipart/form-data">
    <label>Select Image File:</label>
     
    <input type="file" name="image">
    <input type="submit" name="submit" value="Upload">
</form>


<a href="ajouterparcelletwo.php">Pas de photo</a>



<?php

// Include the database configuration file 







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
         

            $codehome= substr(sha1(mt_rand()),17,10);
           
           // echo $image . ': ' . filesize($image) . ' bytes';

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
               
                header('Location: ajouterparcelletwo.php?codephoto='.$codehome);
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
?>










</body>


</html>