<?php
session_start();
require_once("Function.php");
require_once("connexion.php");
$adress=[];
for ($i=0; $i < $_SESSION["nbr_adresse_valid"] ; $i++) { 
  $adress["street$i"]=$_SESSION["infos_street_saisie$i"];
  $adress["street_nb$i"]= $_SESSION["infos_streetnb_saisie$i"];
  $adress["type$i"]=$_SESSION["infos_type_saisie$i"];
  $adress["city$i"]=$_SESSION["infos_city_saisie$i"];
  $adress["zipcode$i"]=$_SESSION["infos_zipcode_saisie$i"];
  createAdress($adress,$i);
 
}
session_destroy();
session_start();
$_SESSION["msg_succes"]="Succes!: insérées avec succés";
header("Location: index.php");




