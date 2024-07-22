<?php
require('db_connection.php');


function getUsers() {
    global $connexion;
    $query = "SELECT id, nom, prenom FROM user"; // Adaptez le nom de la table et les colonnes selon votre schéma
    $resultat = $connexion->query($query);
    return $resultat;
}
function getAllUsers(){
    global $connexion;
    $query = "SELECT * FROM user";
    $resultat = $connexion->query($query);
    return $resultat;
}

function getUserByEmail($email){
    global $connexion;

    $query = "SELECT * FROM user WHERE email = ?";
    $stmt = $connexion->prepare($query);
    $stmt->execute(array($email));
    return $stmt;
}

function addUser1($nom, $prenom, $email, $password, $avatar_name, $type) {
    global $connexion;

    $query = "INSERT INTO user(nom, prenom, email, password, avatar_name, type
) VALUES(?,?,?,?,?,?)";
    $stmt = $connexion->prepare($query);
    $stmt->execute(array($nom, $prenom, $email, $password, $avatar_name, $type));
    $stmt->closeCursor();
}
// Fonction pour créer un utilisateur
function addUser($nom, $prenom, $email, $password, $type, $login) {
    global $connexion; // Rend la variable $connexion globale à cette fonction
    $query = $connexion->prepare('INSERT INTO User (nom, prenom, email, password, type, login) VALUES (:nom, :prenom, :email, :password, :type, :login)');
    $query->bindParam(':nom', $nom);
    $query->bindParam(':prenom', $prenom);
    $query->bindParam(':email', $email);
    $query->bindParam(':password', $password);
    $query->bindParam(':type', $type);
    $query->bindParam(':login', $login);
    return $query->execute();
}

// Fonction pour obtenir tous les types d'utilisateur
function getAlltypes() {
    global $connexion;
    $query = $connexion->query('SELECT * FROM UserType');
    return $query;
}