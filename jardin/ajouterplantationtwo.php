<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Jardins plantation</title>

</head>






<body>

<?php




session_start();





$code=$_SESSION['code'];



?>

<?php

  if(isset($_GET['codephoto'])) {
    $photocode=$_GET['codephoto'];
    }else{
      $photocode='none';
    } 

?>







<form action="createplantation.php" method="get" class="form-example">
     <div id="finputs">

     <!-- <input type="text" id="nickname" name="nickname" placeholder="NOM DE LA PARCELLE" required minlength="2" maxlength="30" size="30"> -->
      

     <input type="hidden" id="name" name="photoid" value="<?php echo $photocode;?>">
     
     





<label for="story">Note:</label>

<textarea id="story" name="story" rows="5" cols="33">

</textarea>


<select name="nameconso">

    <optgroup label="ESPECES">
        <option value="Fruits">Fruits</option>
        <option value="Légumes">Légumes</option>
        <option value="Aromates">Aromates</option>
    </optgroup>

    <optgroup label="Fruits">
        <option value="4">Abricot</option>
        <option value="5">Agrume</option>
        <option value="6">Asimine</option>
        <option value="7">Baie</option>
        <option value="8">Cassis</option>
        <option value="9">Chataigne</option>
        <option value="10">Cerise</option>
        <option value="11">Figue</option>
        <option value="12">Fraise</option>
        <option value="13">Framboise</option>
        <option value="14">Groseille</option>
        <option value="15">Kakie</option>
        <option value="16">Kiwi</option>
        <option value="17">Melon</option>
        <option value="18">Mirabelle</option>
        <option value="19">Mure</option>
        <option value="20">Myrtille</option>
        <option value="21">Noisette</option>
        <option value="22">Noix</option>
        <option value="23">Pastèque</option>
        <option value="24">Pèche</option>
        <option value="25">Poire</option>
        <option value="26">Pomme</option>
        <option value="27">Prune</option>
        <option value="28">Quetshe</option>
        <option value="29">Raisin</option>
        <option value="30">Rhubarbe</option>
        <option value="31">Citron</option>
        <option value="32">Kumquat</option>
        <option value="33">Orange</option>
        <option value="34">Mandarine</option>
        <option value="35">Pamplemousse</option>
        <option value="36">Amarelle</option>
        <option value="37">Bigarreaux</option>
        <option value="38">Guigne</option>
        <option value="39">Griotte</option>
        <option value="40">Fraise charlotte</option>
        <option value="41">Guariguette</option>
        <option value="42">Mara des bois</option>
        <option value="43">Framboise remontante</option>
        <option value="44">Framboise non remontante</option>
        <option value="45">Groseille blanche</option>
        <option value="46">Groseille maquereaux</option>
        <option value="47">Groseille rouge</option>
        <option value="48">Melon jaune/canari</option>
        <option value="49">Melon vert</option>
    </optgroup>

    <optgroup label="Légumes">
        <option value="50">Ail</option>
        <option value="51">Artichaut</option>
        <option value="52">Aubergine</option>
        <option value="53">Betterave</option>
        <option value="54">Blette</option>
        <option value="55">Brocoli</option>
        <option value="56">Canneberge</option>
        <option value="57">Carotte</option>
        <option value="58">Céleri</option>
        <option value="59">Champignon</option>
        <option value="60">Chou</option>
        <option value="61">Concombre</option>
        <option value="62">Cornichon</option>
        <option value="63">Courge</option>
        <option value="64">Courgette</option>
        <option value="65">Echalotte</option>
        <option value="66">Endive</option>
        <option value="67">Epinard</option>
        <option value="68">Fenouil</option>
        <option value="69">Fève</option>
        <option value="70">Haricot vert/jaune</option>
        <option value="71">Haricot sec</option>
        <option value="72">Lentille</option>
        <option value="73">Mais</option>
        <option value="74">Navet</option>
        <option value="75">Oignon</option>
        <option value="76">Panai</option>
        <option value="77">Patate douce</option>
        <option value="78">Petit pois</option>
        <option value="79">Pignon</option>
        <option value="80">Piment</option>
        <option value="81">Plante médicinale</option>
        <option value="82">Poireau</option>
        <option value="83">Pois gourmand</option>
        <option value="84">Poivron</option>
        <option value="85">Pomme de terre</option>
        <option value="86">Radis</option>
        <option value="87">Rutabaga</option>
        <option value="88">Salade</option>
        <option value="89">Tomate cerise</option>
        <option value="90">Tomate</option>
        <option value="91">Topinambour</option>
        <option value="92">Céleri branche</option>
        <option value="93">Céleri rave</option>
        <option value="94">Chou de bruxelle</option>
        <option value="95">Chou-fleur</option>
        <option value="96">Chou kale</option>
        <option value="97">Chou pômmé</option>
        <option value="98">Chou romanesco</option>
        <option value="99">Butternut</option>
        <option value="100">Christophine</option>
        <option value="101">Citrouille</option>
        <option value="102">Patisson</option>
        <option value="103">Potimarron</option>
        <option value="104">Potiron</option>
        <option value="105">Courge spaghetti</option>
        <option value="106">Courgette allongée</option>
        <option value="107">Tomate ronde</option>
        <option value="108">Courgette pop-corn</option>
        <option value="109">Haricot coco</option>
        <option value="110">Flageolet</option>
        <option value="111">Haricot noir</option>
        <option value="112">Haricot pinto</option>
        <option value="113">Belle de fontenay</option>
        <option value="114">Bintche</option>
        <option value="115">Charlotte</option>
        <option value="116">Chérie</option>
        <option value="117">Pompadour</option>
        <option value="118">Ratte</option>
        <option value="119">Roseval</option>
        <option value="120">Chicorée</option>
        <option value="121">Cresson</option>
        <option value="122">Laitue</option>
        <option value="123">Mache</option>
        <option value="124">Pissenlit</option>
        <option value="125">Pourpier</option>
        <option value="126">Coeur de boeuf</option>
        <option value="127">Tomate colorée</option>
        <option value="128">Plate/Cottelée</option>
        <option value="129">Roma/Chico</option>
        <option value="130">Valériane</option>
        <option value="131">Courgette ronde</option>
        <option value="132">Tomates Green Zebra</option>
        <option value="133">Amandine</option>
        <option value="134">Agata</option>
        <option value="135">Apollo</option>
        <option value="136">Artemis</option>
        <option value="137">Bonnotte</option>
        <option value="138">BF 15</option>
        <option value="139">Lady Christl</option>
        <option value="140">Annabelle</option>
        <option value="141">Victoria</option>
        <option value="142">Radis green meat</option>
        <option value="143">Radis Hilds blauer</option>
        <option value="144">Radis noir</option>
        <option value="145">Radis red meat</option>
        <option value="146">Radis rose</option>
        <option value="147">Radis violet de Gournay</option>
    </optgroup>

 <optgroup label="Aromates">
        <option value="148">Cerfeuil</option>
        <option value="149">Ciboulette</option>
        <option value="150">Coriandre</option>
        <option value="151">Mélisse</option>
        <option value="152">Menthe</option>
        <option value="153">Origan</option>
        <option value="154">Ortie</option>
        <option value="155">Oseille</option>
        <option value="156">Persil</option>
        <option value="157">Réglisse</option>
        <option value="158">Romarin</option>
        <option value="159">Sarriette</option>
        <option value="160">Sauge</option>
        <option value="161">Thym</option>
        <option value="162">Basilic</option>
        <option value="163">Estragon</option>
        <option value="164">Laurier</option>
</optgroup>


</select>


<input type="text" id="quant" name="quantity" placeholder="QUANTITE" required minlength="1" maxlength="30" size="30">
      



<select name="etat" id="pet-select">
  <option value="">--Etat--</option>
  <option value="1">Semis</option>
  <option value="2">germination</option>
  <option value="3">eclaircissage</option>
  <option value="4">plant, repiquage</option>
  <option value="5">mort</option>
 
</select>



<select name="parcelleid" id="pet-select">

<option value="<?php echo 'toute parcelle'; ?>" ><?php

echo 'toute parcelle';    


?>

</option>


<?php






session_start();

$code=$_SESSION["code"];
echo $code;

require 'dbConfig.php'; 


$sql = "SELECT name FROM parcelle WHERE code='$code'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    ?>  <option value="<?php echo $row["name"]; ?>" >
    
    <?php

echo $row["name"];    


?>

</option>
<?php
}
} else {
echo "0 results";
}
$conn->close();



?>




<input type="date" id="start" name="trip-start" value="2024-03-22"  />












      <input type="submit" id="subbut" value="ENVOYER">
  </div>




 





<script>document.getElementById('start').valueAsDate = new Date();</script>



</body>



</html>