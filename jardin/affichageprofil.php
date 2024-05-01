<?php
/* $servername = "localhost";
$username = "root";
$password = "";
$dbname = "jardin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}  */

require 'dbConfig.php'; 



if(!empty($_GET['code'])){

    
    $code=$_GET['code'];

}




$sql = "SELECT email, nickname, age, phone, surfaceId, localisation, code FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

if($row["code"]==$code){





  ?>

<p>Image:</p>

<a href="addpic.php?add=home"><img src="pencil.jpg" alt="pen" width="20"/> </a>
  

<?php
 $namecode='home';
 
  // Get image data from database 
  $result2 = $conn->query("SELECT image, code, codephoto FROM images ORDER BY id DESC"); 
  ?>
  
  <!-- Display images with BLOB data from database -->
  <?php if($result2->num_rows > 0){ ?> 
      <div class="gallery"> 
          <?php while($row2 = $result2->fetch_assoc()){             if($row2['code']==$code&&$row2['codephoto']==$namecode){ ?> 
              <img  width="100" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row2['image']); ?> " /> 
          <?php  }     } ?> 
      </div> 
  <?php }else{ ?> 
      <p class="status error">Image(s) not found...</p> 
  <?php } 
  
  




 









  echo "Mail: ";
    echo $row["email"];
    echo "<hr>";
    ?>
    <a href="nouveaupseudo.php"><img src="pencil.jpg" alt="pen" width="20"/> </a>
  
    <p>Pseudo: 
    <?php
    echo $row["nickname"];

    if(!empty($_GET['user'])){

      if($_GET['user']=='already'){
        echo "Pseudo déja utilisé";
      }
      
      
      }

      ?>
</p>
<?php


    echo "<hr>";
    echo '<a href="nouveaumdp.php?user='.$code.'"><img src="pencil.jpg" alt="pen" width="20"/> </a>';

    echo "modifier votre mot de passe";
   
    echo "<hr>";
    echo '<a href="nouvelleage.php"><img src="pencil.jpg" alt="pen" width="20"/> </a>';
    echo "Age: ";

include 'calculateage.php';

    echo $row["age"];
    echo " ans";
    echo "<hr>";
    echo '<a href="nouveautel.php"><img src="pencil.jpg" alt="pen" width="20"/> </a>';
    echo "Téléphone: ";
    echo $row["phone"];
    echo "<hr>";
    echo '<a href="nouvellesurface.php"><img src="pencil.jpg" alt="pen" width="20"/> </a>';
    echo "Surface: ";
    $surf=$row["surfaceId"];

    $local=$row["localisation"];


    $sql2 = "SELECT ID, surfacename FROM surfaceId";
    $result2 = $conn->query($sql2);
    
    if ($result2->num_rows > 0) {
      // output data of each row
      while($row2 = $result2->fetch_assoc()) {
    
    if($row2["ID"]== $surf){
        echo $row2["surfacename"];
    }


      }
    }

  
    echo "<hr>";
    echo '<a href="nouveaudepartement.php"><img src="pencil.jpg" alt="pen" width="20"/> </a>';
    echo "Département: ";


    $sql3 = "SELECT departement_code, departement_nom FROM departement";
    $result3 = $conn->query($sql3);
    
    if ($result3->num_rows > 0) {
      // output data of each row
      while($row3 = $result3->fetch_assoc()) {
    
    if($row3["departement_code"]== $local){
        echo $row3["departement_nom"];
    }


      }
    }




    echo "<hr>";


    echo '<a href="homepage.php?code='.$code.'">retour à la page la home page </a>';
    

}

    //echo " - Name: " . $row["nickname"]. " " . $row["password"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();


?>