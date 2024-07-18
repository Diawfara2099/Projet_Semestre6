<?php

require_once 'db_connection.php'; // Inclure le fichier de connexion à la base de données

// Fonction pour récupérer tous les bailleurs depuis la base de données
function getAllBailleurs() {
    global $connexion; // Utilisation de la connexion à la base de données définie dans db_connection.php

    try {
        $query = "SELECT * FROM Bailleur"; // Correction de la requête SQL
        $stmt = $connexion->query($query);
        return $stmt;
    } catch (PDOException $e) {
        // Gestion des erreurs PDO
        echo "Erreur de récupération des bailleurs: " . $e->getMessage();
        return false;
    }
}


function addBailleur($nom, $prenom, $adresse, $tel, $cin) {
    global $connexion;

    $query = "INSERT INTO Bailleur (nom, prenom, adresse, tel, CIN) VALUES (?, ?, ?, ?, ?)";
    $stmt = $connexion->prepare($query);
    $stmt->execute(array($nom, $prenom, $adresse, $tel, $cin));
    $stmt->closeCursor();
}


// Récupère un bailleur par son ID
function getOneBailleur($id) {
    global $connexion;
    $query = $connexion->prepare("SELECT * FROM bailleur WHERE id = ?");
    $query->execute([$id]);
    return $query;
}

function updateBailleur($id, $nom, $prenom, $adresse, $tel, $CIN) {
    global $connexion;
    $stmt = $connexion->prepare("UPDATE bailleur SET nom = ?, prenom = ?, adresse = ?, tel = ?, CIN = ? WHERE id = ?");
    $stmt->execute([$nom, $prenom, $adresse, $tel, $CIN, $id]);
}


// Dans votre fichier bailleur_db.php
function deleteBailleur($id) {
    global $connexion;
    $stmt = $connexion->prepare("DELETE FROM bailleur WHERE id = ?");
    $stmt->execute([$id]);
}

function getLocationsByBailleur($id_bailleur) {
    global $connexion;;
    $query = $connexion->prepare('SELECT * FROM Location WHERE id_bailleur = :id_bailleur');
    $query->bindParam(':id_bailleur', $id_bailleur, PDO::PARAM_INT);
    $query->execute();
    return $query;
}

