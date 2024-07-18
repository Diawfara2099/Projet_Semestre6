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
function getAllLocatio() {
    global $connexion;
    
    $query = "SELECT id, libelle, adresse, type, prix, bailleur_nom, bailleur_prenom, bailleur_adresse, bailleur_tel, bailleur_cin FROM Location";
    $stmt = $connexion->query($query);
    return $stmt;
}
function getLocationById($id) {
    global $connexion;
    $stmt = $connexion->prepare('
        SELECT l.*, b.nom AS bailleur_nom, b.prenom AS bailleur_prenom, b.adresse AS bailleur_adresse, b.tel AS bailleur_tel, b.CIN AS bailleur_cin
        FROM Location l
        JOIN Bailleur b ON l.id_bailleur = b.id
        WHERE l.id = ?
    ');
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_OBJ);
}
function updateLocationWithBailleur($id, $libelle, $adresse, $type, $prix, $bailleur_id) {
    global $connexion;
    $stmt = $connexion->prepare('UPDATE Location SET libelle = ?, adresse = ?, type = ?, prix = ?, id_bailleur = ? WHERE id = ?');
    $stmt->execute([$libelle, $adresse, $type, $prix, $bailleur_id, $id]);
}
// Dans location_db.php ou un fichier similaire




function updateLocation($id, $libelle, $adresse, $type, $prix, $bailleur_nom, $bailleur_prenom, $bailleur_adresse, $bailleur_tel, $bailleur_cin) {
    global $connexion;
    $stmt = $connexion->prepare('UPDATE location SET libelle = ?, adresse = ?, type = ?, prix = ?, bailleur_nom = ?, bailleur_prenom = ?, bailleur_adresse = ?, bailleur_tel = ?, bailleur_cin = ? WHERE id = ?');
    $stmt->execute([$libelle, $adresse, $type, $prix, $bailleur_nom, $bailleur_prenom, $bailleur_adresse, $bailleur_tel, $bailleur_cin, $id]);
}

function deleteLocation($id) {
    global $connexion;
    $stmt = $connexion->prepare('DELETE FROM location WHERE id = ?');
    $stmt->execute([$id]);
}




function getOnLocation($id) {
    global $connexion;
    $query = $connexion->prepare("SELECT * FROM location WHERE id = ?");
    $query->execute([$id]);
    return $query;
}
?>

?>
