<?php
require('../../Database/bailleur_db.php');

if(isset($_GET['id']) && !empty($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))){
    $id = $_GET['id'];

    // Vérifier si le bailleur existe
    $result = getOneBailleur($id);

    if($result->rowCount() > 0){
        // Vérifier si le bailleur a des locations associées
        $locationResult = getLocationsByBailleur($id);

        if($locationResult->rowCount() == 0){
            deleteBailleur($id);
            $message = "Le bailleur a été supprimé avec succès!";
        } else {
            $errorMessage = 'Ce bailleur ne peut pas être supprimé car il possède des locations associées!';
        }
    } else {
        $errorMessage = 'Ce bailleur n\'existe pas!';
    }
} else {
    $errorMessage = "L'id du bailleur doit être un entier valide supérieur ou égal à 1!";
}

// Redirection vers la page de liste des bailleurs avec un message
if(isset($message)) {
    header("Location:/views/bailleurs/bailleurs.php?message=" . urlencode($message));
    exit;
} elseif(isset($errorMessage)) {
    header("Location:/views/bailleurs/bailleurs.php?error=" . urlencode($errorMessage));
    exit;
}
?>
