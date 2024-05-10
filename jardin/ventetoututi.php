<?php



if(!empty($_GET['cod'])){

    $cons= $_GET['cod'];

require 'dbConfig.php'; 

$sql1 = "SELECT * FROM recolte WHERE code='$cons'";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  // output data of each row
  while($row = $result1->fetch_assoc()) {

   
 
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

//$cod=$row["code"];

$sql = "SELECT * FROM user WHERE code='$cons'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

   echo 'pseudo: '; 
echo $row["nickname"]; 
echo '<br>mail: ';
echo $row["email"]; 

echo '<hr>';

  }
}
}

  }
}

}
$conn->close();
?>