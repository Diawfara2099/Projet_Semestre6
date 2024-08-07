<?php

$paiement = true;

include_once '../../header.php';
include_once '../../navbar.php';
require_once '../../Database/paiement_db.php';

$paiements = getAllpaiements();
?>

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Paiements</h1>
        <a href="add_paiement.php">
            <button type="button" class="float-end mb-2 btn btn-primary">
                Nouveau
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                </svg>
            </button>
        </a>
        <?php
    if (isset($_GET['message'])) {
      $message = $_GET['message'];
     
    ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $message; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
    }else 
    if (isset($_GET['error'])) {
      $error = $_GET['error'];
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $error; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label
        ="Close"></button>
        </div>
        <?php
        }
        ?>
        <table id="myDataTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID Paiement</th>
                    <th>Date de Paiement</th>
                    <th>ID Contrat</th>
                    <th>Nom du Client</th>
                    <th>Prenom du Client</th>
                    <th>ID Gestionnaire</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($paiement = $paiements->fetch(PDO::FETCH_OBJ)) :?>
                <tr>
                    <td><?= $paiement->id ?></td>
                    <td><?= $paiement->date_paiement ?></td>
                    <td><?= $paiement->contrat_id ?></td>
                    <td><?= $paiement->client_nom ?></td>
                    <td><?= $paiement->client_prenom ?></td>
                    <td><?= $paiement->gestionnaire_id ?></td>
                    <td>
                       
                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletepaiementModal<?= $paiement->id ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                            </svg>
                        </a>
                        <a href="generate_pdf.php?id=<?= $paiement->id ?>" class="btn btn-info">
                            Télécharger PDF
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                <path d="M.5 11a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-2zm12.5 1a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h3zM7.854 7.854a.5.5 0 0 0 .707 0l2.646-2.646a.5.5 0 0 0 0-.707l-2.646-2.646a.5.5 0 0 0-.707.707L9.207 5.5H4.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h4.707l-1.854 1.854a.5.5 0 0 0 0 .707z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="deletepaiementModal<?= $paiement->id ?>" tabindex="-1" aria-labelledby="deletepaiementModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deletepaiementModalLabel">Suppression paiement: <?= $paiement->id ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Voulez-vous supprimer ce paiement ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <a href="/actions/paiements/deletepaiementAction.php?id=<?= $paiement->id ?>" class="btn btn-danger">Supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</main>

<?php
include_once '../../footer.php'
?>
