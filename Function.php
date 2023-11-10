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
/* fonction pour concroler la saisie à parir de la page d'index */
   function verifierDataFormsIdex($p1){

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




?>
