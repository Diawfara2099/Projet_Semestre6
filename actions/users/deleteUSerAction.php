<?php
require('../../Database/utilisateur_db.php');

if (isset($_GET['id']) && !empty($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
    $resultat = getOnUser($_GET['id']);

    if ($resultat->rowCount() > 0) {
        $usser = $resultat->fetch();
        deleteUser($usser['id']);
        $message = "Utilisateur a été supprimé avec succès!";
        header("Location: /views/users/users.php?message=" . urlencode($message));
        exit();
    } else {
        $errorMessage = 'Cette Utilisateur n\'existe pas!';
        header("Location: /views/users/users.php?error=" . urlencode($errorMessage));
        exit();
    }
} else {
    $errorMessage = "L'id du usser doit être un entier valide supérieur ou égal à 1!";
    header("Location: /views/ussers/ussers.php?error=" . urlencode($errorMessage));
    exit();
}
?>
