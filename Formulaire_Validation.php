<?php
require_once("Function.php");
require_once("adressCrud.php");
 $nbr_forms_valid = $_POST["nbr_adresse_valid"];

/*Tester si le formulaire de saisie est bien rempli*/
session_start();
if (isset($_POST)) { 
     
   $_SESSION = $_POST;

}else {
header("Location: Formulaire_Saisie.php");
die();
}

?>

<form action="traitement.php" method="post">
 <input hidden text="" name= "nbr_adresse_valid" value='<?php echo $nbr_forms_valid ?>'> 
  <?php 
   for ($i= 0; $i < $nbr_forms_valid; $i++) { ?>
   <p>Adresse N°: <?php echo $i+1?></p>
    <div> <label for="">Street: </label> <input text name= "<?php echo "street".$i?>" value="<?php echo $_POST["street$i"] ?>" ></div>
   <div> <label for="">Street_nb: </label> <input  name="<?php echo "street_nb".$i?>" value="<?php echo $_POST["street_nb$i"] ?>" ></div>
    <div> <label for="">Type: </label> <input  name="<?php echo "type".$i?>" value="<?php echo $_POST["type_$i"] ?>" ></div>
    <div> <label for="">City: </label> <input  name="<?php echo "city".$i?>" value="<?php echo $_POST["city_$i"] ?>"?></div>
    <div> <label for="">Zipcode: </label> <input  name="<?php echo "zipcode".$i ?>" value="<?php echo $_POST["zipcode$i"] ?>"></div>

    <?php } ?>

    <button type="submit">Enregistrer</button>
</form>






 