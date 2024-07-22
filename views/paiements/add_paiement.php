<?php
require('../../actions/paiements/createPaiementsAction.php');
require(__DIR__ . '/../../Database/db_connection.php');
require('../../Database/client_db.php'); 
require('../../Database/contrat_db.php'); 
require('../../Database/utilisateur_db.php'); // Ajouter le fichier pour obtenir les gestionnaires

$paiement = true;

include_once '../../header.php';
include_once '../../navbar.php';

// Récupérer les données pour les sélecteurs
$clients = getClients();
$contrats = getContrats();
$users = getUsers(); // Assurez-vous d'avoir une fonction pour obtenir les utilisateurs/gestionnaires
?>

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Nouveau Paiement</h1>
        <?php if (isset($successMessage)) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $successMessage; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <?php if (isset($errorMessage)) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= $errorMessage; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <form class="row g-3" method="POST">
            <div class="col-md-6">
                <label for="date_paiement" class="form-label">Date de Paiement</label>
                <input type="date" class="form-control" id="date_paiement" name="date_paiement" required>
            </div>
            <div class="col-md-6">
                <label for="contrat_id" class="form-label">ID Contrat</label>
                <select class="form-select" id="contrat_id" name="contrat_id" required>
                    <option value="" selected disabled>Choisir un contrat</option>
                    <?php while ($contrat = $contrats->fetch(PDO::FETCH_OBJ)) : ?>
                        <option value="<?= $contrat->id ?>"><?= $contrat->id ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="client_id" class="form-label">Client</label>
                <select class="form-select" id="client_id" name="client_id" required>
                    <option value="" selected disabled>Choisir un client</option>
                    <?php while ($client = $clients->fetch(PDO::FETCH_OBJ)) : ?>
                        <option value="<?= $client->id ?>"><?= $client->nom . ' ' . $client->prenom ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="gestionnaire_id" class="form-label">ID Gestionnaire</label>
                <select class="form-select" id="gestionnaire_id" name="gestionnaire_id" required>
                    <option value="" selected disabled>Choisir un Gestionnaire</option>
                    <?php while ($user = $users->fetch(PDO::FETCH_OBJ)) : ?>
                        <option value="<?= $user->id ?>"><?= $user->id . ' ' . $user->prenom. ''.$user->nom ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="envoyer">Créer</button>
            </div>
        </form>
    </div>
</main>

<?php
include_once '../../footer.php';
?>
