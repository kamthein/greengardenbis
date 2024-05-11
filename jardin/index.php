<?php
require '../views/header.php';
?>

<form action="userverif.php" method="get" class="form-example">
     <div id="finputs">
      
      <input type="text" id="name" name="user" placeholder="USER" required minlength="5" maxlength="30" size="10">
      <input type="password" id="name" name="motdepasse" placeholder="VOTRE MOT DE PASSE" required minlength="5" maxlength="30" size="10">
      
      <input type="submit" id="subbut" value="ENVOYER">
  </div>


  <a id="userlink" href="createuser.php">Créer un utilisateur</a>
  <a id="userlink" href="vente.php">Acceder au vente</a>


  <?php

if(!empty($_GET['user'])){

if($_GET['user']=='error'){
  echo "erreur";
}



}

?>
<br>




</body>

</head>