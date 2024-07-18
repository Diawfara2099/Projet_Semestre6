<?php
require('db_connection.php');

define("UPLOAD_IMAGES_AVATAR", $_SERVER['DOCUMENT_ROOT'].'/uploads/images/avatars/');
define("FETCH_IMAGES_AVATAR", "http://projet-semestre-6-gestion-mmoblier.test".'/uploads/images/avatars/');

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

function addUser($nom, $prenom, $email, $password, $avatar_name, $type) {
    global $connexion;

    $query = "INSERT INTO user(nom, prenom, email, password, avatar_name, type
) VALUES(?,?,?,?,?,?)";
    $stmt = $connexion->prepare($query);
    $stmt->execute(array($nom, $prenom, $email, $password, $avatar_name, $type));
    $stmt->closeCursor();
}