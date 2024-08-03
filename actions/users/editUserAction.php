<?php
require_once '../../Database/utilisateur_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $type = $_POST['type'];

    $result = updateUser($id, $nom, $prenom, $login, $email, $type);

    if ($result) {
        header('Location: ../../views/users/users.php?success=1');
    } else {
        header('Location: ../../views/users/updateUser.php?id=' . $id . '&error=1');
    }
    exit;
}
?>
