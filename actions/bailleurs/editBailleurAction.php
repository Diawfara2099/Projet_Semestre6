<?php
require('../../Database/bailleur_db.php');

if (isset($_GET['id']) && !empty($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT, array('options' => array('min_range' => 1)))) {
    $resultat = getOneBailleur($_GET['id']);

    if ($resultat->rowCount() > 0) {
        $bailleur = $resultat->fetch();
        $nom = $bailleur['nom'];
        $prenom = $bailleur['prenom'];
        $adresse = $bailleur['adresse'];
        $tel = $bailleur['tel'];
        $CIN = $bailleur['CIN'];
    } else {
        $errorMessage = 'Ce bailleur n\'existe pas!';
    }
} else {
    $errorMessage = "L'id du bailleur doit être un entier valide supérieur ou égal à 1 !";
}

if (isset($_POST['envoyer'])) {
    // Vérification des données reçues
    if (
        isset($_POST['nom']) && !empty($_POST['nom']) &&
        isset($_POST['prenom']) && !empty($_POST['prenom']) &&
        isset($_POST['adresse']) && !empty($_POST['adresse']) &&
        isset($_POST['tel']) && !empty($_POST['tel']) &&
        isset($_POST['CIN']) && !empty($_POST['CIN'])
    ) {
        // Récupération des données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $tel = $_POST['tel'];
        $CIN = $_POST['CIN'];
        $id = $_GET['id'];

        // Appel de la fonction de mise à jour
        updateBailleur($id, $nom, $prenom, $adresse, $tel, $CIN);
        $message = "Le bailleur a été modifié avec succès!";
        header("Location: bailleurs.php?message=" . $message);
        exit;
    } else {
        // Si des champs sont manquants
        $errorMessage = 'Tous les champs sont obligatoires !';
    }
}
