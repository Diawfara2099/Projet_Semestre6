<?php
require_once '../../Database/location_db.php';

// Récupérer la liste des bailleurs
$bailleurs = getAllLocations();

// Variables pour les messages
$message = null;
$message = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $location = getLocationById($id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $libelle = $_POST['libelle'];
    $adresse = $_POST['adresse'];
    $type = $_POST['type'];
    $prix = $_POST['prix'];
    $bailleur_id = $_POST['bailleur_id']; // Nouveau bailleur sélectionné

    // Mettre à jour la location avec le nouveau bailleur
    if (updateLocationWithBailleur($id, $libelle, $adresse, $type, $prix, $bailleur_id)) {
        $message = "La location a été modifiée avec succès.";
    } else {
        $message = "Une erreur est survenue lors de la modification de la location.";
    }

    // Redirection vers la liste des locations
    header('Location: locations.php');
    exit;
}
?>
