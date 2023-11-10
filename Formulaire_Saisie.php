<?php
require_once("Function.php");
$nbr_forms= $_POST["nbr_adresse"];
session_start();
$Msg_error_index=verifierDataFormsIdex($_POST["nbr_adresse"]);
if ($Msg_error_index["isValid"]==false) { 
  $_SESSION["Message_error_index"]= $Msg_error_index["msg"];
  header("Location: index.php");
  die();
}
else{
   $_SESSION["Message_error_index"]= "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Formulaire saisie</title>
</head>
<body>
  <div id="form1">
<form action="Formulaire_validation.php" method="post">
  <input hidden text="" name= "nbr_adresse_valid" value="<?php echo $nbr_forms ?>">
  <?php 
  for ($i= 0; $i < $nbr_forms; $i++) { ?>
   <p id="tite_form1">Adresse N°: <?php echo $i+1?></p>
    <div id="div1_form1"> <label  for=""><span class="label_form1">Street </span>  : </label> <input class="input_form1" text="" name= "<?php echo "street".$i ?>"  placeholder="Saisir le nom de la rue"></div>
    <div id="div1_form2"> <label  for=""><span class="label_form1">Street numbrer </span>  :  </label> <input class="input_form1" text="" name="<?php echo "street_nb".$i ?>" placeholder="Saisir le numéro de la rue"></div>
    <div id="div1_form3"> <label for=""><span class="label_form1">type </span>  : </label>
                               <select name="<?php echo "type.$i" ?>" class="input_select_form1">
                                        <option value="default">Séléctionner le type</option>
                                        <option value="livraison">Livraison</option>
                                        <option value="facture">Facture</option>
                                        <option value="autre">Autre</option>
                               </select>
    </div>
    <div id="div1_form4"> <label  for=""><span class="label_form1">City </span>  :  </label> 
                                <select name="<?php echo "city.$i" ?>" class="input_select_form1">
                                        <option value="default">Séléctionner la cité</option>
                                        <option value="livraison">Montreal</option>
                                        <option value="facture">Quebec</option>
                                        <option value="autre">Ottawa</option>
                                        <option value="autre">New Brunswik</option>
                                        <option value="autre">Manitoba</option>
                               </select>
    </div>
    <div id="div1_form5"> <label for=""><span class="label_form1">zipcode </span>  : </label> <input class="input_form1" text="" name="<?php echo "zipcode".$i?>" placeholder="Saisir le code postal"></div>
    
    <?php } ?>
    <button type="submit" id="btn_submit">Valider</button>
</form>
</div>
</body>
</html>


