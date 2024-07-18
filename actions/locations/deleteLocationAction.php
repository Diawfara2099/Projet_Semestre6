<?php
require('../../Database/location_db.php');

if(isset($_GET['id']) && !empty($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))){
    $id = $_GET['id'];

    // Vérifier si le location existe
    $result = getOnLocation($id);

    if($result->rowCount() > 0){
        deletelocation($id);
        $message = "Le location a été supprimé avec succès!";
    }else{
        $errorMessage =  'Ce location n\'existe pas!';
    }
}else{
    $errorMessage = "L'id du location doit être un entier valide supérieur ou égal à 1!";
}

// Redirection vers la page de liste des locations avec un message
if(isset($message)) {
    header("Location:/views/locations/locations.php?message=" . urlencode($message));
    exit;
} elseif(isset($errorMessage)) {
    header("Location:/views/locations/locations.php?error=" . urlencode($errorMessage));
    exit;
}
?>
