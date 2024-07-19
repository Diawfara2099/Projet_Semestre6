<?php
// Incluez les fichiers nécessaires
require('../../actions/users/editUserAction.php');

include_once '../../header.php';
include_once '../../navbar.php';
?>

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Modification utilisateur</h1>

    <?php if (isset($errorMessage)): ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($errorMessage); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <?php if (isset($nom) && isset($prenom) && isset($email) && isset($login) && isset($type)): ?>
      <form class="row g-3" method="POST" action="update_user.php">
        <input type="hidden" name="id" value="<?= htmlspecialchars($id); ?>">
        <div class="col-md-6">
          <label for="nom" class="form-label">Nom</label>
          <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($nom); ?>" required>
        </div>
        <div class="col-md-6">
          <label for="prenom" class="form-label">Prénom</label>
          <input type="text" class="form-control" id="prenom" name="prenom" value="<?= htmlspecialchars($prenom); ?>" required>
        </div>
        <div class="col-md-6">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($email); ?>" required>
        </div>
        <div class="col-md-6">
          <label for="login" class="form-label">Login</label>
          <input type="text" class="form-control" id="login" name="login" value="<?= htmlspecialchars($login); ?>" required>
        </div>
        <div class="col-md-6">
          <label for="type" class="form-label">Type</label>
          <select class="form-select" id="type" name="type" required>
            <option value="administrateur" <?= $type === 'administrateur' ? 'selected' : '' ?>>Administrateur</option>
            <option value="gestionnaire" <?= $type === 'gestionnaire' ? 'selected' : '' ?>>Gestionnaire</option>
          </select>
        </div>
        <div class="col-12">
          <button type="submit" name="envoyer" class="btn btn-primary">Modifier</button>
        </div>
      </form>
    <?php else: ?>
      <p>Utilisateur non trouvé.</p>
    <?php endif; ?>
  </div>
</main>

<?php
include_once '../../footer.php';
?>
