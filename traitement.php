<?php
session_start();
require_once("Function.php");
require_once("connexion.php");
$adress=[];
for ($i=0; $i < $_SESSION["nbr_adresse_valid"] ; $i++) { 
  // Affecter les valeurs des variables de session contenant les informations d'adresses saisie dans un tableau.
  $adress["street$i"]=$_SESSION["infos_street_saisie$i"];
  $adress["street_nb$i"]= $_SESSION["infos_streetnb_saisie$i"];
  $adress["type$i"]=$_SESSION["infos_type_saisie$i"];
  $adress["city$i"]=$_SESSION["infos_city_saisie$i"];
  $adress["zipcode$i"]=$_SESSION["infos_zipcode_saisie$i"];
  // Passer la tableau adress dans la fonction afin de l'inséré dans la base de données.
  createAdress($adress,$i);
 
}
session_destroy();
// Redirection automatique vers la page d'index avec un message de succés.
session_start();
$_SESSION["msg_succes"]="Succes!: insérées avec succés";
header("Location: index.php");




