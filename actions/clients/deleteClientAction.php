<?php
require('../../Database/client_db.php');



if(isset($_GET['id']) AND !empty($_GET['id']) AND filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))){
    $resultat = getOneclient($_GET['id']);

    if($resultat->rowCount() > 0){
        $client = $resultat->fetch();
        deleteClient($client['id']);
        deleteClient($client['id']);
            $message = "L'client' a été supprimée avec succès!";

        header("Location:/views/clients/clients.php?message=" . $message);
    }else{
        $errorMessage =  'Cet client n\'existe pas!';
    }
}else{
    $errorMessage = "L'id de l'client doit être un entier valide supérieur ou égale à 1 !";
}