<?php
require('../../Database/paiement_db.php');



if(isset($_GET['id']) AND !empty($_GET['id']) AND filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))){
    $resultat = getOnePaiement($_GET['id']);

    if($resultat->rowCount() > 0){
        $paiement = $resultat->fetch();
        deletePaiement($paiement['id']);
        deletePaiement($paiement['id']);
            $message = "L'paiement' a été supprimée avec succès!";

        header("Location:/views/paiements/paiements.php?message=" . $message);
    }else{
        $errorMessage =  'Cet paiement n\'existe pas!';
    }
}else{
    $errorMessage = "L'id de l'paiement doit être un entier valide supérieur ou égale à 1 !";
}