<?php
require_once '../../Database/utilisateur_db.php';

if (isset($_POST['addUser'])) {
    if (
        !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email'])
        && !empty($_POST['password']) && !empty($_POST['type']) && !empty($_POST['login'])
    ) {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $type = htmlspecialchars($_POST['type']);
        $login = htmlspecialchars($_POST['login']);

        addUser($nom, $prenom, $email, $password, $type, $login);

        $message = "L'utilisateur $prenom $nom a été ajouté avec succès!";
        header("Location: users.php?message=" . urlencode($message));
        exit();
    } else {
        $errorMessage = "Veuillez remplir tous les champs !";
    }
}
?>
