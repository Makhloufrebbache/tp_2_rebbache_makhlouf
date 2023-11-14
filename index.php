<?php

session_start();

// Récupération de messagage d'erreur envoyé dans la variable de session 
$msg_erreur_index='';
if(isset($_SESSION["Message_error_index"])){
  $msg_erreur_index=$_SESSION["Message_error_index"];
}
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Index</title>
</head>
<body>
<div id="form0">
  <!-- Affichage de message d'erreur -->
  <div id="msg_error"><label for=""> <?php echo $msg_erreur_index ?></label></div>
  <!-- Le formulaire de saise de nombre d'adresses -->
    <form  action="Formulaire_Saisie.php"  method="post">
     <input id="input_form0" type="text" name="nbr_adresse" placeholder="Veuillez saisir le nombre d'adresse">
     <button id="btn_submit_0" type="submit">Créer</button>
    </form>
</div>   
</body>
</html>