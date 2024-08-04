<?php
require('../../Database/client_db.php');

if (isset($_GET['id']) && !empty($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT, array('options' => array('min_range' => 1)))) {
    $resultat = getOneClient($_GET['id']);

    if ($resultat->rowCount() > 0) {
        $bailleur = $resultat->fetch();
        $nom = $bailleur['nom'];
        $prenom = $bailleur['prenom'];
        $email = $bailleur['email'];
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
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['tel']) && !empty($_POST['tel']) &&
        isset($_POST['CIN']) && !empty($_POST['CIN'])
    ) {
        // Récupération des données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $CIN = $_POST['CIN'];
        $id = $_GET['id'];

        // Appel de la fonction de mise à jour
        updateClient($id, $nom, $prenom, $email, $tel, $CIN);
        $message = "Le bailleur a été modifié avec succès!";
        header("Location: clients.php?message=" . $message);
        exit;
    } else {
        // Si des champs sont manquants
        $errorMessage = 'Tous les champs sont obligatoires !';
    }
}
