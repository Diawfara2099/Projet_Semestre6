<?php
require('../../Database/client_db.php');

if(isset($_POST['envoyer'])){

    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email'])
        && !empty($_POST['tel']) && !empty($_POST['cin'])) {
        
        // Extraction des données du formulaire
        extract($_POST);
        
        
        addClient($nom, $prenom, $email, $tel, $cin);

        
        $message = "Le client a été ajouté avec succès!";
        header("Location: clients.php?message=" . urlencode($message));
        exit(); 
    } else {
       
        $errorMessage = "Veuillez remplir tous les champs obligatoires !";
    }
}
?>
