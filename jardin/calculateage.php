<!DOCTYPE html>
<html>
 
<head>
    <title>Age Calculator</title>
    <link rel="stylesheet"
          href="style.css" />
</head>
 
<body>
    <div class="cardi">
       <!--  <header>
            <h1>AGE CALCULATOR</h1>
        </header> -->
 

        <?php
//session_start();

//$code=$_SESSION["code"];

?>



        <div>
            <!-- <label>Enter your Date of Birth</label> -->
 


            <?php
require 'dbConfig.php'; 


$sql2 = "SELECT age FROM user WHERE code='$code'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
  // output data of each row
  while($row2 = $result2->fetch_assoc()) {

    //echo $row["age"];

?>

            <input id="inputDob"
                   type="date"
                   value="<?php echo $row2["age"]; ?>" />
                   <?php  }
                }
                ?>
        </div>
        <br />
 
        <!-- Take the date from which age is to be calculated -->
        <div>
           
            <input id="cdate"
                   type="date"
                   value="" />
        </div>
        <br />
 
        <button type="button"
                onclick="getDOB()">
            Calculate
        </button>
        <br />
        <div id="currentAge"></div>
        <script src="script.js"></script>
    </div>
</body>
 
</html>