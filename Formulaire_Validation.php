<?php

require_once("Function.php");
$nbr_forms_valid = $_POST["nbr_adresse_valid"];
//Affecter les valeurs des champs envoyé par le formulaire de sasie dans des variables de session, afin de pouvoir les renvoyer à nouveau.
session_start();
for ($i=0; $i <$nbr_forms_valid ; $i++) { 
    $_SESSION["infos_street_saisie$i"]=$_POST["street$i"];
    $_SESSION["infos_streetnb_saisie$i"]=$_POST["street_nb$i"];
    $_SESSION["infos_type_saisie$i"]=$_POST["type_$i"];
    $_SESSION["infos_city_saisie$i"]=$_POST["city_$i"];
    $_SESSION["infos_zipcode_saisie$i"]=$_POST["zipcode$i"];

} 
    $_SESSION["retour_validation"]=$_POST["retour_validation"];
    $_SESSION["nbr_adresse_valid"]=$_POST["nbr_adresse_valid"];
// Récupérer le message d'érreur et de l'affecter à une variable de session afin de le récupérer dans le formulaire de saise 
    $Msg_error_saisie = verifierDataFormsSaisie($_POST,$nbr_forms_valid );
if ($Msg_error_saisie["isValid"]==false ) { 
    $_SESSION["Msg_error_saisie"]=$Msg_error_saisie["msg"];
    header("Location: Formulaire_Saisie.php");
  } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulaire validation</title>
</head>
<body>
<div id="msg_error_forms_saisie">
<?php for ($i=0; $i < $nbr_forms_valid ; $i++) { 
  //$Msg_error_saisie =  verifierDataFormsSaisie($_POST,$nbr_forms_valid );
 }?>
 </div>
<div id="form2">
<form action="traitement.php" method="post">
 <input hidden text="" name= "nbr_adresse_valid" value='<?php echo $nbr_forms_valid ?>'> 
  <?php 
   for ($i= 0; $i < $nbr_forms_valid; $i++) { ?>
    <p  id="title_form0">Adresse N°: <?php echo $i+1?></p>
    <div id="div1_form0"> <label for=""><span >Street:</span> </label> <input class="input_form1" name= "<?php echo "street".$i?>" value="<?php echo $_POST["street$i"] ?>"></div>
    <div id="div2_form0"> <label for=""><span >Street_nb:</span></label> <input class="input_form1" name="<?php echo "street_nb".$i?>" value="<?php echo $_POST["street_nb$i"] ?>" ></div>
    <div id="div3_form0"> <label for=""><span >Type:</span></label> <input class="input_form1" name="<?php echo "type".$i?>" value="<?php echo $_POST["type_$i"] ?>" ></div>
    <div id="div4_form0"> <label for=""><span >City:</span></label> <input class="input_form1" name="<?php echo "city".$i?>" value="<?php echo $_POST["city_$i"] ?>"?></div>
    <div id="div5_form0"> <label for=""><span >Zipe:</span> </label> <input class="input_form1" name="<?php echo "zipcode".$i ?>" value="<?php echo $_POST["zipcode$i"] ?>"></div>
    <?php } ?>
    <button id="btn_submit1" type="submit">Enregistrer</button> 
    <a href="./Formulaire_Saisie.php"><div id="div_btn_retour">Modifier</div></a>
</form>
</div>   
</body>
</html>



 