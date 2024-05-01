<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Jardins</title>

</head>






<body>



<form action="userverif.php" method="get" class="form-example">
     <div id="finputs">
      
      <input type="text" id="name" name="user" placeholder="USER" required minlength="5" maxlength="30" size="10">
      <input type="password" id="name" name="motdepasse" placeholder="VOTRE MOT DE PASSE" required minlength="5" maxlength="30" size="10">
      
      <input type="submit" id="subbut" value="ENVOYER">
  </div>


  <a id="userlink" href="createuser.php">Créer un utilisateur</a>


  <?php

if(!empty($_GET['user'])){

if($_GET['user']=='error'){
  echo "erreur";
}



}

?>


</body>

</head>