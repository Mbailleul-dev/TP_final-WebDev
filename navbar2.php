<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><i class="bi bi-list" style="font-size:150%"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/DMGP/articles/articles.php">Articles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/DMGP/books/books.php">Lectures</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/DMGP/etfs/etf.php">ETFs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/DMGP/forum/forum.php">Forum</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php if (!empty($_SESSION['login'])) { ?>http://localhost/DMGP/profils/profil.php<?php } else { ?>http://localhost/DMGP/profils/connexion.php <?php }
                                                                                                                                                                                    ?>"><?php if (!empty($_SESSION['login'])) { ?>
              Profil <?php } else { ?> Connexion <?php } ?></a>
        </li>
        <li class="nav-item">
            <input class="form-control me-2 mt-1 searchform" type="search" placeholder="Recherche" aria-label="Search">
            <button class="btn btn-search searchform mt-1" type="submit">Chercher</button>
        </li>
    </div>
  </div>
</nav>