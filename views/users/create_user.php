<?php
require('../../actions/users/createUserAction.php');
$user = true;

include_once '../../header.php';

include_once '../../navbar.php';
require_once '../../Database/utilisateur_db.php';

?>

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Nouveau Utilisateur</h1>
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
        <form class="row g-3" method="POST" enctype="multipart/form-data">
        
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Prénom</label>
                <input type="text" class="form-control" name="prenom">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Login</label>
                <input type="text" class="form-control" name="login">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">type</label>
                <select id="inputState" class="form-select" name="type">
                    <option selected disabled>Sélectionner...</option>
                    <option value="administrateur">Administrateur</option>
                    <option value="gestionnaire">Gestionnaire</option>
                </select>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="addUser">Créer</button>
            </div>
        </form>
    </div>
</main>

<?php
include_once '../../footer.php'
?>