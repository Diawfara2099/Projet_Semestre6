<?php

$user = true;

include_once '../../header.php';
include_once '../../navbar.php';
require_once '../../Database/utilisateur_db.php';

$users = getAllUsers();

?>

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Utilisateurs</h1>
        <?php if($_SESSION['type'] == 'administrateur'): ?>
        <a href="create_user.php">
            <button type="button" class="float-end mb-2 btn btn-primary">
                Nouveau
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                </svg>
            </button>
        </a>
        <table id="myDataTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Login</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $users->fetch(PDO::FETCH_OBJ)) : ?>
                    <tr>
                        <td><?= $user->nom ?></td>
                        <td><?= $user->prenom ?></td>
                        <td><?= $user->login ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->type ?></td>
                        <td>
    <a href="edit_user.php?id=<?= $user->id ?>" class="btn btn-sm btn-warning me-2" title="Modifier">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
            <path d="M12.48 0l3.523 3.523-10.025 10.025-3.523-3.523L12.48 0zm.427 1.427L2 11.335V14h2.665L14.573 4.113 12.907 2.437zM2.845 12.561l-.793.792a1.223 1.223 0 0 0-.356.88L1.5 15l2.845-.845a1.223 1.223 0 0 0 .88-.356l.792-.793-2.845.845zm9.002-9.002l-1.414 1.414 1.023 1.023 1.414-1.414-1.023-1.023z"/>
        </svg>
    </a>
    <a href="delete_user.php?id=<?= $user->id ?>" class="btn btn-sm btn-danger" title="Supprimer">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M0 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V3zm13.5 2h-11l-.5 9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1l-.5-9zM5 6V5h1v1H5zm2 0V5h1v1H7z"/>
        </svg>
    </a>
</td>

                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
            <h1 class="mt-5">Vous devez être Administrateur pour accéder à cette page</h1>
        <?php endif ?>
    </div>
</main>

<?php
include_once '../../footer.php';
?>
