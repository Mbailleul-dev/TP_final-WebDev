<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><i class="bi bi-list" style="font-size:150%"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="articles.php">Articles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Lectures</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
        <?php if (!empty($_SESSION['login']))
        { ?>
          <span class="name"><?= @$_SESSION['login']; ?></span>
          <a class="nav-link" href="deconnexion.php"><img src="assets/img/log-out.svg" alt="logo log-out" title="se deconnecter"> </a>
        <?php } else { ?><a class="nav-link" href="connexion.php"><img src="assets/img/log-in.svg" alt="logo log-in" title="se connecter"></a>
         <?php } ?>
        </li>
      </ul>
      <form class="d-flex">
      <?php if (isset($_SESSION['id_userTypes']) && $_SESSION['id_userTypes'] == 1)
        { ?>
        <a class="nav-item" href="dashboard.php">Gestion</a>
        <?php } else { ?>
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
<button class="btn btn-search" type="submit">Search</button>
        <?php } ?>
    </form>
    </div>
  </div>
</nav>