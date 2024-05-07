<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Graph</title>
  <link rel="stylesheet" href="cssgraph.css">
</head>
<body>

<form action="graph.php" method="get" class="form-example">
  


<select name="mois">


    <option value="01">Janvier</option>
    <option value="02">Fevrier</option>
    <option value="03">Mars</option>
    <option value="04">Avril</option>
    <option value="05">Mai</option>
    <option value="06">Juin</option>
    <option value="07">Juillet</option>
    <option value="08">Aout</option>
    <option value="09">Septembre</option>
    <option value="10">Octobre</option>
    <option value="11">Novembre</option>
    <option value="12">Decembre</option>
    
    
</select>

<select class="form-select" id="year" name="year">
    <option value="">années</option>

  
    <option value="2022">2022</option>
    <option value="2023">2023</option>
    <option value="2024">2024</option>
    <option value="2022">2025</option>
    <option value="2023">2026</option>
    <option value="2024">2027</option>
    
</select>




  <div class="form-example">
    <input type="submit" value="validate" />
  </div>
</form>





<?php

session_start();

$code=$_SESSION["code"];

 

if(!empty($_GET['year'])){

    $month=$_GET['mois'];
$year=$_GET['year'];



$dateselect= $year.'-'.$month;

$prixdepenses=0;

$prixrecolte=0;


for($i=0; $i<32; $i++){

if($i<10){$i='0'.$i;}

$dateselect1=$dateselect.'-'.$i;

//echo $dateselect1;



require 'dbConfig.php';

$sql2 = "SELECT * FROM depenses WHERE code='$code' AND created='$dateselect1'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
  // output data of each row
  while($row = $result2->fetch_assoc()) {

   
    echo '<br>';
    $prixdepenses=$prixdepenses+$row["prix"];
   // echo $prixdepenses;





  }


}

require 'dbConfig.php';

$sql2 = "SELECT * FROM recolte WHERE code='$code' AND created_at='$dateselect1'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
  // output data of each row
  while($row = $result2->fetch_assoc()) {

    //echo ($row["qtygramme"]/1000)*$row["prixparkg"];

$prixrecolte=$prixrecolte+($row["qtygramme"]/1000)*$row["prixparkg"];

    echo '<br>';

  }


}








}









}

?>
<div id="wrapred">
<div id="red"></div>
<p>Depenses</p>
</div>

<div id="wrapred">
<div id="green"></div>
<p>Recolte</p>
</div>


<div id="bigwrap">

<div id="wrap">
<div class="montant"><?php echo $prixdepenses;?>€</div>
<div id="depense"></div>
<div class="montant"><?php echo $prixrecolte;?>€</div>
<div id="vente"></div>


</div>

</div>


<script>





 var variableRecuperee = <?php echo $prixdepenses;
  ?>;

var variableRecuperee2 = <?php echo $prixrecolte;
  ?>;

if(variableRecuperee>variableRecuperee2){

var dep=(400*variableRecuperee2)/variableRecuperee;
//document.getElementById("depense").style.height=variableRecuperee+"px";

document.getElementById("vente").style.height=dep+"px";
var dif=400-dep;
document.getElementById("vente").style.marginTop=dif+"px";
}
else{
    var dep=(400*variableRecuperee)/variableRecuperee2;
//document.getElementById("depense").style.height=variableRecuperee+"px";

document.getElementById("depense").style.height=dep+"px";
var dif=400-dep;
document.getElementById("depense").style.marginTop=dif+"px";

}


</script>





</body>
</html>


