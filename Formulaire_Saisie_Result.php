
<?php

session_start();

// Todo : valider les données de mon form 
// si les données ne sont pas bonne : renvoyer vers le form d'enregistrement (redirect auto )
// attention on veut récupérer les données rentrées précédement : $_SESSION




if (isset($_POST["street"])) {   
    $_SESSION = $_POST;
    echo "poste n'est pas vide";
// valid user name


}else {

}
?>
