<?php
require('../../actions/locations/createLocationAction.php');
$location = true;
include_once '../../header.php';
include_once '../../navbar.php';
require_once '../../Database/bailleur_db.php';
$bailleurs = getAllBailleurs();
?>

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Nouvelle Location</h1>
        <?php
        if (isset($errorMessage)) {
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= $errorMessage; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        ?>
        <form class="row g-3" method="POST">
            <div class="col-md-6">
                <label for="inputLibelle" class="form-label">Libellé</label>
                <input type="text" class="form-control" id="inputLibelle" name="libelle" required>
            </div>
            <div class="col-md-6">
                <label for="inputAdresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="inputAdresse" name="adresse" required>
            </div>
            <div class="col-md-6">
                <label for="inputType" class="form-label">Type</label>
                <select id="inputType" class="form-select" name="type" required>
                    <option value="maison">Maison</option>
                    <option value="appartement">Appartement</option>
                    <option value="studio">Studio</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputPrix" class="form-label">Prix</label>
                <input type="number" step="0.01" class="form-control" id="inputPrix" name="prix" required>
            </div>
            <div class="col-md-6">
                <label for="inputBailleur" class="form-label">Bailleur</label>
                <select id="inputBailleur" class="form-select" name="id_bailleur" required>
                    <option selected value="0">Sélectionner...</option>
                    <?php while ($bailleur = $bailleurs->fetch(PDO::FETCH_OBJ)) : ?>
                        <option value="<?= $bailleur->id ?>"><?= $bailleur->nom . ' ' . $bailleur->prenom ?></option>
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
