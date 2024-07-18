<?php
require('../../Database/bailleur_db.php');

if(isset($_POST['envoyer'])){

    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['adresse'])
        && !empty($_POST['tel']) && !empty($_POST['cin'])) {
        
        // Extraction des données du formulaire
        extract($_POST);
        
        
        addBailleur($nom, $prenom, $adresse, $tel, $cin);

        
        $message = "Le bailleur a été ajouté avec succès!";
        header("Location: bailleurs.php?message=" . urlencode($message));
        exit(); 
    } else {
       
        $errorMessage = "Veuillez remplir tous les champs obligatoires !";
    }
}
?>
