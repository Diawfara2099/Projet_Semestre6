<?php

require_once 'db_connection.php'; // Inclure le fichier de connexion à la base de données

function getClients() {
    global $connexion;
    $query = "SELECT id, nom, prenom FROM client";
    $resultat = $connexion->query($query);
    return $resultat;
}
// Fonction pour récupérer tous les client depuis la base de données
function getAllClient() {
    global $connexion; // Utilisation de la connexion à la base de données définie dans db_connection.php

    try {
        $query = "SELECT * FROM Client"; // Correction de la requête SQL
        $stmt = $connexion->query($query);
        return $stmt;
    } catch (PDOException $e) {
        // Gestion des erreurs PDO
        echo "Erreur de récupération des client: " . $e->getMessage();
        return false;
    }
}


function addClient($nom, $prenom, $email, $tel, $cin) {
    global $connexion;

    $query = "INSERT INTO Client (nom, prenom, email, tel, CIN) VALUES (?, ?, ?, ?, ?)";
    $stmt = $connexion->prepare($query);
    $stmt->execute(array($nom, $prenom, $email, $tel, $cin));
    $stmt->closeCursor();
}


// Récupère un Client par son ID
function getOneClient($id) {
    global $connexion;
    $query = $connexion->prepare("SELECT * FROM Client WHERE id = ?");
    $query->execute([$id]);
    return $query;
}

function updateClient($id, $nom, $prenom, $email, $tel, $CIN) {
    global $connexion;
    $stmt = $connexion->prepare("UPDATE Client SET nom = ?, prenom = ?, email = ?, tel = ?, CIN = ? WHERE id = ?");
    $stmt->execute([$nom, $prenom, $email, $tel, $CIN, $id]);
}



function deleteClient($id) {
    global $connexion;
    $stmt = $connexion->prepare("DELETE FROM Client WHERE id = ?");
    $stmt->execute([$id]);
}

function getLocationsByClient($id_Client) {
    global $connexion;;
    $query = $connexion->prepare('SELECT * FROM Location WHERE id_Client = :id_Client');
    $query->bindParam(':id_Client', $id_Client, PDO::PARAM_INT);
    $query->execute();
    return $query;
}

