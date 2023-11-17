<?php

session_start();

// Récupération de messaage d'erreur renvoyé dans une variable de session par la page Formulaire_Saisie.
$msg_erreur_index='';
if(isset($_SESSION["Message_error_index"])){
  $msg_erreur_index=$_SESSION["Message_error_index"];
}
// Récupération de messaage de succés renvoyé dans une variable de session par la page traitement.
$msg_succes='';
if(isset($_SESSION["msg_succes"])){
  $msg_succes=$_SESSION["msg_succes"];
}
//Détruire la session aprés avoir récupéré leurs valeurs dans des variables.
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Index</title>
</head>
<body>
<div id="form0">
  <!-- Affichage de message d'erreur avec couloure rouge -->
  <div id="msg_error"><label for=""> <?php echo $msg_erreur_index ?></label></div>
   <!-- Affichage de message de succés avec une couleure verte après insertion dans la bd -->
  <div id="msg_succes"><label for=""> <?php echo $msg_succes ?></label></div>
  <!-- Formulaire d'insertion de nombre d'adresses -->
  <form  action="Formulaire_Saisie.php"  method="post">
     <input id="input_form0" type="text" name="nbr_adresse" placeholder="Veuillez saisir le nombre d'adresse">
     <button id="btn_submit_0" type="submit">Créer</button>
  </form>
</div>   
</body>
</html>
