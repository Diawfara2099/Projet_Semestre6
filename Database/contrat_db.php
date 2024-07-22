<?php

require_once 'db_connection.php'; // Inclure le fichier de connexion à la base de données

function getContrats() {
    global $connexion;
    $query = "SELECT id FROM contrat";
    $resultat = $connexion->query($query);
    return $resultat;
}
function getAllContrat() {
    global $connexion; // Utilisation de la connexion à la base de données définie dans db_connection.php

    $sql = "
        SELECT Contrat.id, Contrat.date_DEB, Contrat.date_FIN, Contrat.modePaiement, Client.nom AS client_nom, Client.prenom AS client_prenom, Location.adresse AS location_adresse,Location.type AS type_location
        FROM Contrat
        JOIN Client ON Contrat.id_client = Client.id
        JOIN Location ON Contrat.id_location = Location.id
    ";

    $stmt = $connexion->query($sql); // Exécuter la requête
    return $stmt->fetchAll(); // Récupérer tous les résultats
}

// Exemple d'utilisation
//$clients = getAllClient();

function createContrat($date_DEB, $date_FIN, $modePaiement, $id_client, $id_location) {
    global $connexion;

    $sql = "
        INSERT INTO Contrat (date_DEB, date_FIN, modePaiement, id_client, id_location)
        VALUES (:date_DEB, :date_FIN, :modePaiement, :id_client, :id_location)
    ";

    $stmt = $connexion->prepare($sql);
    $stmt->execute([
        ':date_DEB' => $date_DEB,
        ':date_FIN' => $date_FIN,
        ':modePaiement' => $modePaiement,
        ':id_client' => $id_client,
        ':id_location' => $id_location
    ]);
}
    function locationHasContract($id_location) {
        global $connexion;
    
        $stmt = $connexion->prepare('SELECT COUNT(*) FROM Contrat WHERE id_location = ?');
        $stmt->execute([$id_location]);
        $count = $stmt->fetchColumn();
    
        return $count > 0;
    }
    

    function addContract($date_DEB, $date_FIN, $modePaiement, $id_client, $id_location) {
        global $connexion;
    
        try {
            $stmt = $connexion->prepare('
                INSERT INTO Contrat (date_DEB, date_FIN, modePaiement, id_client, id_location) 
                VALUES (?, ?, ?, ?, ?)
            ');
            $stmt->execute([$date_DEB, $date_FIN, $modePaiement, $id_client, $id_location]);
    
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

/*
    function updateContrat($id, $date_DEB, $date_FIN, $modePaiement, $id_client, $id_location) {
        global $connexion;
    
        $stmt = $connexion->prepare('
            UPDATE Contrat
            SET date_DEB = ?, date_FIN = ?, modePaiement = ?, id_client = ?, id_location = ?
            WHERE id = ?
        ');
        $stmt->execute([$date_DEB, $date_FIN, $modePaiement, $id_client, $id_location, $id]);
        return 'Contrat mis à jour avec succès.';
    }
*/

    function getContratById($id) {
        global $connexion;
        $stmt = $connexion->prepare('SELECT * FROM Contrat WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    function updateContrat($id, $date_DEB, $date_FIN, $modePaiement, $id_client, $id_location) {
        global $connexion;
        $stmt = $connexion->prepare('UPDATE Contrat SET date_DEB = ?, date_FIN = ?, modePaiement = ?, id_client = ?, id_location = ? WHERE id = ?');
        $stmt->execute([$date_DEB, $date_FIN, $modePaiement, $id_client, $id_location, $id]);
    }
    
   
    // Récupère un Client par son ID
function getOneContrat($id) {
    global $connexion;
    $query = $connexion->prepare("SELECT * FROM Contrat WHERE id = ?");
    $query->execute([$id]);
    return $query;
}

function deleteContrat($id) {
    global $connexion;
    $stmt = $connexion->prepare("DELETE FROM contrat WHERE id = ?");
    $stmt->execute([$id]);
}