<?php
require '../views/header.php';
?>



<form action="usercreate.php" method="get" class="form-example">
     <div id="finputs">
      
      <input type="text" id="name" name="email" placeholder="EMAIL" required minlength="7" maxlength="30" size="20">
      <input type="password" id="name" name="password" placeholder="MOT DE PASSE" required minlength="5" maxlength="50" size="10">
      <input type="text" id="name" name="user" placeholder="USER NAME" required minlength="5" maxlength="30" size="10">
      Jour de naissance:  

     
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

      <input type="text" id="name" name="tel" placeholder="TELEPHONE" required minlength="5" maxlength="30" size="10">
     
      <select name="surface" id="pet-select">
  <option value="">--Taille du terrain--</option>
  <option value="1">Intérieur</option>
  <option value="2">Balcon 0 - 5m2</option>
  <option value="3">Terrasse 5 - 10m2</option>
  <option value="4">Jardin > 10m2</option>
 
</select>


<select name="localisation" id="deptList">
    <option value="00">Voir les départements</option>
    <option value="01">01 - Ain </option>
    <option value="02">02 - Aisne </option>
    <option value="03">03 - Allier </option>
    <option value="04">04 - Alpes de Haute Provence </option>
    <option value="05">05 - Hautes Alpes </option>
    <option value="06">06 - Alpes Maritimes </option>
    <option value="07">07 - Ardèche </option>
    <option value="08">08 - Ardennes </option>
    <option value="09">09 - Ariège </option>
    <option value="10">10 - Aube </option>
    <option value="11">11 - Aude </option>
    <option value="12">12 - Aveyron </option>
    <option value="13">13 - Bouches du Rhône </option>
    <option value="14">14 - Calvados </option>
    <option value="15">15 - Cantal </option>
    <option value="16">16 - Charente </option>
    <option value="17">17 - Charente Maritime </option>
    <option value="18">18 - Cher </option>
    <option value="19">19 - Corrèze </option>
    <option value="2A">2A - Corse du Sud </option>
    <option value="2B">2B - Haute-Corse </option>
    <option value="21">21 - Côte d'Or </option>
    <option value="22">22 - Côtes d'Armor </option>
    <option value="23">23 - Creuse </option>
    <option value="24">24 - Dordogne </option>
    <option value="25">25 - Doubs </option>
    <option value="26">26 - Drôme </option>
    <option value="27">27 - Eure </option>
    <option value="28">28 - Eure et Loir </option>
    <option value="29">29 - Finistère </option>
    <option value="30">30 - Gard </option>
    <option value="31">31 - Haute Garonne </option>
    <option value="32">32 - Gers </option>
    <option value="33">33 - Gironde </option>
    <option value="34">34 - Hérault </option>
    <option value="35">35 - Ille et Vilaine </option>
    <option value="36">36 - Indre </option>
    <option value="37">37 - Indre et Loire </option>
    <option value="38">38 - Isère </option>
    <option value="39">39 - Jura </option>
    <option value="40">40 - Landes </option>
    <option value="41">41 - Loir et Cher </option>
    <option value="42">42 - Loire </option>
    <option value="43">43 - Haute Loire </option>
    <option value="44">44 - Loire Atlantique </option>
    <option value="45">45 - Loiret </option>
    <option value="46">46 - Lot </option>
    <option value="47">47 - Lot et Garonne </option>
    <option value="48">48 - Lozère </option>
    <option value="49">49 - Maine et Loire </option>
    <option value="50">50 - Manche </option>
    <option value="51">51 - Marne </option>
    <option value="52">52 - Haute Marne </option>
    <option value="53">53 - Mayenne </option>
    <option value="54">54 - Meurthe et Moselle </option>
    <option value="55">55 - Meuse </option>
    <option value="56">56 - Morbihan </option>
    <option value="57">57 - Moselle </option>
    <option value="58">58 - Nièvre </option>
    <option value="59">59 - Nord </option>
    <option value="60">60 - Oise </option>
    <option value="61">61 - Orne </option>
    <option value="62">62 - Pas de Calais </option>
    <option value="63">63 - Puy de Dôme </option>
    <option value="64">64 - Pyrénées Atlantiques </option>
    <option value="65">65 - Hautes Pyrénées </option>
    <option value="66">66 - Pyrénées Orientales </option>
    <option value="67">67 - Bas Rhin </option>
    <option value="68">68 - Haut Rhin </option>
    <option value="69">69 - Rhône </option>
    <option value="70">70 - Haute Saône </option>
    <option value="71">71 - Saône et Loire </option>
    <option value="72">72 - Sarthe </option>
    <option value="73">73 - Savoie </option>
    <option value="74">74 - Haute Savoie </option>
    <option value="75">75 - Paris </option>
    <option value="76">76 - Seine Maritime </option>
    <option value="77">77 - Seine et Marne </option>
    <option value="78">78 - Yvelines </option>
    <option value="79">79 - Deux Sèvres </option>
    <option value="80">80 - Somme </option>
    <option value="81">81 - Tarn </option>
    <option value="82">82 - Tarn et Garonne </option>
    <option value="83">83 - Var </option>
    <option value="84">84 - Vaucluse </option>
    <option value="85">85 - Vendée </option>
    <option value="86">86 - Vienne </option>
    <option value="87">87 - Haute Vienne </option>
    <option value="88">88 - Vosges </option>
    <option value="89">89 - Yonne </option>
    <option value="90">90 - Territoire de Belfort </option>
    <option value="91">91 - Essonne </option>
    <option value="92">92 - Hauts de Seine </option>
    <option value="93">93 - Seine Saint Denis </option>
    <option value="94">94 - Val de Marne </option>
    <option value="95">95 - Val d'Oise </option>
    <option value="971">971 - Guadeloupe </option>
    <option value="972">972 - Martinique </option>
    <option value="973">973 - Guyane </option>
    <option value="974">974 - Réunion </option>
    <option value="975">975 - Saint Pierre et Miquelon </option>
    <option value="976">976 - Mayotte </option>
</select>

      <input type="submit" id="subbut" value="ENVOYER">
  </div>




  <?php

if(!empty($_GET['user'])){

  
  
  if($_GET['user']=='already'){
    echo "votre pseudo existe déjà";
  }
  
  if($_GET['user']=='mailalready'){
    echo "votre email existe déjà";
  }



  }

?>


</body>

</head>