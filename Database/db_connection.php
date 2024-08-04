<?php

$hote = "localhost";
$user = "root";
$password= "";
$dbName = "immobilier";

$dsn = "mysql:host=$hote;dbname=$dbName;charset=utf8";
try {
    $connexion = new PDO($dsn, $user, $password);
    //die("Connexion réussie !");
}catch(PDOException $e){
    die("Erreur de connexion: " . $e->getMessage());
}

/*
$hote = "localhost";
$user = "root";
$password= "";
$dbName = "immoblier"; 

$dsn = "mysql:host=$hote;dbname=$dbName;charset=utf8";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion: " . $e->getMessage());
}

*/