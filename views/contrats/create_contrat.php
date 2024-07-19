<?php
require('../../actions/contrats/createContratAction.php');
include_once '../../header.php';
include_once '../../navbar.php';
require_once '../../Database/contrat_db.php';
require_once '../../Database/client_db.php';
require_once '../../Database/location_db.php';

// Récupérer les clients et les locations pour les listes déroulantes
$clients=getAllClient();
$locations = getAllLocations();

?>

<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Nouveau Contrat</h1>
        <form action="create_contrat.php" method="post">
            <div class="mb-3">
                <label for="date_DEB" class="form-label">Date Début</label>
                <input type="date" class="form-control" id="date_DEB" name="date_DEB" required>
            </div>
            <div class="mb-3">
                <label for="date_FIN" class="form-label">Date Fin</label>
                <input type="date" class="form-control" id="date_FIN" name="date_FIN" required>
            </div>
            <div class="mb-3">
                <label for="modePaiement" class="form-label">Mode de Paiement</label>
                <input type="text" class="form-control" id="modePaiement" name="modePaiement" required>
            </div>
            <div class="mb-3">
                <label for="id_client" class="form-label">Client</label>
                <select class="form-control" id="id_client" name="id_client" required>
                    <?php foreach ($clients as $client): ?>
                        <option value="<?= $client['id'] ?>"><?= $client['nom'] . ' ' . $client['prenom'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
    <label for="id_location" class="form-label">Adresse et Type de Location</label>
    <select class="form-control" id="id_location" name="id_location" required>
        <?php foreach ($locations as $location): ?>
            <option value="<?= $location['id'] ?>">
                <?= $location['adresse'] . ' - ' . $location['type'] ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

           
            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>
</main>

<?php
include_once '../../footer.php';
?>
