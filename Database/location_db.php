<?php
require('db_connection.php');

function getAllLocations() {
    global $connexion;
    $query = "SELECT Location.id, Location.libelle, Location.adresse, Location.type, Location.prix, 
              Bailleur.nom AS bailleur_nom, Bailleur.prenom AS bailleur_prenom, Bailleur.adresse AS bailleur_adresse,
              Bailleur.tel AS bailleur_tel, Bailleur.CIN AS bailleur_cin
              FROM Location
              INNER JOIN Bailleur ON Bailleur.id = Location.id_bailleur";
    $resultat = $connexion->query($query);
    return $resultat;
}


function addLocation($libelle, $adresse, $type, $prix, $id_bailleur) {
    global $connexion;

    $query = "INSERT INTO Location(libelle, adresse, type, prix, id_bailleur) VALUES(?,?,?,?,?)";
    $stmt = $connexion->prepare($query);
    $stmt->execute(array($libelle, $adresse, $type, $prix, $id_bailleur));
    $stmt->closeCursor();
}


?>
