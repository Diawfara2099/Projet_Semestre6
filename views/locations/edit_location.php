<?php
require('../../actions/locations/editLocationAction.php');
$bailleurs = getAllBailleurs(); // Récupérer la liste des bailleurs
include_once '../../header.php';
include_once '../../navbar.php';

?>

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Modification Location</h1>
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
    <form class="row g-3" method="POST">
      <div class="col-md-6">
        <input type="hidden" name="id" value="<?= $location->id ?>">
        <label for="libelle" class="form-label">Libellé:</label>
        <input type="text" class="form-control" name="libelle" value="<?= $location->libelle ?>" required><br>
        <label for="adresse" class="form-label">Adresse:</label>
        <input type="text" class="form-control" name="adresse" value="<?= $location->adresse ?>" required><br>
        <label for="type" class="form-label">Type:</label>
        <input type="text" class="form-control" name="type" value="<?= $location->type ?>" required><br>
        <label for="prix" class="form-label">Prix:</label>
        <input type="text" class="form-control" name="prix" value="<?= $location->prix ?>" required><br>
        
        <!-- Menu déroulant pour sélectionner le bailleur -->
        <label for="bailleur_id" class="form-label">Bailleur:</label>
        <select class="form-select" name="bailleur_id" required>
            <?php foreach ($bailleurs as $bailleur) : ?>
                <option value="<?= $bailleur->id ?>" <?= ($bailleur->id == $location->id_bailleur) ? 'selected' : '' ?>>
                    <?= $bailleur->nom ?> <?= $bailleur->prenom ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        
        <div class="col-12">
          <button type="submit" name='envoyer' class="btn btn-primary">Modifier</button>
        </div>
      </div>
    </form>
    <?php endif ?>
  </div>
</main>

<?php
include_once '../../footer.php'
?>
