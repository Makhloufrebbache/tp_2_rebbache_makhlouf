 <?php
 /* Fonction qui récupère le dernier élément de tableau*/
 function endKey($array) {
          end($array);
          return key($array);
    }
/*Fonction quirécupère de le dernier élément d'une chaine de caractère*/
function endchain($chaine_de_caractere) {
         return substr($chaine_de_caractere, -1);
    }
/* fonction pour concroler la saisie de la page d'index */
   function verifierDataFormsNbr($p1){

    if (empty($p1)) {
    $Msg=['isValid' => false,'msg'=>'Erreur: Le champs nombres adresses est vide'];
    }
    elseif (!(is_numeric($p1))){
  
     $Msg=['isValid' => false,'msg'=>'Erreur: Veuillez saisir un chiffre'];
    }
    else{
      $Msg=['isValid' =>true,'msg'=>'Saisie correcte']  ;
    }
    return $Msg;
   } 
   /* fonction pour concroler la saisie de la page de saisie */
   function verifierDataFormsSaisie($p1,$p2,$p3,$p4,$p5,){

    if (empty($p1)) {
    $Msg=['isValid' => false,'msg'=>'Erreur: Le premier champs est vide'];
    }
    if (!(is_numeric($p2))){
  
     $Msg=['isValid' => false,'msg'=>'Erreur: Veuillez saisir un chiffre dans le deuxième champs'];
    }
    if (empty($p2)) {
    $Msg=['isValid' => false,'msg'=>'Erreur: Le deuxième champs est vide'];
    }
    if ($p3=="default") {
    $Msg=['isValid' => false,'msg'=>'Erreur: Veuillez séléctionner un type pour la facture'];
    }
    if ($p4=="default") {
    $Msg=['isValid' => false,'msg'=>'Erreur: Veuillez séléctionner un choix pour la cité'];
    }
    if (empty($p5)) {
    $Msg=['isValid' => false,'msg'=>'Erreur: Le cinqième champs est vide'];
    }
    
    
    return $Msg;
   }  

   /*Fonction d'insertion d'adresse dans la base de données*/
function createAdress( $data,$i)
 {
    global $conn;
   
    $query = "INSERT INTO address VALUES (NULL,?,?,?,?,?)";

    
    if ($stmt = mysqli_prepare($conn, $query)) {
       
        mysqli_stmt_bind_param(
            $stmt,
            "sisss",
            $data['street'.$i],
            $data['street_nb'.$i],
            $data['type'.$i],
            $data['city'.$i],
            $data['zipcode'.$i]
        );

        $result = mysqli_stmt_execute($stmt);
    }
}

?>

