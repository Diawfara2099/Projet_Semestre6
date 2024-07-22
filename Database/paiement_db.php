<?php
require('db_connection.php');

function getAllpaiements() {
    global $connexion;
    $query = "SELECT paiements.id, paiements.date_paiement, contrat.id AS contrat_id, client.nom AS client_nom, client.prenom AS client_prenom, gestionnaire_id
              FROM paiements
              JOIN contrat ON paiements.contrat_id = contrat.id
              JOIN client ON contrat.id_client = client.id";
    $resultat = $connexion->query($query);
    return $resultat;
}

/*
function addPaiemnt($date_paiement, $contrat_id, $client_id, $gestionnaire_id){
    global $connexion;

    $query = "INSERT INTO paiements (date_paiement, contrat_id, client_id, gestionnaire_id) 
    VALUES (:date_paiement, :contrat_id, :client_id, :gestionnaire_id)";

    $stmt = $connexion->prepare($query);
    $stmt->execute(array($date_paiement, $contrat_id, $client_id, $gestionnaire_id));
    $stmt->closeCursor();
}
*/

function addPaiement($date_paiement, $contrat_id, $gestionnaire_id) {
    global $connexion;

    $query = "INSERT INTO paiements (date_paiement, contrat_id, gestionnaire_id) 
              VALUES (:date_paiement, :contrat_id, :gestionnaire_id)";

    $stmt = $connexion->prepare($query);

    // Lier les paramètres
    $stmt->bindParam(':date_paiement', $date_paiement);
    $stmt->bindParam(':contrat_id', $contrat_id);
    $stmt->bindParam(':gestionnaire_id', $gestionnaire_id);

    // Exécuter la requête
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}


function getPaiementById($id) {
    global $connexion;
    $query = 'SELECT p.*, c.nom as client_nom, c.prenom as client_prenom
              FROM paiements p
              JOIN contrat ct ON p.contrat_id = ct.id
              JOIN client c ON ct.id_client = c.id
              WHERE p.id = :id';
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
}


function deletePaiement($id) {
    global $connexion;
    $stmt = $connexion->prepare("DELETE FROM paiements WHERE id = ?");
    $stmt->execute([$id]);
}



function getOnePaiement($id) {
    global $connexion;
    $query = $connexion->prepare("SELECT * FROM paiements WHERE id = ?");
    $query->execute([$id]);
    return $query;
}
