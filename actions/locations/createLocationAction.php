<?php
require('../../Database/location_db.php');

if(isset($_POST['envoyer'])){
    if(!empty($_POST['libelle']) && !empty($_POST['adresse']) && !empty($_POST['type'])
        && !empty($_POST['prix']) && !empty($_POST['id_bailleur'])) {
            extract($_POST);
            addLocation($libelle, $adresse, $type, $prix, $id_bailleur);
            $message = "La location a été ajoutée avec succès!";
            header("Location: locations.php?message=" . $message);
            exit(); // Assurez-vous de terminer le script après la redirection
    } else {
        $errorMessage = "Veuillez remplir tous les champs obligatoires !";
    }
}
?>
