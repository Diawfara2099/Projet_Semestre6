<?php
$index= true;
$user = false;
require_once './Database/db_connection.php'; // Inclure la connexion PDO
require_once './Database/contrat_db.php'; // Inclure les fonctions de gestion des contrats
include_once './header.php';
include_once 'navbar.php';

?>

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Gestion Immobilier Les amoureux du web</h1>
  </div>

  <!-- Recherche des contrats d'un client -->

  <div class="container">
  <h5>Trouver les contrats d’un client</h5>

    <form class="d-flex mb-4" role="search" method="post">
        <input class="form-control me-2" type="text" placeholder="ID Client" name="client_id" aria-label="Client ID">
        <button class="btn btn-outline-success" type="submit" name="search_contracts">Rechercher Contrats</button>
    </form>
    
    <?php 
    if (isset($_POST['search_contracts'])) {
        $clientId = $_POST['client_id'] ?? '';
        if (!empty($clientId)) {
            try {
                $resultat = rechercheContrats($clientId);
                if ($resultat->rowCount() > 0) {
                    echo '<h2>Contrats du Client</h2>';
                    echo '<ul>';
                    while ($row = $resultat->fetch()) {
                        echo '<li>ID Contrat: ' . htmlspecialchars($row['id']) . ', Date Début: ' . htmlspecialchars($row['date_DEB']) . ', Date Fin: ' . htmlspecialchars($row['date_FIN']) . ', Location: ' . htmlspecialchars($row['location_libelle']) . '</li>';
                    }
                    echo '</ul>';
                } else {
                    $Message = 'Aucun contrat trouvé pour ce client.';
                }
            } catch (Exception $e) {
                $errorMessage = 'Erreur lors de la recherche des contrats : ' . $e->getMessage();
            }
        } else {
            $errorMessage = 'Veuillez entrer un ID client.';
        }
    }
    ?>
  </div>

  <!-- Recherche des locations disponibles suivant un type -->
  <div class="container">
    <h5>Trouver les locations disponibles(sans contrats) suivant un type donné </h5>
    <form class="d-flex mb-4" role="search" method="post">
        <input class="form-control me-2" type="text" placeholder="Type de Location (maison/appartement/studio)" name="location_type" aria-label="Location Type">
        <button class="btn btn-outline-success" type="submit" name="search_locations">Rechercher Locations</button>
    </form>

    <?php
    if (isset($_POST['search_locations'])) {
        $locationType = $_POST['location_type'] ?? '';
        if (!empty($locationType)) {
            try {
                $stmt = $connexion->prepare("
                    SELECT l.*
                    FROM location l
                    LEFT JOIN contrat c ON l.id = c.id_location AND c.date_FIN >= CURDATE()
                    WHERE c.id IS NULL AND l.type = ?
                ");
                $stmt->execute([$locationType]);
                if ($stmt->rowCount() > 0) {
                    echo '<h2>Locations Disponibles</h2>';
                    echo '<ul>';
                    while ($row = $stmt->fetch()) {
                        echo '<li>Libellé: ' . htmlspecialchars($row['libelle']) . ', Adresse: ' . htmlspecialchars($row['adresse']) . ', Prix: ' . htmlspecialchars($row['prix']) . '</li>';
                    }
                    echo '</ul>';
                } else {
                    $Message = 'Aucune location disponible pour ce type.';
                }
            } catch (Exception $e) {
                $errorMessage = 'Erreur lors de la recherche des locations : ' . $e->getMessage();
            }
        } else {
            $errorMessage = 'Veuillez entrer un type de location.';
        }
    }
    ?>
  </div>

  <!-- Recherche des utilisateurs par login ou email -->
  <div class="container">
    <h5> Chercher un utilisateur en fonction de son login ou de son email</h5>
    <form class="d-flex mb-4" role="search" method="post">
        <input class="form-control me-2" type="text" placeholder="Login ou Email" name="user_query" aria-label="User Query">
        <button class="btn btn-outline-success" type="submit" name="search_users">Rechercher Utilisateurs</button>
    </form>

    <?php
    if (isset($_POST['search_users'])) {
        $query = $_POST['user_query'] ?? '';
        if (!empty($query)) {
            try {
                $stmt = $connexion->prepare("
                    SELECT *
                    FROM user
                    WHERE login = ? OR email = ?
                ");
                $stmt->execute([$query, $query]);
                if ($stmt->rowCount() > 0) {
                    echo '<h2>Utilisateurs Trouvés</h2>';
                    echo '<ul>';
                    while ($row = $stmt->fetch()) {
                        echo '<li>Nom: ' . htmlspecialchars($row['nom']) . ', Prénom: ' . htmlspecialchars($row['prenom']) . ', Login: ' . htmlspecialchars($row['login']) . ', Email: ' . htmlspecialchars($row['email']) . '</li>';
                    }
                    echo '</ul>';
                } else {
                    $Message = 'Aucun utilisateur trouvé.';
                }
            } catch (Exception $e) {
                $errorMessage = 'Erreur lors de la recherche des utilisateurs : ' . $e->getMessage();
            }
        } else {
            $errorMessage = 'Veuillez entrer un login ou un email.';
        }
    }
    ?>
  </div>

</main>

<?php
// Affichage des messages d'erreur et de succès
if (isset($errorMessage)) {
    ?>
    <div class="container">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <?= $errorMessage; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    </div>
    <?php
}
if (isset($Message)) {
    ?>
    <div class="container">
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
      <?= $Message; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    </div>
    <?php
}
?>

<?php
include_once './footer.php';
?>
