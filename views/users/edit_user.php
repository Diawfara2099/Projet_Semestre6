<?php
include_once '../../header.php';
include_once '../../navbar.php';
require_once '../../Database/utilisateur_db.php';

if (!isset($_GET['id'])) {
    header('Location: users.php');
    exit;
}

$user = getUserById($_GET['id']);
?>

<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Modifier l'utilisateur</h1>
        <form action="../../actions/users/editUserAction.php" method="post">
            <input type="hidden" name="id" value="<?= $user->id ?>">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?= $user->nom ?>" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $user->prenom ?>" required>
            </div>
            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" class="form-control" id="login" name="login" value="<?= $user->login ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $user->email ?>" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="utilisateur" <?= $user->type == 'gestionnaire' ? 'selected' : '' ?>>Gestionnaire</option>
                    <option value="administrateur" <?= $user->type == 'administrateur' ? 'selected' : '' ?>>Administrateur</option>
                </select>
            </div>
            <div class="d-flex gap-2 mt-3">
            <button type="submit" class="btn btn-primary">Modifier</button>
            <a href="users.php" class="btn btn-warning ">Annuler</a>
            </div>
        </form>
    </div>
</main>

<?php
include_once '../../footer.php';
?>
