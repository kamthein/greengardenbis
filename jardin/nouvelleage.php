 <!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>

  </head>
<body>
 <!--
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>



</head>
<body>


<form action="nouvelleage.php" method="get" class="form-example">

<section class="container">
  <h2 class="py-2">date de naissance</h2>
  <form class="row">
    <label for="date" class="col-1 col-form-label" onclick="func()">Date</label>
    <div class="col-5">
      <div class="input-group date" id="datepicker">
        <input type="text" class="form-control" id="date" name="age"/>
        <span class="input-group-append">
          <span class="input-group-text bg-light d-block">
            <i class="fa fa-calendar"></i>
          </span>
        </span>
      </div>
    </div>
  </form>
</section>

<input type="submit" id="subbut" value="ENVOYER">

</form> -->



<?php
session_start();


?>








 <form action="nouvelleage.php" method="get" class="form-example">
     <div id="finputs">
      

    



 


     
<select name="jour">


    <option value="01">jour 1</option>
    <option value="02">jour 2</option>
    <option value="03">jour 3</option>
    <option value="04">jour 4</option>
    <option value="05">jour 5</option>
    <option value="06">jour 6</option>
    <option value="07">jour 7</option>
    <option value="08">jour 8</option>
    <option value="09">jour 9</option>
    <option value="10">jour 10</option>
    <option value="11">jour 11</option>
    <option value="12">jour 12</option>
    <option value="13">jour 13</option>
    <option value="14">jour 14</option>
    <option value="15">jour 15</option>
    <option value="16">jour 16</option>
    <option value="17">jour 17</option>
    <option value="18">jour 18</option>
    <option value="19">jour 19</option>
    <option value="20">jour 20</option>
    <option value="21">jour 21</option>
    <option value="22">jour 22</option>
    <option value="23">jour 23</option>
    <option value="24">jour 24</option>
    <option value="25">jour 25</option>
    <option value="26">jour 26</option>
    <option value="27">jour 27</option>
    <option value="28">jour 28</option>
    <option value="29">jour 29</option>
    <option value="30">jour 30</option>
    <option value="31">jour 31</option>
    
</select>


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

    <option value="1940">1930</option>
    <option value="1941">1931</option>
    <option value="1942">1932</option>
    <option value="1943">1933</option>
    <option value="1944">1934</option>
    <option value="1945">1935</option>
    <option value="1946">1936</option>
    <option value="1947">1937</option>
    <option value="1948">1938</option>
    <option value="1949">1939</option>

    <option value="1940">1940</option>
    <option value="1941">1941</option>
    <option value="1942">1942</option>
    <option value="1943">1943</option>
    <option value="1944">1944</option>
    <option value="1945">1945</option>
    <option value="1946">1946</option>
    <option value="1947">1947</option>
    <option value="1948">1948</option>
    <option value="1949">1949</option>
    <option value="1950">1950</option>
    <option value="1951">1951</option>
    <option value="1952">1952</option>
    <option value="1953">1953</option>
    <option value="1954">1954</option>
    <option value="1955">1955</option>
    <option value="1956">1956</option>
    <option value="1957">1957</option>
    <option value="1958">1958</option>
    <option value="1959">1959</option>
    <option value="1960">1960</option>
    <option value="1961">1961</option>
    <option value="1962">1962</option>
    <option value="1963">1963</option>
    <option value="1964">1964</option>
    <option value="1965">1965</option>
    <option value="1966">1966</option>
    <option value="1967">1967</option>
    <option value="1968">1968</option>
    <option value="1969">1969</option>
    <option value="1970">1970</option>
    <option value="1971">1971</option>
    <option value="1972">1972</option>
    <option value="1973">1973</option>
    <option value="1974">1974</option>
    <option value="1975">1975</option>
    <option value="1976">1976</option>
    <option value="1977">1977</option>
    <option value="1978">1978</option>
    <option value="1979">1979</option>
    <option value="1980">1980</option>
    <option value="1981">1981</option>
    <option value="1982">1982</option>
    <option value="1983">1983</option>
    <option value="1984">1984</option>
    <option value="1985">1985</option>
    <option value="1986">1986</option>
    <option value="1987">1987</option>
    <option value="1988">1988</option>
    <option value="1989">1989</option>
    <option value="1990">1990</option>
    <option value="1991">1991</option>
    <option value="1992">1992</option>
    <option value="1993">1993</option>
    <option value="1994">1994</option>
    <option value="1995">1995</option>
    <option value="1996">1996</option>
    <option value="1997">1997</option>
    <option value="1998">1998</option>
    <option value="1999">1999</option>
    <option value="2000">2000</option>
    <option value="2001">2001</option>
    <option value="2002">2002</option>
    <option value="2003">2003</option>
    <option value="2004">2004</option>
    <option value="2005">2005</option>
    <option value="2006">2006</option>
    <option value="2007">2007</option>
    <option value="2008">2008</option>
    <option value="2009">2009</option>
    <option value="2010">2010</option>
    <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
    <option value="2018">2018</option>
    <option value="2019">2019</option>
    <option value="2020">2020</option>
    <option value="2021">2021</option>
    <option value="2022">2022</option>
    <option value="2023">2023</option>
    <option value="2024">2024</option>
</select>


      <input type="submit" id="subbut" value="ENVOYER">
  </div>






  <?php

if(!empty($_GET['jour'])){

    //$age=$_GET['age'];

// Include the database configuration file  
require 'dbConfig.php'; 






$code=$_SESSION["code"];

echo $code;

$age=$_GET['year'].'-'.$_GET['mois'].'-'.$_GET['jour'];

echo $age;



$sql = "UPDATE user SET age='$age' WHERE code='$code'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";

  //header('Location: affichageprofil.php?code='.$code);
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();


}


?>

<!-- <script>

function func(){

var i= document.getElementsByClassName("fa-calendar")[0];;
alert(i.innerHTML);
console.log('your message');
}


$(function(){
  $('#datepicker').datepicker();
 
});

</script> -->

</body>

</html>