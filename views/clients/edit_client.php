<?php
require('../../actions/clients/editClientsAction.php');
$client = true;
include_once '../../header.php';
include_once '../../navbar.php';

?>

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Modication client</h1>
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
    <?php if(isset($nom)): ?>
    <form class="row g-3" method="POST">
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Nom</label>
        <input type="text" class="form-control" name="nom" value="<?= $nom; ?>">
      </div>
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Prenom</label>
        <input type="text" class="form-control" name="prenom" value="<?= $prenom; ?>">
      </div>
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="<?= $email; ?>">
      </div>
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Tel</label>
        <input type="text" class="form-control" name="tel" value="<?= $tel; ?>" maxlength="9" minlength="9">
      </div>
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">CIN</label>
        <input type="text" class="form-control" name="CIN" value="<?= $CIN; ?>" maxlength="13" minlength="13">
      </div>

      <div class="col-12">
        <button type="submit" name='envoyer' class="btn btn-primary">Modifier</button>
      </div>
    </form>
    <?php endif ?>
  </div>
</main>

<?php
include_once '../../footer.php'
?>