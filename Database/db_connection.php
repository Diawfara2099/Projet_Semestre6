<?php
$hote = "localhost";
$user = "root";
$password= "";
$dbName = "immoblier";

$dsn = "mysql:host=$hote;dbname=$dbName;charset=utf8";
try {
    $connexion = new PDO($dsn, $user, $password);
    //die("Connexion réussie !");
}catch(PDOException $e){
    die("Erreur de connexion: " . $e->getMessage());
}