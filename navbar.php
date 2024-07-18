
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/index.php">Gestion Immobilière</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link <?= !empty($index) ? 'active' : '' ?>" href="/index.php">Accueil</a>
          </li>
          
          <?php if(isset($_SESSION['type']) && $_SESSION['type'] == 'administrateur'): ?>
          <li class="nav-item">
            <a class="nav-link <?= !empty($bailleur) ? 'active' : '' ?>" href="/views/bailleurs/bailleurs.php">Bailleurs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= !empty($location) ? 'active' : '' ?>" href="/views/locations/locations.php">Locations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= !empty($user) ? 'active' : '' ?>" href="/views/users/users.php">Utilisateurs</a>
          </li>
          <?php elseif(isset($_SESSION['type']) && $_SESSION['type'] == 'gestionnaire'): ?>
          <li class="nav-item">
            <a class="nav-link <?= !empty($client) ? 'active' : '' ?>" href="/views/clients/clients.php">Clients</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= !empty($contrat) ? 'active' : '' ?>" href="/views/contrats/contrats.php">Contrats</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= !empty($paiement) ? 'active' : '' ?>" href="/views/paiements/paiements.php">Paiements</a>
          </li>
          <?php endif; ?>
        </ul>
        <a class="btn btn-outline-success" type="submit" href="/actions/auth/logoutAction.php">
          Se Déconnecter
        </a>
      </div>
    </div>
  </nav>
</header>
