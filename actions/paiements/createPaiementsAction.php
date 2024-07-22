<?php
require('../../Database/paiement_db.php');

if (isset($_POST['envoyer'])) {

    if (!empty($_POST['date_paiement']) && !empty($_POST['contrat_id']) && !empty($_POST['gestionnaire_id'])) {

        // Extraction des données du formulaire
        $date_paiement = $_POST['date_paiement'];
        $contrat_id = $_POST['contrat_id'];
        $gestionnaire_id = $_POST['gestionnaire_id'];

        // Ajouter le paiement
        if (addPaiement($date_paiement, $contrat_id, $gestionnaire_id)) {
            $message = "Le paiement a été ajouté avec succès!";
            header("Location: paiements.php?message=" . urlencode($message));
            exit();
        } else {
            $errorMessage = "Une erreur est survenue lors de l'ajout du paiement.";
        }
    } else {
        $errorMessage = "Veuillez remplir tous les champs obligatoires!";
    }
}
?>
