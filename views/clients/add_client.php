<?php
require('../../actions/clients/createClientsAction.php');
$client = true;
include_once '../../header.php';
include_once '../../navbar.php';
?>

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Nouveau client</h1>
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
                <label for="inputNom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="inputNom" name="nom" required>
            </div>
            <div class="col-md-6">
                <label for="inputPrenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="inputPrenom" name="prenom" required>
            </div>
            <div class="col-12">
                <label for="inputAdresse" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputAdresse" name="email" required>
            </div>
            <div class="col-12">
                <label for="inputTel" class="form-label">Téléphone</label>
                <input type="tel" class="form-control" id="inputTel" name="tel" required minlength="9" maxlength="9">
            </div>
            <div class="col-md-6">
                <label for="inputCIN" class="form-label">CIN (Carte Nationale d'Identité)</label>
                <input type="text" class="form-control" id="inputCIN" name="cin" required minlength="13" maxlength="13">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="envoyer">Créer</button>
            </div>
        </form>
    </div>
</main>

<?php
include_once '../../footer.php'
?>
