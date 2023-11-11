<?php
require_once("Function.php");
require_once("connexion.php");

$nbr_forms_valid= $_POST[ "nbr_adresse_valid"];
for ($i=0; $i <= $nbr_forms_valid ; $i++) { 
createAdress($_POST,$i);
}
?>
<label for=""><?php echo "Succés: adrese enregistré avec succées!."?></label>
<?php  header("Location: index.php");sleep(2) ?>

