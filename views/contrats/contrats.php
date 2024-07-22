<?php

$contrat = true;

include_once '../../header.php';
include_once '../../navbar.php';
require_once '../../Database/contrat_db.php';

$contrats = getAllContrat();

?>

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Contrats</h1>
        <a href="create_contrat.php">
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
            $message = htmlspecialchars($_GET['message']);
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        } elseif (isset($_GET['error'])) {
            $error = htmlspecialchars($_GET['error']);
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $error; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        ?>
        <table id="myDataTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date Début</th>
                    <th>Date Fin</th>
                    <th>Mode de Paiement</th>
                    <th>Client</th>
                    <th>Adresse de Location</th>
                    <th>Type de Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contrats as $contrat): ?>
                <tr>
                    <td><?= htmlspecialchars($contrat['id']) ?></td>
                    <td><?= htmlspecialchars($contrat['date_DEB']) ?></td>
                    <td><?= htmlspecialchars($contrat['date_FIN']) ?></td>
                    <td><?= htmlspecialchars($contrat['modePaiement']) ?></td>
                    <td><?= htmlspecialchars($contrat['client_nom'] . ' ' . $contrat['client_prenom']) ?></td>
                    <td><?= htmlspecialchars($contrat['location_adresse']) ?></td>
                    <td><?= htmlspecialchars($contrat['type_location']) ?></td>
                    <td>
                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletecontratModal<?= htmlspecialchars($contrat['id']) ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                              <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                            </svg>
                        </a>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="deletecontratModal<?= htmlspecialchars($contrat['id']) ?>" tabindex="-1" aria-labelledby="deletecontratModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deletecontratModalLabel">Suppression contrat: <?= htmlspecialchars($contrat['client_nom'] . ' ' . $contrat['client_prenom']) ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Voulez-vous supprimer ce contrat ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <a href="/actions/contrats/deleteContratAction.php?id=<?= htmlspecialchars($contrat['id']) ?>" class="btn btn-danger">Supprimer</a>

                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<?php
include_once '../../footer.php';
?>
