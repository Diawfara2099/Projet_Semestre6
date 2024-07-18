<?php
require_once '../../actions/locations/deleteLocationAction.php';
include_once '../../header.php';
include_once '../../navbar.php';
?>

<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Suppression de la Location</h1>
    <?php if(isset($errorMessage)): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $errorMessage; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>
    <?php if(isset($successMessage)): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $successMessage; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>
    <?php if(isset($location)): ?>
    <form method="POST">
      <input type="hidden" name="id" value="<?= $location->id ?>">
      <p>Êtes-vous sûr de vouloir supprimer la location <?= $location->libelle ?> ?</p>
      <button type="submit" name="delete" class="btn btn-danger">Oui, Supprimer</button>
      <a href="index.php" class="btn btn-secondary">Annuler</a>
    </form>
    <?php endif; ?>
  </div>
</main>

<?php
include_once '../../footer.php';
?>
