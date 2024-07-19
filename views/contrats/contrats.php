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
                        <a href="edit_contrat.php?id=<?= htmlspecialchars($contrat['id']) ?>" class="btn btn-sm btn-warning me-2" title="Modifier">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.48 0l3.523 3.523-10.025 10.025-3.523-3.523L12.48 0zm.427 1.427L2 11.335V14h2.665L14.573 4.113 12.907 2.437zM2.845 12.561l-.793.792a1.223 1.223 0 0 0-.356.88L1.5 15l2.845-.845a1.223 1.223 0 0 0 .88-.356l.792-.793-2.845.845zm9.002-9.002l-1.414 1.414 1.023 1.023 1.414-1.414-1.023-1.023z"/>
                            </svg>
                        </a>
                        <a href="delete_contrat.php?id=<?= htmlspecialchars($contrat['id']) ?>" class="btn btn-sm btn-danger" title="Supprimer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M0 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V3zm13.5 2h-11l-.5 9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1l-.5-9zM5 6V5h1v1H5zm2 0V5h1v1H7z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<?php
include_once '../../footer.php';
?>
