<?php
require('../../Database/contrat_db.php');

if (isset($_GET['id']) && !empty($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
    $resultat = getOneContrat($_GET['id']);

    if ($resultat->rowCount() > 0) {
        $contrat = $resultat->fetch();
        deleteContrat($contrat['id']);
        $message = "Le contrat a été supprimé avec succès!";
        header("Location: /views/contrats/contrats.php?message=" . urlencode($message));
        exit();
    } else {
        $errorMessage = 'Ce contrat n\'existe pas!';
        header("Location: /views/contrats/contrats.php?error=" . urlencode($errorMessage));
        exit();
    }
} else {
    $errorMessage = "L'id du contrat doit être un entier valide supérieur ou égal à 1!";
    header("Location: /views/contrats/contrats.php?error=" . urlencode($errorMessage));
    exit();
}
?>
