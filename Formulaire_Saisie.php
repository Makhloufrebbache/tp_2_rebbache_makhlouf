<?php
require_once("Function.php");
 session_start();
//  Récupérer le nombre de formuaire a crées
if (isset($_SESSION["retour_validation"])){
     $nbr_forms=$_SESSION["nbr_adresse_valid"];
}
else{
     $nbr_forms=$_POST["nbr_adresse"];
}
?>
<?php
// Récupérer le message d'érreur et de l'affecter à une variable de session afin de le récupérer dans l'index 
$Msg_error_index=verifierDataFormsNbr($nbr_forms);
if ($Msg_error_index["isValid"]==false ) { 
  if (!($_SESSION["retour_validation"])){
  $_SESSION["Message_error_index"]= $Msg_error_index["msg"];
    header("Location: index.php");
  }
}
else{
   $_SESSION["Message_error_index"]= "";
}

//Controle de formuaire de saisie afin de l'envoyer à la validation
$error="";
 $errorColor="";
if (isset ($_SESSION["Msg_error_saisie"])){
    $error=$_SESSION["Msg_error_saisie"];
    session_destroy();
}
$errorColor= 'style = "color: red"';
$borderColor='style = "border-color: red; border-width: 2px"';
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
  <h2><?php echo $error ?></h2>
  <input hidden text="" name= "retour_validation" value="<?php echo $Msg_error_index["isValid"]?>">
  <input hidden text="" name= "nbr_adresse_valid" value="<?php echo $nbr_forms ?>">
  <?php 
  for ($i= 0; $i < $nbr_forms; $i++) { ?>
   <p id="title_form1">Adresse N°: <?php echo $i+1?></p>
    <div id="div1_form1"> <label  for=""><span <?php if (isset($_SESSION["infos_street_saisie$i"]) && empty($_SESSION["infos_street_saisie$i"])) echo $errorColor ?> class="label_form1">Street </span>  : </label>
                          <input class="input_form1" text="" name= "<?php echo "street".$i ?>" value="<?php if (isset ($_SESSION["infos_street_saisie$i"])) echo $_SESSION["infos_street_saisie$i"]?>" placeholder="Saisir le nom de la rue"
                          <?php if (isset($_SESSION["infos_street_saisie$i"]) && empty($_SESSION["infos_street_saisie$i"])) echo $borderColor ?>>
    </div>
    <div id="div1_form2"> <label  for=""><span <?php if (isset($_SESSION["infos_streetnb_saisie$i"]) && empty($_SESSION["infos_streetnb_saisie$i"])) echo $errorColor ?> class="label_form1">Street numbrer </span>  :  </label>
                          <input class="input_form1" text="" name="<?php echo "street_nb".$i ?>" value="<?php if (isset ($_SESSION["infos_streetnb_saisie$i"])) echo $_SESSION["infos_streetnb_saisie$i"]?>"  placeholder="Saisir le numéro de la rue"
                          <?php if (isset($_SESSION["infos_streetnb_saisie$i"]) && empty($_SESSION["infos_streetnb_saisie$i"])) echo $borderColor ?>>
    </div>
    <div id="div1_form3"> <label for=""><span <?php if (isset($_SESSION["infos_type_saisie$i"]) && empty($_SESSION["infos_type_saisie$i"])) echo $errorColor ?> class="label_form1">type </span>  : </label>
                               <select name="<?php echo "type.$i" ?>" placeholder="Saisir le nom de la rue" class="input_select_form1"
                                             <?php if (isset($_SESSION["infos_type_saisie$i"]) && empty($_SESSION["infos_type_saisie$i"])) echo $borderColor ?>>
                                        <option value=<?php if (isset ($_SESSION["infos_type_saisie$i"])) echo $_SESSION["infos_type_saisie$i"];else echo "" ?>><?php if (isset ($_SESSION["infos_type_saisie$i"])) echo $_SESSION["infos_type_saisie$i"];else echo "Séléctionner le type" ?></option>
                                        <option value="Livraison">Livraison</option>
                                        <option value="Facture">Facture</option>
                                        <option value="Autre">Autre</option>
                               </select>
    </div>
    <div id="div1_form4"> <label for=""> <span <?php if (isset($_SESSION["infos_city_saisie$i"]) && empty($_SESSION["infos_city_saisie$i"])) echo $errorColor ?> class="label_form1">City  </span>  :  </label> 
                                <select name="<?php echo "city.$i" ?>" class="input_select_form1"
                                               <?php if (isset($_SESSION["infos_city_saisie$i"]) && empty($_SESSION["infos_city_saisie$i"])) echo $borderColor ?>>
                                        <option value=<?php if (isset ($_SESSION["infos_city_saisie$i"])) echo $_SESSION["infos_city_saisie$i"];else echo "" ?>><?php if (isset ($_SESSION["infos_city_saisie$i"])) echo $_SESSION["infos_city_saisie$i"];else echo "Séléctionner la cité" ?></option>
                                        <option value="Montréal">Montréal</option>
                                        <option value="Quebec">Quebec</option>
                                        <option value="Ottawa">Ottawa</option>
                                        <option value="New Brunswik">New Brunswik</option>
                                        <option value="Manitoba">Manitoba</option>
                                </select>
    </div>
    <div id="div1_form5"> <label for=""><span <?php if (isset($_SESSION["infos_zipcode_saisie$i"]) && empty($_SESSION["infos_zipcode_saisie$i"])) echo $errorColor ?> class="label_form1">zipcode </span>  : </label>
                          <input class="input_form1" text="" name="<?php echo "zipcode".$i?>" value="<?php if (isset ($_SESSION["infos_zipcode_saisie$i"])) echo $_SESSION["infos_zipcode_saisie$i"]?>" placeholder="Saisir le code postal"
                          <?php if (isset($_SESSION["infos_zipcode_saisie$i"]) && empty($_SESSION["infos_zipcode_saisie$i"])) echo $borderColor ?>>   
    </div>
    <?php } ?>
    <button type="submit" id="btn_submit">Valider</button>
    <a href="index.php"><div id="div_btn_retour_index">Retour </div></a>
</form>

</div>
</body>
</html>


