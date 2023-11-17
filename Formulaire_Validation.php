<?php

require_once("Function.php");
//Récuprer le nombre de formulaire.
$nbr_forms_valid = $_POST["nbr_adresse_valid"];
/*Affecter les valeurs du tableau $_POST envoyé par formulaire de saisie dans des variables de session pour pouvoir
les récupérer à nouveau pour modification.*/
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
// Récupérer le message d'érreur et de l'affecter à une variable de session afin de le récupérer dans le formulaire de saise. 
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
    <link rel="stylesheet" href="css/style1.css">
    <script src="script/script.js"></script>
    <title>Formulaire de validation</title>
   </head>
    <body>
    <div class="container">
        <form >
<!-- Récuprer les adresses saisie dans un tableau  -->
      <h2>Liste adresses</h2>
          <table >
            <tr>
               <th>N° Adresse</th>
               <th>Street</th>
               <th>Street number</th>
               <th>Type</th>
               <th>Cité</th>
               <th>Zipe Code</th>
            </tr>
             <?php for ($i = 0; $i < $nbr_forms_valid; $i++) {?>
            <tr>
               <td ><?php echo $i+1; ?></td>
               <td ><?php echo $_POST["street$i"] ?></td>
               <td><?php echo $_POST['street_nb'.$i] ?></td>
               <td><?php echo $_POST["type_$i"] ?></td>
               <td><?php echo $_POST["city_$i"] ?></td>
               <td><?php echo $_POST["zipcode$i"] ?></td>
            </tr>
             <?php } ?>
          </table>
        <div id="btn">
         <button id="btn_modify" formaction="Formulaire_Saisie.php">Modifier</button>
         <button id="btn_save"  formaction="traitement.php" >Sauvegarder</button>
         
        </div>
        </form>
    </div>

   </body>
   </html>



