


<form action="addpicture.php" method="post" enctype="multipart/form-data">
    <label>Select Image File:</label>
    <input type="hidden" name = "codephoto"  value="<?php echo $_GET['add'];?>"> 
    <input type="file" name="image">
    <input type="submit" name="submit" value="Upload">
</form>




 

<?php 




session_start(); 

$code=$_SESSION["code"];





    
  


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
         

            $codehome= $_POST["codephoto"];
           


            // Insert image content into database 
            $insert = $conn->query("INSERT into images (image, created, code, codephoto) VALUES ('$imgContent', NOW(), '$code', '$codehome')"); 
             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
               
                header('Location: affichageprofil.php?code='.$code);
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


















