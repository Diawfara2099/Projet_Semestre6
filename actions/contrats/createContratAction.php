<?php
include_once '../../Database/contrat_db.php'; // Inclure le fichier de fonctions de gestion des contrats

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date_DEB = $_POST['date_DEB'];
    $date_FIN = $_POST['date_FIN'];
    $modePaiement = $_POST['modePaiement'];
    $id_client = $_POST['id_client'];
    $id_location = $_POST['id_location'];

    // Vérifier si une location a déjà un contrat
    if (locationHasContract($id_location)) {
        header("Location: contrats.php?error=Erreur%20:%20Cette%20location%20a%20déjà%20un%20contrat.");
    } else {
        // Ajouter le nouveau contrat
        if (addContract($date_DEB, $date_FIN, $modePaiement, $id_client, $id_location)) {
            header("Location: contrats.php?message=Contrat%20ajouté%20avec%20succès.");
        } else {
            header("Location: contrats.php?error=Erreur%20:%20Impossible%20d'ajouter%20le%20contrat.");
        }
    }
    exit();
}
?>
