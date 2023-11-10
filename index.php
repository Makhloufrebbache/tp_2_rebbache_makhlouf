<?php
session_start();
$msg_erreur_index='';
if(isset($_SESSION["Message_error_index"])){
  $msg_erreur_index=$_SESSION["Message_error_index"];
}
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
  <div id="msg_error"><label for=""> <?php echo $msg_erreur_index ?></label></div>
    <form  action="Formulaire_Saisie.php"  method="post">
      <label for=""><span>Saisir le nombre d'adresses: </span></label> <input id="input_form0" type="text" name="nbr_adresse">
      <button type="submit">Envoyer</button>
    </form>
</div>   
</body>
</html>